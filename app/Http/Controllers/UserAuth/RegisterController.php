<?php

namespace App\Http\Controllers\UserAuth;

use App\Mail\VerifyMail;
use App\Payment;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\User;
use App\Address;
use App\VerifyUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user.guest');
    }

    public function register(Request $request)
    {
        $validation = $this->validator($request->all());
        if ($validation->fails()) {
            return response()->json([
                'status'=>false,
                'msg'=>$validation->errors()
            ]);
        }
        $user = (new User)->CreateUser($request);
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);

        Mail::to($user->email)->send(new VerifyMail($user));

        if($user->membership->price > 0){
            $this->CreatePayment($request ,$user->id);
        }
        return response()->json([
            'status'=>true,
            'user'=>$user
        ]);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($data)
    {
        return Validator::make($data, [
            'first_name'=> 'required|max:255',
            'second_name'=> 'required|max:255',
            'email'=> 'required|email|max:255|unique:users',
            'password'=> 'required|min:6|confirmed',
            'country'=> 'required|max:255',
            'membership_id'=> 'required|max:255',
            'address'=> 'required|max:255',
            'city'=>'required|max:255',
            'postal_code'=> 'required|max:255',
            'phone_number'=>'required|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $Address = Address::where('permission',1)->first();
        return User::create([
            'first_name' => $data['first_name'],
            'second_name' => $data['second_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'country' => $data['country'],
            'address' => $data['address'],
            'address2' => $data['address2'],
            'city' => $data['city'],
            'state_province' => $data['state_province'],
            'postal_code' => $data['postal_code'],
            'phone_number' => $data['phone_number'],
            'default_address_id' => $Address->id,
        ]);
    }
    protected function CreatePayment($data ,$id)
    {
        return Payment::create(array(
            'payment_first_name'=>$data->payment_first_name,
            'payment_second_name'=>$data->payment_second_name,
            'card_number'=>$data->card_number,
            'expiration_month'=>$data->expiration_month,
            'expiration_year'=>$data->expiration_year,
            'user_id'=>$id,
            'payment_method_type'=>$data->payment_method_type,
        ));
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }
    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Sorry your email cannot be identified.'
            ]);
        }
//        return response()->json([
//            'status'=>true,
//            'msg'=>$status
//        ]);
        return view('user.auth.SuccessVerify',compact('user'));
    }
    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */


    public function VerifyEmail()
    {
        if(!Session::has('email')){
            return redirect('/');
        }
        $email = Session::get('email');
        return view('user.auth.verify',compact('email'));
    }
    protected function guard()
    {
        return Auth::guard('user');
    }
}
