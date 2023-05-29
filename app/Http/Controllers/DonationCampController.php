<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DonationCamp;
use TCG\Voyager\Http\Controllers\VoyagerController;
use App\Http\Requests\DonationCampRequest;
use DataTables;

class DonationCampController extends VoyagerController {

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
        return view('donationcamps.add');
    }

    public function update(DonationCampRequest $request) {
        $from = $request->from;
        $request->request->remove('from');
        $request->request->add(['from' => date("H:i", strtotime($from))]);

        $to = $request->to;
        $request->request->remove('to');
        $request->request->add(['to' => date("H:i", strtotime($to))]);

        $donationCamp = new DonationCamp($request->all());
        $donationCamp->save();

        if ($file = $request->file('image')) {
            $fileName = $fileName = 'donationcamp-' . $donationCamp->id . '-image.' . $file->getClientOriginalExtension();
            $path = public_path('/storage/donationcamps/' . date('F') . date('Y') . '/');
            $file->move($path, $fileName);
            $donationCamp->image = 'donationcamps/' . date('F') . date('Y') . '/' . $fileName;
            $donationCamp->save();
        }

        Session::flash('message', "Your request has sent for submission");
        return back();
    }

    public function currentCamps(Request $request) {
        if ($request->ajax()) {
            $from = $request->from;
            $to = $request->to;
            $country = $request->country;
            $district = $request->district;
            $city = $request->city;

            $query = DonationCamp::latest();
            if ($from && $to) {
                $query->where('donation_date', '>=', $from);
                $query->where('donation_date', '<=', $to);
            } elseif ($from && !$to) {
                $query->where('donation_date', '>=', $from);
            } elseif ($to && !$from) {
                $query->where('donation_date', '<=', $to);
            }

            if ($country) {
                $query->where('country', $country);
            }
            if ($district) {
                $query->where('district', $district);
            }
            if ($city) {
                $query->where('city', 'like', '%' . $city . '%');
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

//        return view('donationcamps.currentCamps');
    }

}
