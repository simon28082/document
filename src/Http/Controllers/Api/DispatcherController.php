<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/16
 * Time: 17:14
 * Created by PhpStorm.
 * +++++++++++++++++++++++++文档的CRUD+++++++++++++++++++++++++++++++++++++
 */

namespace CrCms\Document\Http\Controllers\Api;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\ControllerDispatcher  ;
use Illuminate\Routing\Route;

class DispatcherController
{
    public function __construct(Request $request, Route $route)
    {
        $this->request = $request;
        $this->route = $route;
    }

    public function __call($method, $parameters)
    {
        $controller = ucfirst(strtolower($this->request->type)) . 'Controller';
        $class = __NAMESPACE__ . '\\' . $controller;
        //$method = $this->request->route()->getActionMethod();


        return app(ControllerDispatcher::class)->dispatch($this->route, app($class), $method);


    }


}