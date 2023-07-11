<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Rules\ReCaptcha;
  
class ContactController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('contactForm');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
  
        $input = $request->all();
  
        /*------------------------------------------
        --------------------------------------------
        Write Code for Store into Database
        --------------------------------------------
        --------------------------------------------*/
        //dd($input);
  
        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }
}