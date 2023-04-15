<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Response;

class ReminderController extends Controller
{
    public function index()
    {
        $data['reminder'] = Reminder::orderBy('id','desc')->paginate(10);
   
        return view('reminder.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reminder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
          
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
       }else{  
       
        $insert = [
           
            'title' => $request->title,
            'description' => $request->description,
            'datetime' => $request->datetime,
        ];
   
        Reminder::insertGetId($insert);
       }
        return Redirect::to('reminders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       
        $reminder = Reminder::where('id',$request->id)->first();
       
        return view('reminder.edit',compact('reminder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);
       
       if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
       }else{        
    
        $input = $request->all();
               
        $group = Reminder::where('id', $request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'datetime' => $request->datetime,
            
        ]);
      
    }
        return redirect()->route('reminders.index')->with('success','group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {        
        $reminder = Reminder::where('id',$id)->first();
        $reminder->delete();
        return response('Reminder deleted successfully.', 200);
    }
}
