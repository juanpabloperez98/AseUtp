<?php

namespace App\Http\Controllers;
use \App\Admin;
use \App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function profile($id)    
    {
        $admin = Admin::where('user_id',$id)->first();        
        return view('perfil',array(
            'usuario' => $admin
        ));

    }

    public function reset_password_view(){

        return view('recuperarPass');


    }

    private function newpass($length = 10)
    {
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
        

    }

    public function reset_password_post(Request $request)
    {
        $email = $request->input('email');
        $clave = $request->input('clave');
        $cuenta = User::where('email',$email)->first();
        if(!empty($cuenta) && $cuenta->clave == $clave):
            
            $newpassword = $this->newpass();

            $cuenta->password = Hash::make($newpassword);
            $cuenta->pass_recovery = $newpassword;
            
            $cuenta->update();

            return redirect()->route('recovery.password')->with(array(
                'message' => 'Su contraseña ha sido recuperada exitosamente',
                'password' => $newpassword,
                'status' => 'success'
            ));

        elseif(empty($cuenta)):
            return redirect()->route('recovery.password')->with(array(
                'message' => 'No se ha encontrado ninguna cuenta con ese email',                
                'status' => 'danger'
            ));
        else:
            return redirect()->route('recovery.password')->with(array(
                'message' => 'Su clave de seguridad no es correcta!!',                
                'status' => 'danger'
            ));            
            
        endif;
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('root.crearAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'lastname' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'docLogin' => ['required','numeric','digits_between:7,10'],
            'dir' => ['required','string'],
            'tel' => ['required','integer','digits:10'],
            'clave' => ['required','numeric','digits:5','unique:users'],            
            'foto' => ['image']
        ]);

        $email_utp = explode('@',$request->input('email'));
        /* dd($email_utp);
        die(); */

        if($email_utp[1] != 'utp.edu.co'){
            $message = 'Debe ingresar su correo institucional';
            return redirect()->route('admin.create')->with(array(
                'message'=>$message,
                'status'=>'danger'                
            ));
        
        }




        $user = new User();
        $user->name = $request->input('name');
        $user->last_name = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->tipo_usuario = 'admin';
        $user->clave = $request->input('clave');
        $user->pass_recovery = $request->input('password');

        $user->save();



        $admin = new Admin();
        $admin->tipo_documento = $request->input('tipoDoc');
        $admin->documento = $request->input('docLogin');
        $admin->direccion = $request->input('dir');
        $admin->telefono = $request->input('tel');
        $admin->user_id = $user->id;

        $foto = $request->file('foto');
        if($foto){

            $foto_path = time().$foto->getClientOriginalName();

            \Storage::disk('images')->put($foto_path,\File::get($foto));


            $admin->foto = $foto_path;

        }

        $admin->save();        
        $user->assignRoles('admin');
        

        return redirect()->route('admin.create')->with(array(
            'message' => 'El administrador se ha creado correctamente!!',
            'status'=>'success'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $user = \Auth::user();
        $user_comp = Admin::where('user_id',$user->id)->first();

        
        // dd($user->id);

        return view('update',[
            'usuario' => $user,
            'component' => $user_comp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)    
    {   

        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'lastname' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'dir' => ['required','string'],
            'doc' => ['required','numeric','digits_between:7,10'],
            'tel' => ['required','integer','digits:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = \Auth::user();
        $admin = Admin::where('user_id',$user->id)->first();

        $user->name = $request->input('name');
        $user->last_name = $request->input('lastname');
        $user->pass_recovery = $request->input('password');

        
        $admin->direccion = $request->input('dir');
        $admin->documento = $request->input('doc');
        $admin->telefono = $request->input('tel');


        $user->password = Hash::make($request->input('password'));


        $admin->update();
        $user->update();



        return redirect()->route('perfil.admin',['user'=>$user->id])->with(array('message'=>'Datos actualizados con exito','status'=>'success'));


        
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

