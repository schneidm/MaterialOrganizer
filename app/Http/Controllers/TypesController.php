<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{
    public function store(Request $request){
             
     $type = DB::table('types')->where('type_id', '=', $request->input('type_id'))->first();
      if(is_null($type)){//Ensure the type does not already exist.
        DB::table('types')->insert(
          ['type_id' => $request->input('type_id'), 'description' => $request->input('type_description'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        );
      }
      return back();
    }
}
