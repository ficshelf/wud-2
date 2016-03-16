<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LegalEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_legalEvents=\App\Models\LegalEvent::all();
	return response()->json($all_legalEvents);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
	{
		$input = $request->all();

		//validate
		if(!$request->input('claim_id') or !$request->input('defendant') or !$request->input('claim_status') or !$request->input('change_date'))
		{	// return error kind of 400,204,422
			return response()->json(['Error' => 'params failed validation for legalEvent'], 422);
		}
		//Insert
	        //return response()->json($input);  //was testing

		$legalEvent = new \App\Models\LegalEvent();
		$legalEvent->claim_id = $input['claim_id'];
		$legalEvent->claim_status = $input['claim_status'];
		$legalEvent->change_date = $input['change_date'];
		$legalEvent->defendant = $input['defendant'];
		
		$inserted = $legalEvent->save();
		if(isset($inserted)){
			return response()->json(['Message' => 'LegalEvent Successfully Created'], 201);
			
		}else{	// return response code 187, 406 		 
			return response()->json(['Message' => 'Data not acceptable'], 187);
		}
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
        //
        $legalEvent=\App\Models\LegalEvent::find($id);
	return response()->json($legalEvent);
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
		$input = $request->all();

		//validate
		if(!$request->input('claim_id') or !$request->input('defendant') or !$request->input('claim_status') or !$request->input('change_date'))
		{	// return error kind of 400,204,422
			return response()->json(['Error' => 'params failed validation for legalEvent'], 422);
		}
		//Update

		$legalEvent = \App\Models\LegalEvent::find($id);
		if(!isset($legalEvent))
			return response()->json(['Error' => 'No such legalEvent'], 304);
		
		$legalEvent->claim_id = $input['claim_id'];
		$legalEvent->claim_status = $input['claim_status'];
		$legalEvent->change_date = $input['change_date'];
		$legalEvent->defendant = $input['defendant'];
		
		$updated = $legalEvent->save();
		if(isset($updated)){
			return response()->json(['Message' => 'LegalEvent Successfully Updated'], 200);
			
		}else{	// return response 304 		 
			return response()->json(['Message' => 'Not Updated'], 304);
		}
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
	$legalEvent = \App\Models\LegalEvent::find($id);
	if(!isset($legalEvent)) {
		return response()->json(['Error' => 'No such legalEvent'], 304);
		} else {
 		 $legalEvent->delete();
		 return response()->json(['Message' => 'LegalEvent Deleted Successfully'], 200);
		}
    }
}
