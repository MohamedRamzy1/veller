<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class educationController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "id" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "degree" => "required",
            "institution" => "required"
        ]);
        $model = new Model("education");
        $requestData = $request->all();
        $id = $requestData["id"];
        $start_Date = "'".$requestData["start_date"]."'";
        $end_Date = "'".$requestData["end_date"]."'";
        $degree = "'".$requestData["degree"]."'";
        $inst = "'".$requestData["institution"]."'";
        
        $values = array(
            "applicant_id" => $id,
            "start_date" => $start_Date,
            "end_date" => $end_Date,
            "degree" => $degree,
            "institution" => $inst
        )
        $model->insert($values);
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
        $request->validate([
            "id" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "degree" => "required",
            "institution" => "required"
        ]);
        $model = new Model("education");
        $requestData = $request->all();
        $id = $requestData["id"];
        $start_Date = "'".$requestData["start_date"]."'";
        $end_Date = "'".$requestData["end_date"]."'";
        $degree = "'".$requestData["degree"]."'";
        $inst = "'".$requestData["institution"]."'";
        
        $values = array(
            "applicant_id" => $id,
            "start_date" => $start_Date,
            "end_date" => $end_Date,
            "degree" => $degree,
            "institution" => $inst
        )
        $conditions = array("id = ".$id);
        $model->update($values,$conditions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("education");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
    }
}
