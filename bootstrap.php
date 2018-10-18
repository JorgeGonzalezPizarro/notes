<?php declare(strict_types=1);

namespace App;

use DI\Container;
use DI\ContainerBuilder;
use Domain\Notes\Api\ApiNotes;
use App\MysqlRepository;
use Domain\Notes\Application\CreateNoteHandler;
use Domain\Notes\Application\CreateNoteUseCase;

error_reporting(E_ALL);
require dirname(__DIR__) . '/notes/vendor/autoload.php';
require dirname(__DIR__) . '/notes/config/Routes.php';
require dirname(__DIR__) . '/notes/Domain/Notes/Api/ApiNotes.php';

require 'config/Dependencies.php';
$container=new ContainerBuilder();

$routes=new Routes($routerImplementation);
$repository=MysqlRepository::createDb($host,$user,$pass);
$createNoteUseCase=new CreateNoteUseCase($repository);
$createNoteHandler=new CreateNoteHandler($createNoteUseCase);

$dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/notes/createNote', [ApiNotes::class, 'getNotes']);
    $r->addRoute('GET', '/notes/', [ApiNotes::class, 'getNotes']);
    $r->addRoute('POST', 'http://localhost/notes/createNote', [ApiNotes::class, 'createNote']);
});



$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPath());

switch ($routeInfo[0]) {
    case \FastRoute\Dispatcher::NOT_FOUND:
        $response->setContent('404 - Page not found');
        $response->setStatusCode(404);
        break;
    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $response->setContent('405 - Method not allowed');
        $response->setStatusCode(405);
        break;
    case \FastRoute\Dispatcher::FOUND:

        $handler =  $routeInfo[1][0];
        $vars = $routeInfo[1][1];
        if(!$request->getMethod()=='GET') $param=$createNoteHandler;
        $param=$repository;
       $class = new $handler($request,$param);
       $var1=$class->$vars();

        break;
}