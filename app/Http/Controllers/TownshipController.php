<?php

namespace App\Http\Controllers;

use App\Models\Township;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
public function index()
{
    $townships = Township::all();
    return view('townships.index', compact('townships'));
}

}
