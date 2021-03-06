<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;

class organizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = 2;
        $model1 = new Model("user_account");
        $model2 = new Model("organization");
        $conditions = array("id = " . $id);
        $user = $model1->select("*" , $conditions);
        $org = $model2->select("*" , $conditions);
        $user=$user->fetch_assoc();
        $org=$org->fetch_assoc();
        return view("orgs.show")->with("user",$user)->with("org",$org);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("auth.RegisterAsOrg");
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
        $request->validate([
            "name" => "required",
            "email" => "required",
            "country" => "required",
            "city" => "required",
            "zip" => "required",
            "password" => "required",
            "number" => "required",
            "about" => "required",
            "field" => "required",
            "type" => "required"
        ]);
        $model = new Model("user_account");
        $requestData = $request->all();
        $name = "'".$requestData["name"]."'";
        $email = "'" . $requestData["email"] . "'";
        $country = "'" . $requestData["country"] . "'";
        $city = "'" . $requestData["city"] . "'";
        $zip = "'" . $requestData["zip"] . "'";
        $password = "'" . $requestData["password"] . "'";
        $phone_number = "'" . $requestData["number"] . "'";
        $about = "'" . $requestData["about"] . "'";
        $columns=array('MAX(id) as last_id');
        $result = $model->select($columns);
        $id=$result->fetch_assoc()["last_id"];
        if($id == NULL){
            $id=1;
        }
        else{
            $id++;
        }
        if($request->hasFile('profile_picture')){
            //get file name with extention
            $fileNameWithExt = $request->file('profile_picture')->getClientOriginalName();
            // just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // just ext
            $fileExt = $request->file('profile_picture')->getClientOriginalExtension();
            //to store
            $fileNameToStore = $id .'.'.$fileExt;
            //upload
            $path = $request->file('profile_picture')->storeAs('public/orgs/profile_pictures',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'default.jpg';
        }
        $values = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "profile_picture" => "'".$fileNameToStore."'",
            "country" => $country,
            "city" => $city,
            "zip" => $zip,
            "password" => $password,
            "phone_number" => $phone_number,
            "about" => $about
        );
        $model->insert($values);
        $model2 = new Model("organization");
        $field = "'".$requestData["field"]."'";
        $type = "'".$requestData["type"]."'";
        
        $values = array(
            "id" => $id,
            "field" => $field,
            "type" => $type
        );
        $model2->insert($values);
        return redirect("org_login")->with("success" , "Organization added successfully");   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model1 = new Model("user_account");
        $model2 = new Model("organization");
        $model3 = new Model("opportunity");
        $conditions = array("id = " . $id);
        $user = $model1->select("*" , $conditions);
        $org = $model2->select("*" , $conditions);
        $conditions = array("posted_by = ".$id);
        $op = $model3->select("*",$conditions);
        $user=$user->fetch_assoc();
        $org=$org->fetch_assoc();
        return view("orgs.show")->with("user",$user)->with("org",$org)->with("oppo",$op);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model1 = new Model("user_account");
        $model2 = new Model("organization");
        $conditions = array("id = " . $id);
        $user = $model1->select("*" , $conditions);
        $org = $model2->select("*" , $conditions);
        $user=$user->fetch_assoc();
        $org=$org->fetch_assoc();
        return view("orgs.edit")->with("user",$user)->with("org",$org);
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
        $request->validate([
            "name" => "required",
            "email" => "required",
            "country" => "required",
            "city" => "required",
            "zip" => "required",
            "password" => "required",
            "number" => "required",
            "about" => "required",
            "field" => "required",
            "type" => "required"
        ]);
        $model = new Model("user_account");
        $requestData = $request->all();
        $name = "'".$requestData["name"]."'";
        $email = "'" . $requestData["email"] . "'";
        $country = "'" . $requestData["country"] . "'";
        $city = "'" . $requestData["city"] . "'";
        $zip = "'" . $requestData["zip"] . "'";
        $password = "'" . $requestData["password"] . "'";
        $phone_number = "'" . $requestData["number"] . "'";
        $about = "'" . $requestData["about"] . "'";

        $conditions = array("id = ".$id);
        $values = array(
            "id = ".$id,
            "name = ".$name,
            "email = ".$email,
            "country = ".$country,
            "city = ".$city,
            "zip = ". $zip,
            "password = ".$password,
            "phone_number = ".$phone_number,
            "about = ".$about
        );
        $model->update($values,$conditions);

        $model1 = new Model("organization");
        $field = "'".$requestData["field"]."'";
        $type = "'".$requestData["type"]."'";
        
        $values = array(
            "id = ".$id,
            "field = ".$field,
            "type = ".$type
        );
        $model1->update($values,$conditions);
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
        $model = new Model("organization");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
    }
}
