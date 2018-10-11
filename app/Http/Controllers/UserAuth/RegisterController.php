<?php

namespace App\Http\Controllers\UserAuth;

use App\Payment;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

//        $this->validator($request->all())->validate();
        $user = (new User)->CreateUser($request);
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

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
}
