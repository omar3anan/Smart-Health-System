<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

use App\Models\Appointment;

use Notification;

use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor=new doctor;
        $image=$request->file; //geting the file inside this variable
        $imagename=time().'.'.$image->getClientOriginalExtension(); //when uploading diffrent images, will have diffrenet name depending on this time function 
        $request->file->move('doctorimage',$imagename); //moving this file inside a folder called "doctorimage"; this file will be inside 'public' folder
        $doctor->image=$imagename; //we are sending this doctor image to our database (image)
        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->department=$request->department;

        $doctor->save();

        return redirect()->back()->with('message','Doctor Added Successfully');
    }

    public function showappointment()
    {
        $data=appointment::all();
        return view('admin.showappointment',compact('data'));

    }

    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();

        return redirect()->back();
    }

    public function canceled($id)
    {
        $data=appointment::find($id);
        $data->status='canceled';
        $data->save();

        return redirect()->back();
    }

    public function showdoctor()
    {
        $data=doctor::all();
        return view('admin.showdoctor',compact('data'));

    }

    public function deletedoctor($id)
    {
        $data=$data=doctor::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        $data=doctor::find($id);


        return view('admin.update_doctor',compact('data'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor=doctor::find($id);

        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->department=$request->department;

        $image=$request->file;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorimage',$imagename);
            $doctor->image=$imagename;
        }
        
        $doctor->save();
        
        return redirect()->back()->with('message','Doctor\'s details updates successfully');
        return;
    }

    public function emailview($id)
    {
        $data=appointment::find($id);

        return view('admin.email_view',compact('data'));
    }

    public function sendemail(Request $request, $id)
    {
        $data=appointment::find($id);

        $details=
        [
            'greeting'=>$request->greeting,
            'body'=>$request->body,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->actionurl,
            'endpart'=>$request->endpart
        ];

        Notification::send($data,new SendEmailNotification($details));

        return redirect()->back()->with('message','Email Sent Successfully');


    }

}
