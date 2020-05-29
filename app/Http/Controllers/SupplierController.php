<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
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
        $suppliers=Supplier::where('deleted',0)->get();
        return view('suppliers.index',compact('suppliers'));
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
        return view('suppliers.create');
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
           
            'supplier_contact'=>'required|string|min:2|max:50',
            'company_name'=>'required|string|min:2|max:50',
            'company_contact'=>'required|string|min:2|max:50',
            
             
           

        ])->validate();
        $supplier=new Supplier;
        $supplier->name=$request->name;
        $supplier->supplier_contact=$request->supplier_contact;
        $supplier->company_name=$request->company_name;
        $supplier->company_contact=$request->company_contact;
        $supplier->save();
        return redirect()->route('suppliers.show', $supplier->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!auth()->user()->isAdmin){
            abort(403, "you must be an admin");
        }
        $supplier=Supplier::where('id',$id)->where('deleted',0)->firstOrFail();
        return view('suppliers.show',compact('supplier'));
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
        $supplier=Supplier::where('id',$id)->where('deleted',0)->firstOrFail();
        return view('suppliers.edit',compact('supplier'));
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
        $supplier=Supplier::findOrFail($id);
        Validator::make($request->all(),[
          
            'name'=>'required|string|min:2|max:50',
           
            'supplier_contact'=>'required|string|min:2|max:50',
            'company_name'=>'required|string|min:2|max:50',
            'company_contact'=>'required|string|min:2|max:50',
            
             
           

        ])->validate();
       
        $supplier->name=$request->name;
        $supplier->supplier_contact=$request->supplier_contact;
        $supplier->company_name=$request->company_name;
        $supplier->company_contact=$request->company_contact;
        $supplier->save();
        return redirect()->route('suppliers.show', $supplier->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->isAdmin){
            abort(403, "you must be an admin");
        }
        $supplier=Supplier::findOrFail($id);
        $supplier->deleted=1;
        $supplier->save();
        return redirect()->route('suppliers.index');
    }
}
