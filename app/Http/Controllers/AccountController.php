<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function create(){
        $countries=DB::table('countries')->orderBy('name','ASC')->get();
        return view('user.creates',[
            'countries'=>$countries,
        ]);
    }
}
