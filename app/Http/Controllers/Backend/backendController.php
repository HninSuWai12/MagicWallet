<?php

namespace App\Http\Controllers\Backend;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class backendController extends Controller
{
    //
    public function index(){
        
       // $user=AdminUser::get();
        //return DataTables::of(AdminUser::query())->make(true);
        
        return view('Backend.AdminPage');
    }
    public function ssd(){
        return DataTables::of(AdminUser::query())->make(true);
    }


    public function chat(){
        return view('chat');
    }
   
}
