<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Doctor;

use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor=doctor::all();
                $data = array('doctor'=>$doctor);
                return view('user.home', compact('doctor'));
            }
            else
            {
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $doctor=doctor::all();
            $data = array('doctor'=>$doctor);
            return view('user.home', compact('doctor'));
        }
        
    }

    public function appointment(Request $request)
    {
        $data=new appointment;
        
        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->doctor=$request->doctor;
        $data->phone=$request->number;
        $data->message=$request->message;
        $data->status='In progress';

        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','Appointment Request Successful, We will contact you soon');
        

    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $userid=Auth::user()->id;
            $appoint=appointment::where('user_id',$userid)->get(); //if the user id in the table and 'userid' matches then only it will get that specific appointment for that specific user
            return view('user.my_appointment',compact('appoint'));
        }
        else
        {
            return redirect()->back();
        }
        
    }

    public function cancel_appoint($id)
    {
        $data=appointment::find($id);
        $data->delete();

        return redirect()->back();
    }

}
