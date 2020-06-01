<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/prueba', function () {
    return view('recuperarPass');
});


Route::get('recuperar','AdminController@reset_password_view')->name('recovery.password');
Route::post('recuperar-post','AdminController@reset_password_post')->name('recovery.password.post');
Route::get('terminos-condiciones','SolicitudesController@terminos_condiciones')->name('terminos-condiciones');
Route::get('noticias-index','NoticiasController@index')->name('noticias.index')
                                                       ->middleware(['auth']);
Route::get('noticias/{slug}', 'NoticiasController@post')->name('noticias.post')
                                                        ->middleware(['auth']);

Route::get('categoria/{slug}', 'NoticiasController@category')->name('noticias.category')
                                                        ->middleware(['auth']);

Route::get('etiqueta/{slug}', 'NoticiasController@tag')->name('noticias.tag')
                                                        ->middleware(['auth']);


Route::group(['prefix'=>'solicitudes'], function(){

    Route::get('request',array(
        'as'=>'asociate',
        'uses'=>'SolicitudesController@create',
        'middleware'=>'guest'
    ));     

    Route::post('create',array(
        'as'=>'asociatecreate',
        'uses'=>'SolicitudesController@store',
        'middleware'=>'guest'
    ));
    
    Route::get('validar',array(
        'as'=>'vervalidacion',
        'uses'=>'SolicitudesController@vervalidacion',
        'middleware'=>'guest'
    ));
    
    Route::post('validar-status',array(
        'as'=>'validar',
        'uses'=>'SolicitudesController@statusvalidacion',
        'middleware'=>'guest'
    ));

    
    Route::get('versolicitudes','SolicitudesController@index')->name('solicitudes.index')
                                                                ->middleware(['permission:egresados.index','auth']);
    Route::get('versolicitud/{solicitud}','SolicitudesController@show')->name('solicitudes.show')
                                                                ->middleware(['permission:egresados.show','auth']);

    Route::post('aceptarsolicitudes/{solicitud}/{estado}','SolicitudesController@update')->name('solicitudes.update')
                                                                                  ->middleware(['auth','permission:egresados.edit']);

});


Route::middleware(['auth'])->group(function(){

    // Perfiles
    Route::get('perfil/egresados/{user}','EgresadosController@profile')->name('perfil.egresados');
    Route::get('perfil/administrador/{user}','AdminController@profile')->name('perfil.admin');
    Route::get('perfil/root','RootController@profile')->name('perfil.root');

    // Admin
    // **Crear
    Route::get('root/createadminpanel','AdminController@create')->name('admin.create')
                                                            ->middleware(['permission:admin.create']);
    Route::post('root/createadmin','AdminController@store')->name('admin.save')
                                                           ->middleware(['permission:admin.create']);
    //Editar
    Route::get('admin/edit','AdminController@edit')->name('admin.edit');
    Route::get('admin/update','AdminController@update')->name('admin.update');

    // Crear contenido
    Route::get('contendido/create','ContenidoController@index')->name('contenido.index')
                                                               ->middleware(['permission:contenido.create']);
    



    // Egresados
    // Update
    Route::get('egresados/edit','EgresadosController@edit')->name('egresados.edit');
    Route::get('egresados/update','EgresadosController@update')->name('egresado.update');

    
                                                        

    Route::resource('tags','TagsController');
    Route::resource('categories','CategoryController');
    Route::resource('posts','PostController');



    Route::get('image/{filename}',[
        'as'=> 'image',
        'uses'=> 'EgresadosController@getImage'
    ]);


    Route::get('search/','AmigosController@listar_amigos')->name('buscar.amigos');
    Route::get('solicitud-amistad/{id}','AmigosController@solicitud_amistad')->name('agregar.amigos');
    Route::get('ver-solicitudes-enviadas/','AmigosController@ver_solicitud_amistad_enviada')->name('ver.enviadas');
    Route::get('ver-solicitudes/','AmigosController@ver_solicitudes')->name('ver.solicitudes');
    Route::get('ver-amigos/','AmigosController@ver_amigos')->name('ver.amigos');
    Route::post('acepted/{id}','AmigosController@aceptar')->name('solicitud.aceptar');
    Route::post('rechazar/{id}','AmigosController@rechazar')->name('solicitud.rechazar');
                                  

   /*  Route::get('/prueba')->name('prueba')
                        ->middleware('permission:egresados.index'); */

});



Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
