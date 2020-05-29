<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(!auth()->user()->isAdmin){
            abort(403, "you must be an admin");
        }
        $types=ProductType::all();
        return view('productTypes.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAdmin){
            abort(403, "you must be an admin");
        }
        return view('productTypes.create');
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
           

        ])->validate();
        $type=new ProductType;
        $type->name=$request->name;
        $type->save();
        return redirect()->route('productTypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->isAdmin){
            abort(403, "you must be an admin");
        }
        $type=ProductType::findOrFail($id);
        return view('productTypes.edit',compact('type'));
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
        $type=ProductType::findOrFail($id);
        Validator::make($request->all(),[
          
            'name'=>'required|string|min:2|max:50',
           

        ])->validate();
      
        $type->name=$request->name;
        $type->save();
        return redirect()->route('productTypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
