<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Wallet;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Healper\UUIDGenerate;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class frontendController extends Controller
{
    //
    public function home(){
        return view('Frontend.Layout.frontend');
    }

    public function index(){
        
        // $user=User::get();
         //return DataTables::of(AdminUser::query())->make(true);
         
         return view('Frontend.UserInfo.UserPage');
     }
 
     
     public function ssd(){
         $data=User::query();
         return DataTables::of($data)
         ->editColumn('user_agent', function($each){
             $agent = new Agent();
             $agent->setUserAgent($each->user_agent);
             $device = $agent->device();
             $platform = $agent->platform();
             $browser = $agent->browser();
             return `<table class="table table-bordered" >
             <tbody>
             <tr> <td> Device</td> <td> `. $device.` </td> </tr>
             <tr> <td> Platform</td> <td> `. $platform.` </td> </tr>
             <tr> <td> Browser</td> <td> `. $browser.` </td> </tr>
 
             </tbody>
             </table>`;
         })
         ->addColumn('action',function($each){
             $btn='<a href=" ' . route('userPage.edit', [$each->id]) . ' "><i class="fa-solid fa-user-pen text-info  dataBtn"></i></a>';
             $btn=$btn.'<a href=" '. route('userData.delete' ,[$each->id] ).' " data-toggle="tooltip" onclick="hapusUsers('.$each->id.')"  " id="delete-event"  class="deleteProduct">
             <i class="fa-solid fa-trash text-danger dataBtn "  ></i></a>';
             return   $btn;
         })->rawColumns(['user_agent', 'action'])
         ->make(true);
     }
 
     //addAdmin
     public function addUser(){
         return view('Frontend.UserInfo.addUser');
     }
 
     public function store(Request $request){
         //dd($request->all());
         $this->userCheckValidate($request);
         $data=$this->requestUserData($request);
         DB::beginTransaction();
         try{
            $storeData=User::create($data);
         Wallet::firstOrCreate(
            [
                'user_id'=>$storeData->id,
            ],
            [
                'account_number'=>UUIDGenerate::accountNumber(),
                'amount'=>0,
            ]
         );
         DB::commit();
         return redirect()->route('userPage.index');
         } catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('user#addUser')->with(['fails'=>'Something Wrong . '.$e->getMessage()]);
         }
         
     }
     //edit
     public function edit($id){
        // dd($id);
        
         DB::beginTransaction();
         try{
            $data=User::where('id',$id)->first();
         Wallet::firstOrCreate(
            [
                'user_id'=>$data->id,
            ],
            [
                'account_number'=>UUIDGenerate::accountNumber(),
                'amount'=>0,
            ]
         );
         DB::commit();
         return view('Frontend.UserInfo.editUser',compact('data'));
         } catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('userPage.edit')->with(['fails'=>'Something Wrong . '.$e->getMessage()]);
         }
         //dd($data->toArray());
        
     }
 
     public function update(Request $request,$id){
 
        
        $data=$this->requestUserData($request);
       // dd($data);
        $updateData=User::where('id',$id)->update($data);
        return redirect()->route('userPage.index');
 
     }
 
     //delete
     public function destory($id){
     if($id==1){
        return redirect()->route('userPage.index');
     }
     $user=User::findorfail($id);
     $user->delete();
      //return response()->json(['messege'=>'success'],200);
      return redirect()->route('userPage.index');
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
