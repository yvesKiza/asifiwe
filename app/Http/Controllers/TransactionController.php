<?php

namespace App\Http\Controllers;

use PDF;
use App\Bill;
use App\Cart;
use App\Product;
use App\Supplier;
use Carbon\Carbon;
use App\SoldProduct;
use App\ProductStock;
use App\RemovedProduct;
use App\PurchasedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getStock()
    {
        $stocks=ProductStock::where('quantity','>',0)->orderBy('created_at', 'DESC')->get();
        return view('transactions.stock',compact('stocks'));
    }
    public function expired(){
        $stocks=ProductStock::where('expiry_date','<=', Carbon::now());
        


    }
    public function printPDF(){
        $exs=Examination::with('doctor','patient')->get();
        $pdf=PDF::loadView('examination.listPDF',compact('exs'));
       
        return $pdf->download('examinations.pdf');
       }

       public function getBill($id)
       {
        $x=Bill::findOrfail($id);
        $total=0;
        foreach($x->products as $c){
           $total+=$total+$c->selling_price*$c->quantity;
        }
        return view('transactions.bill',compact('x','total'));

       }
       public function downloadPdf($id){
        $x=Bill::findOrfail($id);
        $total=0;
        foreach($x->products as $c){
           $total+=$total+$c->selling_price*$c->quantity;
        }

           $pdf=PDF::loadView('file.sale',compact('x','total'));
           $name="report".$x->id.".pdf";
           return $pdf->download($name);
      
       }
    
    public function stockPDF(){
        $stocks=ProductStock::where('quantity','>',0)->orderBy('created_at', 'DESC')->get();
        $pdf=PDF::loadView('file.stock',compact('stocks'));
        $name="stock.pdf";
        return $pdf->download($name);

    }
    
    public function create(Request $request)
    {
        $medicines=Product::pluck('name','id')->all();
        $suppliers=Supplier::pluck('name','id')->all();
       return view('transactions.purchase',compact('medicines','suppliers'));
    }
    public function createCart()
    {
        $id=auth()->user()->id;
        $products=Cart::where('user_id',$id)->get();
        $medicines=ProductStock::with('product')->get()->pluck('full_name','id')->all();
        return view('transactions.cart',compact('medicines','products'));
    }
    public function cart(Request $request)
    {
        if($request->medicine_id==null){
            return response()->json(['error' => 'provide medicine'], 404);
        }
        $id=auth()->user()->id;
        $stocks=ProductStock::findOrFail($request->medicine_id);
        
        if($request->quantity<=0){
            return response()->json(['error' => 'invalid quantity'], 404);
        }
        if($request->quantity>$stocks->quantity){
            return response()->json(['error' => 'insufficient quantity'], 404);
        }
        $c=Cart::where('stock_id',$stocks->id)->where('user_id',$id)->first();
        if($c!=null){
            return response()->json(['error' => 'product exists'], 404);
        }
        $cart=new Cart;  
        $cart->product_id=$stocks->product_id;
        $cart->stock_id=$stocks->id;
       
        $cart->quantity=$request->quantity;
        $cart->user_id=auth()->user()->id;
        $cart->save();
        $products=Cart::where('user_id',$id)->get();
   $returnHTML = view('transactions.cartAjax', compact('products'))->render();
   return response()->json(array('success' => true, 'html'=>$returnHTML));

        

    }
    public function deleteCart(Request $request)
    {
        $id=auth()->user()->id;
        if($request->id==null){
            return response()->json(['error' => 'provide cart item'], 404);
        }
        $cart=Cart::findOrFail($request->id)->delete();
        $products=Cart::where('user_id',$id)->get();
        $returnHTML = view('transactions.cartAjax', compact('products'))->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));


        
    }
    public function bringCheckout(){
        $id=auth()->user()->id;
        $products=Cart::with('product','stock')->where('user_id',$id)->get();
        if($products->isEmpty()){
            return redirect()->back()->withErrors("cart is empty")->withInput();
        }
        $total=0;
        foreach ($products as $x) {
           $total+=$x->product->selling_price*$x->quantity;
        }
        return view('transactions.selling',compact('products','total'));
    }
    public function checkout(Request $request ){
        $id=auth()->user()->id;
        $products=Cart::where('user_id',$id)->get();
        if($products->isEmpty()){
            return redirect()->back()->withErrors("cart is empty")->withInput();
        }


        Validator::make($request->all(),[
          
            'client_name'=>'required|string',
           
            
             
           

        ])->validate();
        $bill=new Bill;
        DB::beginTransaction();
        $bill->customer_name=$request->client_name;
        $bill->user_id=$id;
        $bill->save();
        foreach ($products as $x) {
            $stock=ProductStock::findOrFail($x->stock_id);
            if($x->quantity<=$stock->quantity){
                $stock->quantity= $stock->quantity-$x->quantity;
             
                    $stock->save();
                
                $sold=new SoldProduct;
                $sold->product_id=$x->product_id;
                $sold->expiry_date=$x->stock->expiry_date;
                $sold->selling_price=$x->product->selling_price;
                $sold->quantity=$x->quantity;
                $sold->bill_id=$bill->id;
                $sold->save();
                
                if($stock->quantity==0){
                    $stock->delete();
                }
            }
            else{
                DB::rollback();
                return redirect()->back()->withErrors("this product "."  ".$x->product->full_name."  is no longer available")->withInput();
            }
        }
        
        $products=Cart::where('user_id',$id)->delete();
        DB::commit();
        return redirect()->route('bill.show',$bill->id);
        




    }
    public function bills()
    {
       $stocks=Bill::all();
       return view('transactions.billIndex',compact('stocks'));

    }
    public function purchase(Request $request)
    {
        Validator::make($request->all(),[
          
            'medicine_id'=>'required|numeric',
           
            'supplier_id'=>'required|numeric',
            'quantity'=>'required|numeric',
            'buying_price'=>'required|numeric',
          
            'expiry_date'=>'required|date',
            
             
           

        ])->validate();
        $now=Carbon::now()->addMonths(6);
       
        $expiry=Carbon::parse($request->expiry_date);
        if($expiry->lt($now)){
             return redirect()->back()->withErrors('invalid expiry date,expiry date should be at least in six months')->withInput();;
        }
     
        $purchase=new PurchasedProduct;
        DB::beginTransaction();
        try{
        $purchase->product_id=$request->medicine_id;
        $purchase->supplier_id=$request->supplier_id;
      
        $purchase->expiry_date=$expiry;
        $purchase->buying_price=$request->buying_price;
        $purchase->quantity=$request->quantity;
        $purchase->user_id=auth()->user()->id;
        $purchase->save();
        $stock=ProductStock::where('product_id',$request->medicine_id)->where('expiry_date', $expiry)->first();
        if($stock!=null){
            $stock->quantity=$stock->quantity+$request->quantity;
            $stock->save();
        }else{
          $stocks=new ProductStock;  
          $stocks->product_id=$request->medicine_id;
        
          $stocks->expiry_date=$expiry;
          $stocks->quantity=$request->quantity;
          $stocks->save();


        }
        DB::commit();
        return redirect()->route('purchase.index');
    } catch(\Exception $e)
    {
       DB::rollback();
       throw $e;
   }

    }
    public function removed()
    {
        $stocks=RemovedProduct::all();
        return view('transactions.removed',compact('stocks'));
    }
    public function out()
    {
        $stocks=Product::doesnthave('stock')->get();
        return view('transactions.out',compact('stocks'));
    }
    public function removePdf()
    {
        $stocks=RemovedProduct::all();
      
        $pdf=PDF::loadView('file.removed',compact('stocks'));
        $name="removed.pdf";
        return $pdf->download($name);
    }
    
}
