<?php

use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\LogoutController;
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

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'rol:inmobiliaria,suscriptor,admin'], function(){
        $controller_path = 'App\Http\Controllers';
        //Administrador pantallas
         Route::get('/admin-inicio', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics'); // Inicio admin
         Route::get('/inmobiliarias/empresas', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid'); //Inmobiliarias empresas tablas
         Route::get('/inmobiliarias/agentes', $controller_path . '\layouts\Container@index')->name('layouts-container'); //Agentes inmobiliarios tablas
         Route::get('/usuarios/listado', $controller_path . '\cards\CardBasic@index')->name('cards-basic');//Usuarios tablas
         Route::get('/localizacion/ciudad', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar'); // Ciudades
         Route::get('/localizacion/sector', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider'); // Sectores
         Route::get('/propiedades/registro', $controller_path . '\tables\Basic@index')->name('tables-basic'); // propiedades tablas

        //Usuario pantallas
        Route::get('/inicio/filtro', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons'); //Inicio usuario filtro
        Route::get('/propiedades/buscar',$controller_path .'\icons\Boxicons@buscar')->name('propiedades.buscar');
        Route::get('/perfil/usuario', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account'); //Perfil usuario
        Route::get('/catalogo/propiedades', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion'); //Propiedades
        Route::get('/informacion/inmobiliarias', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts'); // Inmobiliarias información
        Route::get('/informacion/agentes', $controller_path . '\user_interface\Badges@index')->name('ui-badges'); // Agentes informacion

        //Inmobiliaria pantallas
        Route::get('/inicio/inmobiliaria', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups'); //Inicio inmobiliarias
        Route::get('/perfil/inmobiliaria', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs'); //Perfil inmobiliaria
        Route::get('/publicacion/registrar', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse'); //Registrar propiedad
        Route::get('/publicacion/ver', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns'); //Ver propiedades
        Route::get('/agentes/ver', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');

    });
   
});

Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
// layout
Route::get('/', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');

Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages

Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications'); 
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('login');
Route::post('/auth/login-basic', [LoginBasic::class, 'login']);//name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index']);
Route::post('/auth/register-basic', [RegisterBasic::class, 'register']); //name('auth-register-basic');
Route::get('/logout', [LogoutController::class, 'logout']); //name('auth-register-basic');
Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// cards


// User Interface
Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer'); // Agentes de la inmobiliaria
Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel'); //Perfil inmobiliaria
Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons'); //Inicio inmobiliaria
Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
Route::get('/ui/tooltips-popovers/{id}', $controller_path . '\user_interface\TooltipsPopovers@show')->name('ui-tooltips-popovers.show');
Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');
Route::get('/ui/typography/{id}', $controller_path . '\user_interface\Typography@show')->name('ui-typography.show');

// extended ui


// icons


// form elements



// form layouts

Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// tables

