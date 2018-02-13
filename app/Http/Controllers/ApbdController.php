<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ApbdController extends Controller
{
   //
 	public function apiAPBD()
	{
		return response()->json(DB::table('smas_apbdes')->get());
	}
}
