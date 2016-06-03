<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SeriesController extends Controller
{
    public function store(Request $request){
             
     $series = DB::table('series')->where('series_id', '=', $request->input('series_id'))->first();
      if(is_null($series)){//Ensure the type does not already exist.
        DB::table('series')->insert(
          ['series_id' => $request->input('series_id'), 'note' => $request->input('series_note'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        );
      }
      return back();
    }
}
