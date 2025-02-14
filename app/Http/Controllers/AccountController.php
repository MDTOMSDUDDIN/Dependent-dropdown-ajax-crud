<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\json;

class AccountController extends Controller
{
    public function list(){
       
        $users=DB::table('users')->get();
        $data['users']=$users;
        return view('user.list',[
            'data'=>$data,
            'users'=>$users,
        ]);
    }

    public function fetchStates($country_id=null){
        $states=DB::table('states')->where('country_id',$country_id)->get();
        return response()->json([
            'status'=>1,
            'states'=>$states,
        ]);

    }
    public function fetchCities($state_id=null){
        $cities=DB::table('cities')->where('state_id',$state_id)->get();
        return response()->json([
            'status'=>1,
            'cities'=>$cities,
        ]);

    }

    // public function save(Request $request){
    //      $request->validate([
    //         'name'=>'required',
    //         'email'=>'required|email',
    //     ]);

    //     // if($validate->passes()){
    //     //     $request->flash()->success('Your request was processed successfully.');
    //     //     return response()->json([
    //     //         "status"=>1
    //     //     ]);
    //     // }
        
    // }


    public function save(Request $request){
 
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email'
        ]);
 
        if ($validator->passes()) {
 
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => "123456",
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
            ]);
 
            
        flash()->success('Your request was processed successfully.');
 
            return response()->json([
                'status' =>  1                
            ]);
 
        } else {
            // return error 
 
            return response()->json([
                'status' =>  0,
                'errors' => $validator->errors()
            ]);
        }
 
    }
    //-------------------

    public function create(){
        $countries=DB::table('countries')->orderBy('name','ASC')->get();
        return view('user.creates',[
            'countries'=>$countries,
        ]);
    }

   
}
