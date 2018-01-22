<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use DB;
use Validator;
use Redirect;
use Session;
use Lang;
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
    public function userProfile (){
        $id = Auth::user()->id;
        $users = DB::table('users')->where('id',$id)->get();
        return view('template/admin/pages/profile',['users' => $users]);
    }

    /**
     * loading for updating user profile
     *
     * @method:userProfile
     * @param:null
     * @return: \Illuminate\Http\Response
     * @author:mukul jain
     */
    public function userProfileOut(){
        $allDetail=Auth::user();
        $userName=$_POST['name'];
        $email=$_POST['email'];
        /*********check validation*************/
        $validator = Validator::make(Input::all(),
           ['name' => 'required|min:5','email'=>'required']
        );
        if ($validator->fails()){
            return Redirect::to('userProfile')->withErrors($validator->errors());
        }else{
            /***for uploading image***/
            $id = Auth::user()->id;
            if(Input::hasFile('file')){
                $file=Input::file('file');
                $file->move('uploads', $file->getClientOriginalName());
                $filename=$file->getClientOriginalName();
               
            }else{
                $filename=Auth::user()->image;
            }
            DB::table('users')
               ->where('id', $id)
               ->update(['image' =>$filename,'name'=>$userName,'email'=>$email]);
        }
        Session::flash('success', Lang::get('user.profileUpdate')); 
        return Redirect::to('userProfile');
    }


    public function sendMail(){
       $user = Auth::user();//retrieved by $request->user() in __construct
     
       echo  Mail::send('auth.emails.password', ['user' => $user], function ($m) use ($user) {
            $m->from('admin@kalamansee.com', 'sample');

            $m->to($user->email, $user->name)->subject('Verify Email');
        });die;
    }
}//MAIN CLASS END
