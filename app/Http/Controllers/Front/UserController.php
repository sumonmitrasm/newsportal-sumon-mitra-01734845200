<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function logincustpmer(){
        return view('frontend.users.login');
    }

    public function registercustpmer(){
        return view('frontend.users.register');
    }
    public function saveRegisterUser(Request $request) 
    {
    	if ($request->isMethod('post')) {
            Session::forget('error_message');
            Session::forget('success_message');
    		$data = $request->all();
    		//echo "<pre>";print_r($data);die;
            $userCount = User::where('email',$data['email'])->count();
            if ($userCount>0) {
                $message = "Email allready exists!!";
                Session::flash('error_message',$message);
                return redirect()->back();
            }else{
                $user = new User;
                $user->name = $data['name'];
                $user->mobile = $data['mobile'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->status = 0;
                $user->save();

                //send confirmation Email
                $email = $data['email'];
                $messageData = [
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'code' => base64_encode($data['email'])
                ];
                Mail::send('emails.confirmation',$messageData,function($message) use($email){
                    $message->to($email)->subject('Please Confirm your account');
                });

                //Redirect back with successfull message
                $message = "Please confirm your email to activete your account!!";
                Session::put('success_message',$message);
                return redirect()->back();
            }
    	}
    }

    public function checkLoginForm(Request $request)
    {
        if ($request->isMethod('post')) {
            Session::forget('error_message');
            Session::forget('success_message');
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    //echo "<pre>";print_r(Auth::user());die;
                //check email is activate or not........................................
                $userStatus = User::where('email',$data['email'])->first();
                if($userStatus->status == 0){
                    Auth::logout();
                    $message = "Your account is not activated !! Please confirm your email to activate!";
                    Session::put('error_message',$message);
                    return redirect()->back();
                }
                //update user cart with user id.........................................
                if (!empty(Session::get('session_id'))) {
                    $user_id = Auth::user()->id;
                    $session_id = Session::get('session_id');
                    Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                }
                return redirect('/');
            }else{
                $message = "Invalid email or password";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
        }
    }

    public function confirmAccount($email)
    {
        Session::forget('error_message');
        Session::forget('success_message');
        //echo $email = base64_decode($email);
        $email = base64_decode($email);
        //check user email exists
        $userCount = User::where('email',$email)->count();
        if ($userCount>0) {
            // User email is already activeed or not
            $userDetails = User::where('email',$email)->first();
            if ($userDetails->status == 1) {
                $message = "Your Email account is already activeed";
                Session::put('error_message',$message);
                return redirect('login-customer');
            }else{
                //update status 
                User::where('email',$email)->update(['status'=>1]);
                //send mail on website......................................
                $messageData = ['name'=>$userDetails['name'],'mobile'=>$userDetails['mobile'],'email'=>$email];
                Mail::send('emails.register',$messageData,function($message) use($email){$message->to($email)->subject('Welcome to Tickets website');

                });
                $message = "Your Email account is activeed";
                Session::put('success_message',$message);
                return redirect('login-customer');
            }
        }else{
            abort(404);
        }
    }

    public function customerLogout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function customerAccount(Request $request){
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id )->toArray();
        if($request->isMethod('post')){
            $data = $request->all();
            Session::forget('error_message');
            Session::forget('success_message');
            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->mobile = $data['mobile'];
            $user->password = bcrypt($data['password']);
            $user->save();
            $message = "Your account details has been updated successfully";
            session::flash('success_message',$message);
            return redirect()->back();
        }
        return view('frontend.users.account')->with(compact('userDetails'));
    }
}
