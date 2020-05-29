<?php

namespace App\Http\Controllers;

use App\Rules\checkPassword;
use Illuminate\Http\Request;
use App\Notifications\Welcome;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getUser()
    {
        if(!auth()->user()->isAdmin){
            abort(403, "you must be an admin");
        }
      return view('user.create');
    }
    public function users(){
        if(!auth()->user()->isAdmin){
            abort(403, "you must be an admin");
        }
          $id=auth()->user()->id;
        $users=User::where('deleted',0)->where('id','!=',$id)->get();
        return view('user.index',compact('users'));
    }
    public function show($id){
        if(!auth()->user()->isAdmin){
            abort(403, "you must be an admin");
        }
        $x=User::where('deleted',0)->where('id',$id)->firstOrFail();
        return view('user.show',compact('x'));

    }
    public function addUser(Request $request)
    {
        Validator::make($request->all(),[
          
            'name'=>'required|string|min:2|max:50',
           
            'email'=>'bail|required|email|unique:users,email',
            'gender'=>'required|in:1,2',
            'salary'=>'required|numeric|min:0',
            'CNIC'=>'bail|required|string|min:2|max:100|unique:users,CNIC',
            'address'=>'required|string|min:2|max:100',
            'role'=>'required|in:admin,cashier',
             
             
           

        ])->validate();

        $user =new User;
        DB::beginTransaction();
        try{
           
            $user->name=$request->name;
           if($request->gender==1)
            $user->gender=1;
            else
            $user->gender=0;

            $user->email=$request->email;
            $user->address=$request->address;
        
            $user->password=Hash::make("wapiwapi");
        
            $user->isActive=1;
            $user->CNIC=$request->CNIC;
            $user->salary=$request->salary;
            if($request->role=='admin'){
                $user->isAdmin=1;
            }else{
                $user->isAdmin=0;
            }
            $user->save();
            
       
         DB::commit();
         return redirect()->route('user.index', $user->id);
         } catch(\Exception $e)
         {
            DB::rollback();
            throw $e;
        }
       
    
    }
    public function enableDisable($id)
    {
        $user=User::findOrfail($id);
        $user->isActive=!$doctor->isActive;
        $user->save();
        return redirect()->back();
    }
    public function deleteUser($id){
        
        if(!auth()->user()->isAdmin){
            abort(403, "you must be an admin");
        }

        $user=User::findOrfail($id);
        $user->isActive=0;
        $user->deleted=1;
        $user->save();
       return redirect()->route('user.index');
    }
    public function updateEmail(Request $request)
    {
        $user = Auth::user();
       
        
        Validator::make($request->all(), [
           
            'password' => ['required', 'string', 'max:255',new PasswordRule],
            'email'=>['bail','email','unique:users,email,'.$user->id],
            
        ])->validate();
        
       
       
        
         
          $user->email=$request->email;
         
          $user->save();
          return redirect()->back()->with("success","email updated successfully");
    }
   
    public function updatePassword(Request $request){
        Validator::make($request->all(), [
           
            'current' => ['required', 'string',new checkPassword],
            'new'=>'required|min:8|max:255',
            'password_confirmation' => 'same:new',
            
            
        ])->validate();
        $user = Auth::user();
        
           $user->password= Hash::make($request->new);
           $user->save();
          return redirect()->back()->with("success","password updated successfully");
    }
}
