<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Nerd;
use Crypt;

class NerdController extends Controller
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
     * Load nerd view for nerd listing
     *
     * @method:index
     * @return:void
     * @author:Mukul jain
     */
    public function index(){
    	/********get all nerds***********/
    	$nerds=Nerd::all();
		return view('template.admin.pages.nerds',array('nerds'=>$nerds));
    }

	/**
     * Load nerd view for nerd listing
     *
     * @method:index
     * @return:void
     * @author:Mukul jain
     */	
    public function addEditUsers($id=''){
        //echo "in";die;
    	if($id!=''){
    		$decryptId=Crypt::decrypt($id);
	    	$nerdData=Nerd::find($decryptId);
	    	return view('template.admin.pages.showNerds',array('nerds'=>$nerdData));
	    }
    }
}
