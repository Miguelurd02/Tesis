<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
    $verticalMenuData = json_decode($verticalMenuJson);

    $menuUsuarioJson = file_get_contents(base_path('resources/menu/menuUsuario.json'));
    $menuUsuarioData = json_decode($menuUsuarioJson);
    
    $menuInmobiliariaJson = file_get_contents(base_path('resources/menu/menuInmobiliaria.json'));
    $menuInmobiliariaData = json_decode($menuInmobiliariaJson);

    // Share all menuData to all the views
    \View::share('menuData', [$verticalMenuData]);
    \View::share('menuUsuario', [$menuUsuarioData]);
    \View::share('menuInmobiliaria', [$menuInmobiliariaData]);
  }
}
