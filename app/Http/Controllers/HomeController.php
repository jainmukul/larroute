<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('template/admin/pages/admin_view');
    }

    /**
     * loading for updating user profile
     *
     * @method:userProfile
     * @param:null
     * @return: \Illuminate\Http\Response
     * @author:mukul jain
     */
    public function userProfile(){
        $id = Auth::user()->id;
        if(Input::hasFile('file')){
            $file=Input::file('file');
            $file->move('uploads', $file->getClientOriginalName());
            DB::table('users')
                ->where('id', $id)
                ->update(['image' => $file->getClientOriginalName()]);
        }
        return view('template/admin/pages/profile');
    }


    public function sendMail(){
       $user = Auth::user();//retrieved by $request->user() in __construct
     
       echo  Mail::send('auth.emails.password', ['user' => $user], function ($m) use ($user) {
            $m->from('admin@kalamansee.com', 'sample');

            $m->to($user->email, $user->name)->subject('Verify Email');
        });die;
    }
}
