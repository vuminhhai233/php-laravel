<?php

namespace App\Http\Controllers\Admin;

use App\Admins;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = 'admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function getRegister(){
        return view('admin.register');
    }
    public function postRegister(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($admin = $this->create($request->all())));

        $this->guard('admin')->login($admin);

        return $this->registered($request, $admin)
            ?: redirect($this->redirectPath());
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
            'address' => 'required',
            'phone' => 'required|min:10|max:11',
            'level'=>'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Admins
     */
    protected function create(array $data)
    {
        return Admins::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'level' => 1,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
