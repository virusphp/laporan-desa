<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renja;
use DB;

class RenjaController extends Controller
{
    //
	public function index()
	{
		return view('renja.index');
	}	
}
