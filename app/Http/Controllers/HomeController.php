<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\apointment;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::check()) {
            if (Auth::user()->usertype == '0') {
                // Retrieve the doctors and pass them to the user.home view
                $doctors = Doctor::all();
                return view('user.home', compact('doctors'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }
    

    public function index()
    {
        if(Auth::id()){
            return redirect('home');
        }
        else
        $doctors = doctor::all();
        return view('user.home', compact('doctors'));
    }
    public function appointment(Request $request){
        $data= new apointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->number=$request->number;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status='IN PROGRESS';
        if(Auth::id()){
            $data->user_id=Auth::user()->id;

        }
        $data->save();
        return redirect()->back()->with('message','WE WILL CONTACT YOU SOON ,الله يشافيك اخي');
        

       




    }
    public function myappointemnet()
    {
        if (Auth::id()) {
            $userid=Auth::user()->id;
            $appoints=apointment::where('user_id',$userid)->get();
            return view('user.my_appointemnet',compact('appoints'));
        } else {
            return redirect()->route('login'); // ila m3ndoch compte ymchi ysawbo wla ylogani
        }
    }

    public function  cancel_appoint($id){
        $data=apointment::find($id);
        $data->delete();
        return redirect('/home')->with('message','khouya rak mshti rondivoo ya akhi ');// lmohim chi hd ythabo m3rftch nktb rendez-vous

    }
}
