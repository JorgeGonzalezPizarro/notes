<?php
/**
 * Created by PhpStorm.
 * User: jorgegonzalez
 * Date: 17/10/18
 * Time: 8:51
 */
namespace App;

require dirname(__DIR__) . '/vendor/autoload.php';

use Auryn\Injector as Injector;
use Bramus\Router\Router as Router;
use Domain\Notes\Application\CreateNoteHandler;
use Http\HttpRequest;
use Http\HttpResponse;

$dependencyInjector=new Injector();
$injector=$dependencyInjector->make(Injector::class);
$routerImplementation=$injector->make(Router::class);
//$routerImplementation=$injector->make(ApiNotes::class);


$request = new HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER,$_SERVER['REQUEST_URI']);
$response = new HttpResponse();

$injector->alias(CreateNoteHandler::class,CreateNoteHandler::class);
$injector->alias('$request', 'Http\HttpResponse');
$injector->alias('$request', 'Http\HttpResponse');

$injector->share('Http\HttpResponse');
//$injector->alias('ApiNotes','ApiNotes');
//$injector->define(ApiNotes::class, ['$commandHandler'=> CreateNoteHandler::class]);

$injector->define(ApiNotes::class, ['$request'=> $request]);
$injector->share(ApiNotes::class);

$host="localhost";
$user="root";
$pass="";
$db="notes";





