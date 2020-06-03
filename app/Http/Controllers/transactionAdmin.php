<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use Carbon\Carbon;
use App\SoldProduct;
use App\ProductStock;
use App\RemovedProduct;
use App\Custom\Expired;
use App\PurchasedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
Use PDF;

class transactionAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
        Expired::expired();
    }
    public function getPurchases(){
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $stocks=PurchasedProduct::whereBetween('created_at',[ $start, $end])->orderBy('created_at', 'DESC')->get();
        $total=0;
        foreach($stocks as $x){
            $total+=$x->buying_price*$x->quantity;
        }
        return view('transactions.purchases',compact('stocks','total'));

    }
    public function purchasePDF(Request $request)
    {
        $start=Carbon::createFromFormat('Y-m-d',  $request->start)->startOfDay();
        $end=Carbon::createFromFormat('Y-m-d',  $request->end)->endOfDay();
                $stocks=PurchasedProduct::whereBetween('created_at',[ $start, $end])->orderBy('created_at', 'DESC')->get();
                $total=0;
                foreach($stocks as $x){
                    $total+=$x->buying_price*$x->quantity;
                }
        $pdf=PDF::loadView('file.purchase',compact('stocks','total','start','end'));
        $name="purchases".$request->start." - ".$request->end.".pdf";
        return $pdf->download($name);
        
        
    }
    public function purchaseFilter(Request $request)
    {
        $start=Carbon::createFromFormat('Y-m-d',  $request->start)->startOfDay();
        $end=Carbon::createFromFormat('Y-m-d',  $request->end)->endOfDay();
                $stocks=PurchasedProduct::whereBetween('created_at',[ $start, $end])->orderBy('created_at', 'DESC')->get();
                $total=0;
                foreach($stocks as $x){
                    $total+=$x->buying_price*$x->quantity;
                }
                $view=view('transactions.purchaseFilter',compact('stocks','total'))->render();;

                return response()->json(['html'=>$view]);
        
        
           
    
    }
    public function salesFilter(Request $request)
    {
       
        $start=Carbon::createFromFormat('Y-m-d',  $request->start)->startOfDay();
        $end=Carbon::createFromFormat('Y-m-d',  $request->end)->endOfDay();
                $stocks=SoldProduct::where('quantity','>',0)->whereBetween('created_at',[ $start, $end])->orderBy('created_at', 'DESC')->get();
                $total=0;
                foreach($stocks as $x){
                    $total+=$x->selling_price*$x->quantity;
                }
                $view=view('transactions.salesFilter',compact('stocks','total'))->render();;

                return response()->json(['html'=>$view]);
    
    
    }
    
    public function salesPDF(Request $request)
    {
        $start=Carbon::createFromFormat('Y-m-d',  $request->start)->startOfDay();
        $end=Carbon::createFromFormat('Y-m-d',  $request->end)->endOfDay();
                $stocks=SoldProduct::where('quantity','>',0)->whereBetween('created_at',[ $start, $end])->orderBy('created_at', 'DESC')->get();
                $total=0;
                foreach($stocks as $x){
                    $total+=$x->selling_price*$x->quantity;
                }
        $pdf=PDF::loadView('file.sales',compact('stocks','total','start','end'));
        $name="report.pdf";
        return $pdf->download($name);
    }
    public function getSales(){
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $stocks=SoldProduct::where('quantity','>',0)->whereBetween('created_at',[ $start, $end])->orderBy('created_at', 'DESC')->get();
        $total=0;
        foreach($stocks as $x){
            $total+=$x->selling_price*$x->quantity;
        }
        return view('transactions.sales',compact('stocks','total'));
    }
    public function getPurchasesId($id){
        $user=User::findOrFail($id);
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
       
        $stocks=PurchasedProduct::where('user_id',$id)->whereBetween('created_at',[ $start, $end])->orderBy('created_at', 'DESC')->get();
        $total=0;
        foreach($stocks as $x){
            $total+=$x->buying_price*$x->quantity;
        }
        return view('transactions.cashierId.purchases',compact('stocks','total','user'));

    }
    public function purchasePDFId(Request $request,$id)
    {
        $user=User::findOrFail($id);
        $start=Carbon::createFromFormat('Y-m-d',  $request->start)->startOfDay();
        $end=Carbon::createFromFormat('Y-m-d',  $request->end)->endOfDay();
                $stocks=PurchasedProduct::where('user_id',$user->id)->whereBetween('created_at',[ $start, $end])->orderBy('created_at', 'DESC')->get();
                $total=0;
                foreach($stocks as $x){
                    $total+=$x->buying_price*$x->quantity;
                }
        $pdf=PDF::loadView('file.purchase',compact('stocks','total','start','end','user'));
        $name="purchases".$request->start." - ".$request->end.".pdf";
        return $pdf->download($name);
        
        
    }
    public function purchaseFilterId(Request $request,$id)
    {
        $user=User::findOrFail($id);
        $start=Carbon::createFromFormat('Y-m-d',  $request->start)->startOfDay();
        $end=Carbon::createFromFormat('Y-m-d',  $request->end)->endOfDay();
                $stocks=PurchasedProduct::where('user_id',$id)->whereBetween('created_at',[ $start, $end])->orderBy('created_at', 'DESC')->get();
                $total=0;
                foreach($stocks as $x){
                    $total+=$x->buying_price*$x->quantity;
                }
                $view=view('transactions.cashierId.purchaseFilter',compact('stocks','total','user'))->render();;

                return response()->json(['html'=>$view]);
        
        
           
    
    }
    public function salesFilterId(Request $request,$id)
    {
        $user=User::findOrFail($id);
        $start=Carbon::createFromFormat('Y-m-d',  $request->start)->startOfDay();
        $end=Carbon::createFromFormat('Y-m-d',  $request->end)->endOfDay();
        $stocks=SoldProduct::join('bills', 'sold_products.bill_id', '=', 'bills.id')->where('bills.user_id',$id)->whereBetween('sold_products.created_at',[ $start, $end])->orderBy('sold_products.created_at', 'DESC')->get();
                $total=0;
                foreach($stocks as $x){
                    $total+=$x->selling_price*$x->quantity;
                }
                $view=view('transactions.cashierId.saleFilter',compact('stocks','total','user'))->render();;

                return response()->json(['html'=>$view]);
    
    
    }
    
    public function salesPDFId(Request $request,$id)
    {
        $user=User::findOrFail($id);
        $start=Carbon::createFromFormat('Y-m-d',  $request->start)->startOfDay();
        $end=Carbon::createFromFormat('Y-m-d',  $request->end)->endOfDay();
        $stocks=SoldProduct::join('bills', 'sold_products.bill_id', '=', 'bills.id')->where('bills.user_id',$user->id)->whereBetween('sold_products.created_at',[ $start, $end])->orderBy('sold_products.created_at', 'DESC')->get();
                $total=0;
                foreach($stocks as $x){
                    $total+=$x->selling_price*$x->quantity;
                }
        $pdf=PDF::loadView('file.sales',compact('stocks','total','start','end','user'));
        $name="report.pdf";
        return $pdf->download($name);
    }
    public function getSalesId($id){
        $user=User::findOrFail($id);
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $stocks=SoldProduct::join('bills', 'sold_products.bill_id', '=', 'bills.id')->where('bills.user_id',$id)->whereBetween('sold_products.created_at',[ $start, $end])->orderBy('sold_products.created_at', 'DESC')->get();
        $total=0;
        foreach($stocks as $x){
            $total+=$x->selling_price*$x->quantity;
        }
        return view('transactions.cashierId.sales',compact('stocks','total','user'));
    } 
    public function dash(){
        $salesAll=SoldProduct::all()->sum(function($t){ 
            return $t->quantity * $t->selling_price; 
        });
        
        $salesToday=SoldProduct::whereDate('created_at', DB::raw('CURDATE()'))->get()->sum(function($t){ 
            return $t->quantity * $t->selling_price; 
        });
        $salesMonth=SoldProduct::where(
            'created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString()
        )->get()->sum(function($t){ 
            return $t->quantity * $t->selling_price; 
        });
        $purchasesAll=PurchasedProduct::all()->sum(function($t){ 
            return $t->quantity * $t->buying_price; 
        });
        
        $purchasesToday=PurchasedProduct::whereDate('created_at', DB::raw('CURDATE()'))->get()->sum(function($t){ 
            return $t->quantity * $t->buying_price; 
        });
        $purchasesMonth=PurchasedProduct::where(
            'created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString()
        )->get()->sum(function($t){ 
            return $t->quantity * $t->buying_price; 
        });
        $stock=ProductStock::all()->sum(function($t){ 
            return $t->product->selling_price * $t->quantity; 
        });
        $out=Product::doesnthave('stock')->count();
        $removed=RemovedProduct::where('reason','expired')->count();



        return view('transactions.dashboard',compact('salesAll','salesToday','salesMonth','purchasesAll','purchasesToday','purchasesMonth','stock','removed','out'));
    } 
    public function month(){
        $salesChart=[
            "Jan" => 0,
            "Feb" => 0,
            "Mar" => 0,
            "Apr" => 0,
            "May" => 0,
            "Jun" => 0,
            "Jul" => 0,
            "Aug" => 0,
            "Sep" => 0,
            "Oct" => 0,
            "Nov" => 0,
            "Dec" => 0,
        ];
        $salesMonth=DB::table('sold_products')->select(DB::raw('SUM(selling_price*quantity) as count'), DB::raw("DATE_FORMAT(created_at,'%b') as months") )->
groupBy('months')->get()->pluck('count','months')->toArray();;
    
foreach ($salesMonth as $key => $value) {
    $salesChart[$key]=$value;
   
             }
             return response()->json($salesChart);
    }
    public function day(){
        $salesChart=[
            "Monday" => 0,
            "Tuesday" => 0,
            "Wednesday" => 0,
            "Thursday" => 0,
            "Friday" => 0,
            "Saturday" => 0,
            "Sunday" => 0,
          
        ];
        $salesMonth=DB::table('sold_products')->select(DB::raw('SUM(selling_price*quantity) as count'), DB::raw("DATE_FORMAT(created_at,'%W') as day") )->
        groupBy('day')->get()->pluck('count','day')->toArray();;
            
        foreach ($salesMonth as $key => $value) {
            $salesChart[$key]=$value;
           
                     }
                     return response()->json($salesChart);
    }
    public function remove(Request $request)
    {
        Validator::make($request->all(),[
          
            'medicine_id'=>'required|numeric',
            'quantity'=>'required|numeric',
            'reason'=>'required|string|min:5',
           
            
             
           

        ])->validate();  
        $id=auth()->user()->id;
        $stocks=ProductStock::findOrFail($request->medicine_id);
        if($request->quantity<=0){
            return redirect()->back()->withErrors(['error' => 'invalid quantity'])->withInput();
            
        }
        if($request->quantity>$stocks->quantity){
            return redirect()->back()->withErrors(['error' => 'insufficient quantity'])->withInput();
        }
        DB::beginTransaction();
        try{
        $removed=new RemovedProduct;
        $removed->product_id=$stocks->product->id;
        $removed->expiry_date=$stocks->expiry_date;
        $removed->quantity=$request->quantity;
        $removed->reason=$request->reason;
        $removed->user_id=$id;
        $removed->save();
        $stocks->quantity-=$request->quantity;
        $stocks->save();
        if($stocks->quantity==0){
            $stocks->delete();
        }

        DB::commit();
        return redirect()->route('stock.removed');
    } catch (Exception $e) {
        DB::rollback(); 
}




    }
    public function bringRemove()
    {

        $medicines=ProductStock::with('product')->get()->pluck('full_name','id')->all();
        return view('transactions.removeStock',compact('medicines'));
    }

}
