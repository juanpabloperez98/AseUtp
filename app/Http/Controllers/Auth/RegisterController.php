<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Solicitudes;
use App\Egresados;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
#use Illuminate\Contracts\Validation\Validator;
use Illuminate\Auth\Events\Registered;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
                'name' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
    }

    public function register(Request $request)
    {

        $solicitud = Solicitudes::where('email',$request->input('email'))->first();       
        

        if(!empty($solicitud) && $solicitud->estado == 0){
            $message = 'Su correo electronico todavia esta en espera de solicitud';
            return redirect()->route('register')->with(array(
                'message'=>$message,
                'status'=>'warning'
                
            ));
        }

        if(empty($solicitud)){
            $message = 'Su correo electronico todavia no esta registrado en nuestras solicitudes, asociate primero';
            return redirect()->route('asociate')->with(array(
                'message'=>$message,
                'status' => 'danger',
            ));
        }

        $this->validator($request->all())->validate();      
        


        event(new Registered($user = $this->create($request->all())));

        

         if ($response = $this->registered($request, $user)) {
            return $response;
        }

        
        $egresado = new Egresados();
        $egresado->tipo_documento = $request->input('tipoDoc');
        $egresado->documento = $request->input('docLogin');
        $egresado->edad = $request->input('edad');
        $egresado->pais = $request->input('pais');
        $egresado->descripcion = $request->input('description');
        $egresado->programa = $request->input('opcionesPrograma');
        $egresado->genero = $request->input('genero');
        $egresado->user_id = $user->id;

        $egresado->save();        
        $user->assignRoles('egresados');


        // $this->guard()->login($user);


        return $request->wantsJson()
                    ? new Response('', 201)
                    : redirect()->route('login')->with(array(
                        'message' => 'Cuenta creada con exito!!',
                        'status' => 'success'
                    )); 
    }

   

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {       

        return User::create([
            'name' => $data['name'],
            'last_name'=>$data['lastname'],
            'tipo_usuario'=>'egresado',
            'email' => $data['email'],            
            'password' => Hash::make($data['password']),
        ]);
    }
}
