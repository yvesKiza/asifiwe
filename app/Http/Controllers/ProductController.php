<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use App\Manufacturer;
use Illuminate\Http\Request;
use App\ProductSellingPriceHistory;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
         
      $medicines=Product::where('deleted',0)->get();
      return view('products.index',compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $types=ProductType::pluck('name','id')->all();
        $manufacturers=Manufacturer::where('deleted',0)->pluck('name','id')->all();
        return view('products.create',compact('types','manufacturers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
          
            'name'=>'required|string|min:2|max:50',
            'manufacturer_id'=>'required|integer',
            'quantity_per_pack'=>'required|integer',
            'product_type_id'=>'required|integer',
            'selling_price'=>'required|numeric',
            'description'=>'nullable|string|min:2|max:50',
            
            
             
           

        ])->validate();
        $product=new Product;
        $product->name=$request->name;
        $product->manufacturer_id=$request->manufacturer_id;
        $product->product_type_id=$request->product_type_id;
        $product->description=$request->description;
        $product->selling_price=$request->selling_price;
        $product->quantity_per_pack=$request->quantity_per_pack;
        $product->save();
        $history=new ProductSellingPriceHistory;
        $history->price=$product->selling_price;
        $history->user_id=auth()->user()->id;
        $history->product_id=$product->id;
        $history->save();
        return redirect()->route('products.show', $product->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $x=Product::where('deleted',0)->where('id',$id)->firstOrFail();
        return view('products.show',compact('x'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $medicine=Product::where('deleted',0)->where('id',$id)->firstOrFail();
        $types=ProductType::pluck('name','id')->all();
        $manufacturers=Manufacturer::where('deleted',0)->pluck('name','id')->all();
        return view('products.edit',compact('types','manufacturers','medicine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::findOrFail($id);
        Validator::make($request->all(),[
          
            'name'=>'required|string|min:2|max:50',
            'manufacturer_id'=>'required|integer',
            'quantity_per_pack'=>'required|integer',
            'product_type_id'=>'required|integer',
          
            'description'=>'nullable|string|min:2|max:50',
            
            
             
           

        ])->validate();
        
        $product->name=$request->name;
        $product->manufacturer_id=$request->manufacturer_id;
        $product->product_type_id=$request->product_type_id;
        $product->description=$request->description;
       
        $product->quantity_per_pack=$request->quantity_per_pack;
        $product->save();
        return redirect()->route('products.show',$product->id );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $x =Product::where('deleted',0)->where('id',$id)->firstOrFail();
        $x->deleted=1;
        $x->save();
        return redirect()->route('products.index' );


    }
    public function setPrice(Request $request,$id){
      
        $x=Product::where('deleted',0)->where('id',$id)->firstOrFail();
        Validator::make($request->all(),[
          
            'selling_price'=>'required|numeric',
            
            
            
             
           

        ])->validate();
        $x->selling_price=$request->selling_price;
        $x->save();
        $history=new ProductSellingPriceHistory;
        $history->price=$x->selling_price;
        $history->user_id=auth()->user()->id;
        $history->product_id=$x->id;
        $history->save();
        return redirect()->route('products.show', $x->id);
    }
    public function getPrice($id)
    {
        $medicine=Product::where('deleted',0)->where('id',$id)->firstOrFail();
        return view('products.price',compact('medicine'));
    }
}
