<?php

namespace App\Http\Controllers\Auth;

use Mail;
use DB;
use App\User;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Form;
use View;
use App\Setting;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $setting;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        $this->setting = Setting::first();
        View::share('login_with',(isset($this->setting->login_with) && !empty($this->setting->login_with))?$this->setting->login_with:'email' );
        View::share('after_register',(isset($this->setting->after_register) && !empty($this->setting->after_register))?$this->setting->after_register:'approval' );
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'first_name' => 'required|string|alpha_space|max:255',
            'last_name' => 'required|string|alpha_space|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ];/*
        if (isset($data['login_with']) && !empty($data['login_with']) ) {
            $rules['username'] = 'required|string|max:255|unique:users';
        }elseif (isset($data['username']) && !empty($data['username']) ) {
            $rules['username'] = 'required|string|max:255|unique:users';
            unset($rules['email']);
        }*/

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $verified = (isset($this->setting->after_register) && ($this->setting->after_register=='direct'))?'1':'0';
        $user =  User::create([
            'name' => $data['first_name'].' '.$data['last_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => isset($data['email'])?$data['email']:'',
            'username' => isset($data['username'])?$data['username']:'',
            'password' => bcrypt($data['password']),
            'verified' => $verified,
            'email_token' => str_random(10),
        ]);
        $user->attachRole('2');

        return $user;
    }

    /**
    *  Over-ridden the register method from the "RegistersUsers" trait
    *  Remember to take care while upgrading laravel
    */
    public function register(Request $request)
    {
        // Laravel validation
        $validator = $this->validator($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }
        
        $user = $this->create($request->all());
        $msg = 'Register Successfully Please login.';
        if (isset($this->setting->after_register) && ($this->setting->after_register=='approval') ) {
            $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name]));
            Mail::to($user->email)->send($email);
            
            $msg = 'Register Successfully Please check your mail for varification.';
        }else{
            \Auth::guard()->login($user);
            return redirect('/home')
                ->with('success','Register Successfully.');
        }
        
        return back()->with('success',$msg);
        
    }

    // Get the user who has the same token and change his/her status to verified i.e. 1
    public function verify($token)
    {
        // The verified method has been added to the user model and chained here
        // for better readability
        $user = User::where('email_token',$token)->first();
        if(!empty($user)){
            User::where('email_token',$token)->firstOrFail()->verified();
            return redirect('login')->with('success','You Are Successfully verified please login');
        }
        return redirect('login')->with('error','You Are Already verified or token not found in our records.');
    }
}
