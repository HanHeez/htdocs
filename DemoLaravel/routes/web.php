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

// require_once __DIR__.'/../_ProjectContain/root/*.php';
foreach ( glob(dirname(__FILE__) . '/../_ProjectContain/Routes/*.php') as $class_path )
        require_once( $class_path );
        


