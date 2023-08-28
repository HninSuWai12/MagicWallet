<?php

namespace App\Http\Controllers\Backend;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class backendController extends Controller
{
    //
    public function index(){
        
       // $user=AdminUser::get();
        //return DataTables::of(AdminUser::query())->make(true);
        
        return view('Backend.AdminPage');
    }

    
    public function ssd(){
        $data=AdminUser::query();
        return DataTables::of($data)
        ->addColumn('action',function($each){
            $btn='<a href=" ' . route('adminPage.edit', [$each->id]) . ' "><i class="fa-solid fa-user-pen text-info  dataBtn"></i></a>';
            $btn=$btn.'<a href=" '. route('data.delete' ,[$each->id] ).' " data-toggle="tooltip" onclick="hapusUsers('.$each->id.')"  " id="delete-event"  class="deleteProduct">
            <i class="fa-solid fa-trash text-danger dataBtn "  ></i></a>';
            return   $btn;
        })->rawColumns(['action'])
        ->make(true);
    }

    //addAdmin
    public function addUser(){
        return view('Backend.addUser');
    }

    public function store(Request $request){
        //dd($request->all());
        $this->userCheckValidate($request);
        $data=$this->requestUserData($request);
        $storeData=AdminUser::create($data);
        return redirect()->route('adminPage.index');
    }
    //edit
    public function edit($id){
        //dd($id);
        $data=AdminUser::where('id',$id)->first();
        //dd($data->toArray());
        return view('Backend.editUser',compact('data'));
    }

    public function update(Request $request,$id){

       
       $data=$this->requestUserData($request);
      // dd($data);
       $updateData=AdminUser::where('id',$id)->update($data);
       return redirect()->route('adminPage.index');

    }

    //delete
    public function destory($id){
    if($id==1){
        return redirect()->back();
    }
    $user=AdminUser::findorfail($id);
    $user->delete();
     //return response()->json(['messege'=>'success'],200);
     return redirect()->back();
    }









    //Validation for add User
    private function userCheckValidate($request){
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|max:11',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ], [
            'name.required' => 'Name field is required.',
            'phone.required' => 'Password field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.'
        ]);
        return $validatedData;
    }
   
    //AddData for 
    private function requestUserData($request){
        $requestData=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password)
        ];
        return $requestData;
    }
}
