<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Rol;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;

use Auth;
use Session;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
   


   /* protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }*/
    

    public function create()
    {
        return view('auth.registro');
    }

    public function store(CreateUserRequest $request)
    {



        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->rol_id = "1";
        

        if($user->save()){

            return redirect()->route('login')->with('status','Usuario registrado con exito');

        }

        else{

            return redirect()->back()->with('status','ha habido un error');
        }

    }

    public function getlogin()
    {
        return view('auth/login');
    }

    public function postlogin(LoginUserRequest $request)
    {

        $recuerdame = $request->input('remember');

           if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']], $recuerdame)){
    
            return redirect()->route('home')->with('status','Usuario logueado');
        
        }else{

            return redirect()->route('login')->with('status','Error  -  Email o Contraseña Incorrecto');
        }

    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');

    }

}
