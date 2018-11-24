<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\StoryImage;
use Validator;
use Redirect;
use Auth;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * validate input
     * 
     * @param \Illuminate\Http\Request  $request
     * @return \Validator $validator
     */
    public function validateInput($request){
        //make validator
		$rules = array(
            'content'   => 'required',
		);
        return Validator::make($request->all(), $rules);        
    }

    /**
     * set data from request to model
     * 
     * @param \App\Story  $story
     * @param \Illuminate\Http\Request  $request
     * @return \App\Story $story
     */
    private function setData($story, $request){
        $story->content         = $request->content;
        $story->user_id         = Auth::user()->id;
        return $story;        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate using validate input function
        $validator = $this->validateInput($request);

		if ($validator->fails()) {
            // if not valid redirect back with data and error.
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		} else {
            $story = new Story;
            $this->setData($story, $request);
            $story->save();
            
            //update story_id on story image table 
            StoryImage::whereIn('id', $request->story_image_ids)
                        ->update(array('story_id' => $story->id));

            //TODO: add notif here
            // redirect
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Story::find($id);
        return view('pages/full_story', [
            'story' => $story
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}