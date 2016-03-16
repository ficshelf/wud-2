<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClaimsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_claims=\App\Models\Claim::all();
	return response()->json($all_claims);
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
		if(!$request->input('claim_id') or !$request->input('patient'))
		{	// return error kind of 400,204,422
			return response()->json(['Error' => 'params failed validation for claim'], 422);
		}
		//Insert
	        //return response()->json($input);  //was testing

		$claim = new \App\Models\Claim();
		$claim->claim_id = $input['claim_id'];
		$claim->patient = $input['patient'];
		
		$inserted = $claim->save();
		if(isset($inserted)){
			return response()->json(['Message' => 'Claim Successfully Created'], 201);
			
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
        $claim=\App\Models\Claim::find($id);
	return response()->json($claim);
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
		if(!$request->input('patient'))
		{	// return error kind of 400,204,422
			return response()->json(['Error' => 'params failed validation for claim'], 422);
		}
		//Update

		$claim = \App\Models\Claim::find($id);
		if(!isset($claim))
			return response()->json(['Error' => 'No such claim'], 304);
		
		$claim->patient = $input['patient'];
		
		$updated = $claim->save();
		if(isset($updated)){
			return response()->json(['Message' => 'Claim Successfully Updated'], 200);
			
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
	$claim = \App\Models\Claim::find($id);
	if(!isset($claim)) {
		return response()->json(['Error' => 'No such claim'], 304);
		} else {
 		 $claim->delete();
		 return response()->json(['Message' => 'Claim Deleted Successfully'], 200);
		}
    }
}
