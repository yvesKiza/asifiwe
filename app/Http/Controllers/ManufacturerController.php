<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManufacturerController extends Controller
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
        $manufacturers=Manufacturer::where('deleted',0)->get();
        return view('manufacturers.index',compact('manufacturers'));
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
        return view('manufacturers.create');
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
            'address'=>'required|string|min:2|max:50',
            'contact'=>'required|string|min:2|max:50',
            'description'=>'nullable|string|min:2|max:50',
            'website'=>'nullable|string|min:2|max:50',
            
             
           

        ])->validate();
        $manufacturer=new Manufacturer;
        $manufacturer->name=$request->name;
        $manufacturer->address=$request->address;
        $manufacturer->contact=$request->contact;
        $manufacturer->description=$request->description;
        $manufacturer->website=$request->website;
        $manufacturer->save();
        return redirect()->route('manufacturers.show', $manufacturer->id);

      
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
        $x=Manufacturer::where('id',$id)->where('deleted',0)->firstOrFail();
        return view('manufacturers.show',compact('x'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {if(!auth()->user()->isAdmin){
        abort(403, "you must be an admin");
    }
        $manufacturer=Manufacturer::where('id',$id)->where('deleted',0)->firstOrFail();
        return view('manufacturers.edit',compact('manufacturer'));
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
        if(!auth()->user()->isAdmin){
            abort(403, "you must be an admin");
        }
        $manufacturer=Manufacturer::findOrFail($id);
        Validator::make($request->all(),[
          
            'name'=>'required|string|min:2|max:50',
            'address'=>'required|string|min:2|max:50',
            'contact'=>'required|string|min:2|max:50',
            'description'=>'nullable|string|min:2|max:50',
            'website'=>'nullable|string|min:2|max:50',
            
             
           

        ])->validate();
       
        $manufacturer->name=$request->name;
        $manufacturer->address=$request->address;
        $manufacturer->contact=$request->contact;
        $manufacturer->description=$request->description;
        $manufacturer->website=$request->website;
        $manufacturer->save();
        return redirect()->route('manufacturers.show', $manufacturer->id);
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
        $x=Manufacturer::where('id',$id)->where('deleted',0)->firstOrFail();
        $x->deleted=1;
        $x->save();
        return redirect()->route('manufacturers.index');

    }
}
