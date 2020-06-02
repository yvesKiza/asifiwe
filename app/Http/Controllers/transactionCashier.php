<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\SoldProduct;
use App\PurchasedProduct;
use Illuminate\Http\Request;
use PDF;

class transactionCashier extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function getPurchases(){
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $id=auth()->user()->id;
        $stocks=PurchasedProduct::where('user_id',$id)->whereBetween('created_at',[ $start, $end])->orderBy('created_at', 'DESC')->get();
        $total=0;
        foreach($stocks as $x){
            $total+=$x->buying_price*$x->quantity;
        }
        return view('transactions.cashier.purchases',compact('stocks','total'));

    }
    public function purchasePDF(Request $request)
    {
        $user=auth()->user();
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
    public function purchaseFilter(Request $request)
    {
        $id=auth()->user()->id;
        $start=Carbon::createFromFormat('Y-m-d',  $request->start)->startOfDay();
        $end=Carbon::createFromFormat('Y-m-d',  $request->end)->endOfDay();
                $stocks=PurchasedProduct::where('user_id',$id)->whereBetween('created_at',[ $start, $end])->orderBy('created_at', 'DESC')->get();
                $total=0;
                foreach($stocks as $x){
                    $total+=$x->buying_price*$x->quantity;
                }
                $view=view('transactions.cashier.purchaseFilter',compact('stocks','total'))->render();;

                return response()->json(['html'=>$view]);
        
        
           
    
    }
    public function salesFilter(Request $request)
    {
        $id=auth()->user()->id;  
        $start=Carbon::createFromFormat('Y-m-d',  $request->start)->startOfDay();
        $end=Carbon::createFromFormat('Y-m-d',  $request->end)->endOfDay();
        $stocks=SoldProduct::join('bills', 'sold_products.bill_id', '=', 'bills.id')->where('bills.user_id',$id)->whereBetween('sold_products.created_at',[ $start, $end])->orderBy('sold_products.created_at', 'DESC')->get();
                $total=0;
                foreach($stocks as $x){
                    $total+=$x->selling_price*$x->quantity;
                }
                $view=view('transactions.cashier.saleFilter',compact('stocks','total'))->render();;

                return response()->json(['html'=>$view]);
    
    
    }
    
    public function salesPDF(Request $request)
    {
        $user=auth()->user();  
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
    public function getSales(){
        $id=auth()->user()->id;
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $stocks=SoldProduct::join('bills', 'sold_products.bill_id', '=', 'bills.id')->where('bills.user_id',$id)->whereBetween('sold_products.created_at',[ $start, $end])->orderBy('sold_products.created_at', 'DESC')->get();
        $total=0;
        foreach($stocks as $x){
            $total+=$x->selling_price*$x->quantity;
        }
        return view('transactions.cashier.sales',compact('stocks','total'));
    }   
}
