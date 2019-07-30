<?php
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
/* GET ROUTES */

Route::get('/','Home@index' );
/* Registro */
Route::get('/registro','Registro@index' );
Route::get('/registro/valida/{jash}', 'Registro@valida'); 
/* Login */
Route::get('/login','Login@index' );
Route::get('/login/logout', 'Login@logout'); 
Route::get('/login/recover', 'Login@recover'); 
Route::get('/login/change/{jash}', 'Login@change'); 
/* Faq */
Route::get('/faq','Faq@index' );
/* Encargo */
Route::get('/encargo','Encargo@index' );
Route::get('/encargo/publicar/{tipo}','Encargo@publicar'); 
Route::get('/encargo/publicar/','Encargo@publicar'); 
Route::get('/encargo/detalle/{id}', 'Encargo@detalle'); 
Route::get('/encargo/cierre/{id}', 'Encargo@cierre'); 
Route::get('/encargo/postular/{id}', 'Encargo@postular'); 
Route::get('/encargo/eliminar/{id}', 'Encargo@eliminar'); 
Route::get('/encargo/adjudicar/{usuario_id}/{encargo_id}', 'Encargo@adjudicar'); 
Route::get('/encargo/eliminar_adjudicacion/{encargo_id}', 'Encargo@eliminar_adjudicacion'); 
/* Admin */
Route::get('/admin', 'Admin@index'); 
Route::get('/admin/logout', 'Admin@logout'); 
Route::get('/admin/usuarios', 'Admin@usuarios'); 
Route::get('/admin/encargos', 'Admin@encargos'); 
/* Usuario */
Route::get('/usuario/perfil/{id}', 'Usuario@perfil'); 
Route::get('/usuario/notificaciones/', 'Usuario@notificaciones'); 
Route::get('/usuario/editar/', 'Usuario@editar'); 
Route::get('/usuario/encargos/', 'Usuario@encargos'); 
Route::get('/usuario/finanzas/', 'Usuario@finanzas'); 
Route::get('/usuario/security/', 'Usuario@security'); 
Route::get('/usuario/eliminar_postulacion/{id}', 'Usuario@eliminar_postulacion'); 
Route::get('/usuario/foto', 'Usuario@foto'); 
Route::get('/usuario/video', 'Usuario@video'); 

/* POST ROUTES */
Route::post('registro/crear', 'Registro@create');
Route::post('encargo/crear', 'Encargo@create');
Route::post('admin/login', 'Admin@login');
Route::post('login/signin', 'Login@signin');  
Route::post('login/message', 'Login@message'); 
Route::post('login/update', 'Login@update');
Route::post('usuario/update_email', 'Usuario@update_email'); 
Route::post('usuario/update_mailing', 'Usuario@update_mailing');  
Route::post('usuario/update_divisa', 'Usuario@update_divisa');  
Route::post('usuario/update', 'Usuario@update'); 
Route::post('usuario/update_password', 'Usuario@update_password');
Route::post('usuario/upload', 'Usuario@upload');
Route::post('usuario/upload_video', 'Usuario@upload_video');
/* TEST ROUTES */
Route::get('test/test', 'Test@test'); 
Route::get('test/show', 'Test@show'); 
Route::get('test/relation', 'Test@relation'); 
Route::post('test/upload', 'Test@upload');

