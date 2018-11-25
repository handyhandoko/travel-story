<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\ShareCost;
use App\ShareCostImage;
use Validator;
use Redirect;
use Auth;

class ShareCostController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $share_costs = ShareCost::orderBy('id', 'DESC')->paginate(10);
        return view('sharecost', [
            'share_costs' => $share_costs
        ]);
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
     * @param \App\ShareCost  $sharecost
     * @param \Illuminate\Http\Request  $request
     * @return \App\ShareCost $sharecost
     */
    private function setData($sharecost, $request){
        $sharecost->content = $request->content;
        $sharecost->end_time= Carbon::createFromFormat('d/m/Y', $request->end_time);
        $sharecost->contact= $request->contact;
        $sharecost->wa_contact= $request->wa_contact;
        $sharecost->user_id = Auth::user()->id;
        return $sharecost;        
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
        // dd($request);

		if ($validator->fails()) {
            // if not valid redirect back with data and error.
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		} else {
            $sharecost = new ShareCost;
            $this->setData($sharecost, $request);
            $sharecost->save();
            
            //update sharecost_id on sharecost image table 
            if($request->image_ids)
                ShareCostImage::whereIn('id', $request->image_ids)
                        ->update(array('share_cost_id' => $sharecost->id));

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
        $share_cost = ShareCost::find($id);
        return view('pages/full_sharecost', [
            'share_cost' => $share_cost
        ]);
    }
}
