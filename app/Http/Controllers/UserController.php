<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use TCG\Voyager\Http\Controllers\VoyagerController;
use Session;

class UserController extends VoyagerController {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
       $user = Auth::user();
       $user->contact_me_via = json_decode($user->contact_me_via);
//       dd($user->contact_me_via);
       return view('voyager-frontend::modules/auth/account', ['user' => $user]);
    }

    public function update(User $user, Request $request) {
        $password = $request->password;
        $request->request->remove('password');
        
        if($file = $request->file('image')){
            $fileName = $fileName = 'user-'. $user->id .'-image.'.$file->getClientOriginalExtension();
            $path = public_path('/storage/users/'. date('F').date('Y') .'/');
            $file->move($path, $fileName);
            $request->request->add(['avatar' => 'users/'. date('F').date('Y') .'/'.$fileName]);
        }
                
        if (!empty($password)) {
            $request->request->add(['password' => bcrypt($password)]);
        }
        
        $contact_me_via = $request->contact_me_via;
        $request->request->remove('contact_me_via');
        
        if($contact_me_via){
            $request->request->add(['contact_me_via' => json_encode($contact_me_via)]);
        }

        $user->update($request->all());
        
        Session::flash('message', "Your account updated successfully");
        return back();
    }

    public function donateBlood() {
        $user = Auth::user();
//        return view('users.donate_blood', compact('user'));
        return view('voyager-frontend::layouts/donate_blood', ['user' => $user]);
    }
    
    public function donateBloodUpdate(User $user, Request $request) {
        $user->update($request->all());
        return back();
    }
}
