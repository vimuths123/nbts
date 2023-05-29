<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BloodRequest;
use TCG\Voyager\Http\Controllers\VoyagerController;
use App\Http\Requests\BloodRequestRequest;
use DataTables;
use Session;

class BloodRequestController extends VoyagerController {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('bloodrequests.add');
    }

    public function update(BloodRequestRequest $request) {
        $bloodRequest = new BloodRequest($request->all());
        $bloodRequest->save();
        Session::flash('message', "Your your request has added");
        return back();
    }

    public function currentNeeds(Request $request) {
        if ($request->ajax()) {
            $blood_type = $request->blood_type;
            $required_date = $request->required_date;
            $district = $request->district;
            $hospital_name = $request->hospital_name;
                        
            $query = BloodRequest::latest();
            if($blood_type){
                $query->where('blood_type', $blood_type);
            }
            if($required_date){
                $query->where('required_date', $required_date);
            }
            if($district){
                $query->where('district', $district);
            }
            if($hospital_name){
                $query->where('hospital_name', 'like', '%' . $hospital_name . '%');
            }
            
            $data = $query->get();
            return Datatables::of($data)
                            ->addIndexColumn()
//                    ->addColumn('action', function($row){
//   
//                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
//     
//                            return $btn;
//                    })
//                    ->rawColumns(['action'])
                            ->make(true);
        }

//        return view('bloodrequests.currentNeeds');
    }

}
