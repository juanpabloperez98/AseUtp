<?php

namespace App\Http\Controllers\Auth;

// Propios de laravel
// -------------Los del controlador--------------------------
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// ------------Los de laravel---------------------------------
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Modelos
use App\User;
use App\Solicitudes;
use App\Egresados;
use App\Admin;

// Terceros
use Caffeinated\Shinobi\Models\Role;

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
                'name' => ['required', 'string', 'max:255','regex:/^[\pL\s\-]+$/u'],
                'lastname' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'tipoDoc' => ['required', 'string'],
                'documento' => ['required', 'numeric', 'digits_between:7,10'],
                'edad' => ['required', 'numeric', 'min:1'],
                'pais' => ['required', 'string'],                
                'description' => ['required','string','min:20','max:600'],   
                'clave' => ['required','numeric','digits:5','min:1','unique:users'],
                'foto' =>  ['image']
                
            ]);
    }


    
    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        /* $this->extra_validator($request); */

        $email_utp = explode('@',$request->input('email'));
        /* dd($email_utp);
        die(); */

        if($email_utp[1] != 'utp.edu.co'){
            $message = 'Debe ingresar su correo institucional';
            return redirect()->route('register')->with(array(
                'message'=>$message,
                'status'=>'danger'
                
            ));
        
        }
        /* dd($email_utp[1]);
        die(); */

        $solicitud = Solicitudes::where('email',$request->input('email'))->first();       


        /* dd($solicitud);
        die();
 */

        

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

        

        event(new Registered($user = $this->create($request->all())));        

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        
        $egresado = new Egresados();
        $egresado->tipo_documento = $request->input('tipoDoc');
        $egresado->documento = $request->input('documento');
        $egresado->edad = $request->input('edad');
        $egresado->pais = $request->input('pais');
        $egresado->descripcion = $request->input('description');
        $egresado->programa = $request->input('opcionesPrograma');
        $egresado->genero = $request->input('genero');
        $egresado->user_id = $user->id;


        $image = $request->file('foto');
        if($image){
            $image_path = time().$image->getClientOriginalName();
            \Storage::disk('images')->put($image_path,\File::get($image));

            $egresado->foto = $image_path;
        }

        $egresado->save();        
        $user->assignRoles('egresados');        
        #$user->givePermissionTo('contenido.index','contenido.show','egresados.show');


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
            'clave' => $data['clave'],
            'password' => Hash::make($data['password']),
            'pass_recovery'=>$data['password']
        ]);
    }
}
