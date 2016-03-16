<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DefendantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_defendants=\App\Models\Defendant::all();
	return response()->json($all_defendants);
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
		if(!$request->input('defendant_id') or !$request->input('defendant'))
		{	// return error kind of 400,204,422
			return response()->json(['Error' => 'params failed validation for defendant'], 422);
		}
		//Insert
	        //return response()->json($input);  //was testing

		$defendant = new \App\Models\Defendant();
		$defendant->defendant_id = $input['defendant_id'];
		$defendant->defendant = $input['defendant'];
		
		$inserted = $defendant->save();
		if(isset($inserted)){
			return response()->json(['Message' => 'Defendant Successfully Created'], 201);
			
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
        $defendant=\App\Models\Defendant::find($id);
	return response()->json($defendant);
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
		if(!$request->input('defendant'))
		{	// return error kind of 400,204,422
			return response()->json(['Error' => 'params failed validation for defendant'], 422);
		}
		//Update

		$defendant = \App\Models\Defendant::find($id);
		if(!isset($defendant))
			return response()->json(['Error' => 'No such defendant'], 304);
		
		$defendant->defendant = $input['defendant'];
		
		$updated = $defendant->save();
		if(isset($updated)){
			return response()->json(['Message' => 'Defendant Successfully Updated'], 200);
			
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
	$defendant = \App\Models\Defendant::find($id);
	if(!isset($defendant)) {
		return response()->json(['Error' => 'No such defendant'], 304);
		} else {
 		 $defendant->delete();
		 return response()->json(['Message' => 'Defendant Deleted Successfully'], 200);
		}
    }
}
