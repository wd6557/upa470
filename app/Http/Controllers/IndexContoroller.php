<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexContoroller extends Controller
{
	public function index(){
		var_dump(DB::table('table1')->get());
	}

}


