<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Wallet;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    //
    //
    public function index(){
        
        // $user=AdminUser::get();
         //return DataTables::of(AdminUser::query())->make(true);
         
         return view('Backend.wallet');
     }
 
     
     public function ssd(){
         //$data=Wallet::query();

         //Egar Loading because of use to good performance
         $data=Wallet::with('user');
         return DataTables::of($data)
         ->addColumn('account_person', function($each){
            $user=$each->user;
            //Do Check Condition because of longterm to recovery best error
            if($user){
                $output = 'Name: ' . $user->name . `<br>` .
                'Email: ' . $user->email .` <br>` .
                'Phone: ' . $user->phone;
      return $output;
            }
            return "_";
         })
         ->editColumn('amount',function($each){
            return number_format($each->amount , 2);
         })
         ->editColumn('created_at', function($each){
            return Carbon::parse($each->created_at)->format('Y-m-d H:i:s');
        })
        ->editColumn('updated_at', function($each){ // Changed to 'updated_at'
            return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
        })
         
         ->make(true);
     }
 
     
     //edit
     public function edit($id){
         //dd($id);
         $data=Wallet::where('id',$id)->first();
         //dd($data->toArray());
         return view('Backend.editUser',compact('data'));
     }
 
     public function update(Request $request,$id){
 
        
        $data=$this->requestUserData($request);
       // dd($data);
        $updateData=Wallet::where('id',$id)->update($data);
        return redirect()->route('adminPage.index');
 
     }
 
    //  //delete
    //  public function destory($id){
    //  if($id==1){
    //      return redirect()->back();
    //  }
    //  $user=AdminUser::findorfail($id);
    //  $user->delete();
    //   //return response()->json(['messege'=>'success'],200);
    //   return redirect()->back();
}
