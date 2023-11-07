<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Township;
use Carbon\Carbon;


class PatientController extends Controller
{
public function index()
 {
     $patients = Patient::all();
    $townships = Township::all();

    return view('patients.index', compact('patients', 'townships'));
    
 }
 
 public function votpatient()
 {
    $vot = '1';

        $patients = Patient::when($vot, function ($query) use ($vot) {
        return $query->where('vot', $vot);
    })->get();

    return view('patients.votpatient', compact('patients'));
 }
 
 public function login()
 {
    
    return view('auth.login');
 }
 public function register()
 {
    
    return view('auth.register');
 }
 public function add()
{
 $data1 = [
 [ "id" => 1, "name" => "Male" ],
 [ "id" => 2, "name" => "Female" ],
 ];
 $data2 = [
 [ "id" => 1, "name" => "YES" ],
 [ "id" => 2, "name" => "NO" ],
 ];

 return view('patients.add', [
 'sexs' => $data1,
 'VOTs' => $data2
 ]);
}

public function create(Request $request)
{
    $currentDate = Carbon::now()->toDateString();
    $serialNumber = '';
    do {
        $serialNumber = generateUniqueSerialNumber();
    } while (Product::where('serial_number', $serialNumber)->exists());

    $patients = new Patient;
    $patients->township = $request->input('township');
    $patients->registration_date = $request->input('currentDate');
    $product->serial_number = $serialNumber;
    $patients->name = $request->input('name');
    $patients->age = $request->input('age');
    $patients->sex = $request->input('sex');
    $patients->address = $request->input('address',40);
    $patients->treatment_start_date = $request->input('date');
    $patients->vot = $request->input('vot');
    $patients->save();

 return redirect('/patients');
}


public function filter(Request $request)
{
     $query = Patient::query();

    if ($request->has('sex')) {
        $query->orWhere('sex', $request->input('sex'));
    }
    
    if ($request->has('vot')) {
        $query->orWhere('vot', $request->input('vot'));
    }
    
    if ($request->has('township')) {
        $query->orWhere('township', $request->input('township'));
    }

    $filteredPatients = $query->get();

    return view('patients.index', ['patients' => $filteredPatients]);
}

// public function filterByVOT(Request $request)
// {
//     $vot = $request->input('vot');

//     $patients = Patient::when($vot, function ($query) use ($vot) {
//         return $query->where('vot', $vot);
//     })->get();

//     return view('patients.index', compact('patients'));
// }

// public function filterByTsp(Request $request)
// {
//     $sex = $request->input('township');

//     $patients = Patient::when($township, function ($query) use ($township) {
//         return $query->where('township', $township);
//     })->get();

//     return view('patients.index', compact('patients'));
// }



}
