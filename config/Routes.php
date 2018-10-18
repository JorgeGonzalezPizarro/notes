<?php
/**
 * Created by PhpStorm.
 * User: jorgegonzalez
 * Date: 16/10/18
 * Time: 11:25
 */

namespace App;

use Bramus\Router\Router;

class Routes
{

    private $router;
    public function __construct(Router $router)
    {

        $this->router=$router;
    }



    public function createRoutes(){
        $this->router->get('/hello',function (){
            echo "hello";
        });
    }





}