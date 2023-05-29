<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('public');
    }

    public function wizard() {
        return view('wizard');
    }

    public function contactUs(Request $request) {
        if($request->isMethod('post')) {
             \Mail::to('vimuths@yahoo.com')
                     ->send(new \App\Mail\ContactMail($request->all()));
        }

        return view('contact_us');
    }
    
    public function testTheme() {
        return view('test_theme');
    }

}
