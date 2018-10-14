<?php

namespace App;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Notifications\UserResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = 'users';

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static $rules =[
        'first_name'=> 'required|max:255',
        'second_name'=> 'required|max:255',
        'email'=> 'required|email|max:255|unique:users',
        'password'=> 'required|min:6|confirmed',
        'country'=> 'required',
        'membership_id'=> 'required',
        'address'=> 'required',
        'city'=>'required',
        'postal_code'=> 'required',
        'country_code'=>'required',
        'phone_number'=>'required',

    ];

    protected $fillable = [
        'first_name',
        'second_name',
        'email',
        'password',
        'country',
        'membership_id',
        'address',
        'address2',
        'city',
        'state',
        'postal_code',
        'country_code',
        'phone_number',
        'package_photo',
        'content_photo',
        'detailed_photo',
        'open_package',
        'other_instruction',
        'default_address_id',
        'balance',
        'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }
    public function defaultAddress() {
        return  $this->belongsTo('App\Address','default_address_id','id');
    }

    public function country() {
        return  $this->belongsTo('App\Country','country_id','id');
    }

    public function membership() {
        return  $this->belongsTo('App\Membership','membership_id','id');
    }
    public function CreateUser($request){
        $Address = Address::where('permission',1)->first();

        return $new = User::create(array(
            'first_name'=>$request->first_name,
            'second_name'=>$request->second_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'country'=>$request->country,
            'membership_id'=>$request->membership_id,
            'address'=> $request->address,
            'address2'=> $request->address2,
            'city'=>$request->city,
            'state_province'=> $request->state_province,
            'postal_code'=> $request->postal_code,
            'phone_number'=>$request->phone_number,
            'default_address_id' => $Address->id,

        ));
    }

    public  function UpdateUser($request){
        $User = User::where('id',$request->id)->first();
        $User->update(array(
            'first_name'=>$request->first_name,
            'second_name'=>$request->second_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'country_id'=>$request->country_id,
            'membership_id'=>$request->membership_id,
            'address'=> $request->address,
            'address2'=> $request->address2,
            'city'=>$request->city,
            'state'=> $request->state,
            'postal_code'=> $request->postal_code,
            'country_code'=>$request->country_code,
            'phone_number'=>$request->phone_number,
            'package_photo'=>$request->package_photo,
            'content_photo'=>$request->content_photo,
            'detailed_photo'=>$request->detailed_photo,
            'open_package'=>$request->open_package,
            'other_instruction'=>$request->other_instruction,
            'default_address_id'=>$request->default_address_id,
            'balance'=>$request->balance
        ));
    }
    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }
}
