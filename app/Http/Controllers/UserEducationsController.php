<?php

namespace App\Http\Controllers;

use App\UserEducation;
use Illuminate\Http\Request;
use Former;
use Auth;
use Validator;

class UserEducationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //protected $table = '_user_educations';
    public function index()
    {
        $user_educations = Auth::user()->user_educations;
        return view('Admin.user_educations.index',compact('user_educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.user_educations.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'degree' => 'required',
            'university' => 'required',
            'specialisation' => 'required',
            'passing_year' => 'required|numeric',
            'percentage' => 'required|numeric',
            'achievements' => 'required',
        ];
        $messages=[
        'degree.required' => 'The Degree field is required.',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try
        {
            $user_educations= new UserEducation;
            $user_educations->user_id = Auth::user()->id;
            $user_educations->degree = $request->get('degree');
            $user_educations->university = $request->get('university');
            $user_educations->specialisation = $request->get('specialisation');
            $user_educations->passing_year = $request->get('passing_year');
            $user_educations->percentage = $request->get('percentage');
            $user_educations->achievements = $request->get('achievements');
            $user_educations->image = $request->get('image');
            $user_educations->save();
            return redirect()->route('user-educations.index')->withSuccess('Insert record successfully.');
        }
         catch(\Exception $e)
        {
            return redirect()->route('user-educations.index')->withError('Something went wrong, Please try after sometime.');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserEducation  $userEducation
     * @return \Illuminate\Http\Response
     */
    public function show(UserEducation $userEducation,$slug)
    {
        $user_education = UserEducation::where('slug','=',$slug)->first();
        return view('Admin.user_educations.show',compact('user_education'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserEducation  $userEducation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_educations=UserEducation::find($id);
        return view('Admin.user_educations.edit',compact('user_educations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserEducation  $userEducation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules=[
            'degree' => 'required',
            'university' => 'required',
            'specialisation' => 'required',
            'passing_year' => 'required',
            'percentage' => 'required',
            'achievements' => 'required',
        ];
        $messages=[
        'degree.required' => 'The Degree field is required',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try
        {
            $user_educations= new UserEducation;
            $user_educations=UserEducation::find($id);
            $user_educations->degree = $request->get('degree');
            $user_educations->university = $request->get('university');
            $user_educations->specialisation = $request->get('specialisation');
            $user_educations->passing_year = $request->get('passing_year');
            $user_educations->percentage = $request->get('percentage');
            $user_educations->achievements = $request->get('achievements');
            $user_educations->image = $request->get('image');
            $user_educations->update();
            return redirect()->route('user-educations.index')->withSuccess('Insert record successfully.');
        }
         catch(\Exception $e)
        {
            return redirect()->route('user-educations.index')->withError('Something went wrong, Please try after sometime.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserEducation  $userEducation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_educations = UserEducation::find($id);
        $user_educations->delete();
        return redirect()->route('user-educations.index')->withSuccess('Deleted successfully');
    }
}
