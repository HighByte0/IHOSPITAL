<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\hosnif;
use App\Models\Apointment;
use Illuminate\Http\Request;
use App\Notifications\hosnotif;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Notification;


class AdminController extends Controller
{
    public function addview()

    {
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.add_doctor');

            }
            else
            {
                return redirect()->back();
            }

        }
        else
        {
            return redirect( 'login');
        }
        
    }

    public function upload(Request $request)
    {
        // Validate the form data
        $request->validate([
            'dr_name' => 'required|string|max:255',
            'dr_nbr' => 'required|string|max:255',
            'dr_Specialties' => 'required|string|max:255',
            'dr_room' => 'required|string|max:255',
            'dr_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $doctor = new Doctor;

        // Retrieve the image file from the request
        $image = $request->file('dr_image');

        // Generate a unique name based on the current timestamp and the original file extension
        $imagename = time().'.'.$image->getClientOriginalExtension();

        // Move the uploaded image to the 'drimage' folder
        $image->move('drimage', $imagename);

        // Set the attributes of the Doctor model with the form data
        $doctor->dr_image = $imagename;
        $doctor->dr_name = $request->dr_name;
        $doctor->dr_nbr = $request->dr_nbr;
        $doctor->dr_room = $request->dr_room;
        $doctor->dr_Specialties = $request->dr_Specialties;

        // Save the new doctor to the database
        $doctor->save();

        // Redirect the user back to the previous page cancel
        return redirect()->back()->with('message', 'dr added successfully');
       
    }

    public function show_appoint(){
        if(Auth::check() && Auth::user()->usertype == 1){
            $data = Apointment::all();
            return view('admin.show_appoint', compact('data'));
        } else {
            return redirect()->route('login');
        }
    }
    

    public function approved($id){
        $data=Apointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();

    
    }
    public function cancel($id){
        $data=Apointment::find($id);
        $data->status='rejected pleas take another one';
        $data->save();
        return redirect()->back();

    }
    public function showdr(){
        $data=Doctor::all();
        return view('admin.showdr',compact('data'));
    }
    //doctor resign
    public function to_resign($id){
        $data=Doctor::find($id);
        $data->delete();
        return redirect()->back()->with('message','doctor  ' .$data->dr_name. 'resign successfully');  



    }
    public function to_update($id){
        $data=Doctor::find($id);
        return view('admin.update',compact('data'));
    }
    public function to_submit(Request $request ,$id){
          
      
        $doctor = Doctor::find($id);
        $doctor->dr_name = $request->dr_name;
        $doctor->dr_nbr = $request->dr_nbr;
        $doctor->dr_room = $request->dr_room;
        $doctor->dr_Specialties = $request->dr_Specialties;

        // Retrieve the image file from the request
        $image = $request->file('dr_image');
        if($image){


        

        // Generate a unique name based on the current timestamp and the original file extension
        $imagename = time().'.'.$image->getClientOriginalExtension();

        // Move the uploaded image to the 'drimage' folder
        $image->move('drimage', $imagename);

        // Set the attributes of the Doctor model with the form data
        $doctor->dr_image = $imagename;
    }
    

        // Save the new doctor to the database
        $doctor->save();
 
        // Redirect the user back to the previous page cancel end url action url action text body
        return redirect()->back()->with('message', 'dr added successfully');

    }
    public function emailview($id)

    {
        $data=Apointment::find($id);

        return view('admin.email_view',compact('data'));
    }
    public function sendemail(Request $request, $id){

        $data = Apointment::find($id);
        $details = [
            'greeting'   => $request->greeting,
            'body'       => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl'  => $request->actionurl,
            'endpart'    => $request->endpart,
        ];
    
        
        Notification::send($data,new hosnotif($details));
    
        return redirect()->back()->with('message','the email has been send successuly');
    }

}
