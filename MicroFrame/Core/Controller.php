<?php
/**
 * Core Controller class
 *
 * PHP Version 7
 *
 * @category  Core
 * @package   MicroFrame\Core
 * @author    Godwin peter .O <me@godwin.dev>
 * @author    Tolaram Group Nigeria <teamerp@tolaram.com>
 * @copyright 2020 Tolaram Group Nigeria
 * @license   MIT License
 * @link      https://github.com/gpproton/microframe
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so
 */

namespace MicroFrame\Core;
defined('BASE_PATH') OR exit('No direct script access allowed');

use MicroFrame\Interfaces\IController;
use MicroFrame\Interfaces\IMiddleware;
use MicroFrame\Interfaces\IModel;
use MicroFrame\Interfaces\IRequest;
use MicroFrame\Interfaces\IResponse;
use MicroFrame\Helpers\Reflect;

/**
 * Class Controller
 * @package MicroFrame\Core
 */
class Controller implements IController
{
    protected $config;
    protected $request;
    protected $response;
    protected $method;
    protected $middlewareState;

    /**
     * Controller constructor.
     * @param IResponse $response
     * @param IRequest $request
     * @param string $method
     */
    public function __construct(IResponse $response, IRequest $request, $method = "")
    {
        $this->middlewareState = true;
        $this->config = (object) APPLICATION_CONFIG;

        $this->request = $request;
        $this->response = $response;
        $this->method = $method;

        return $this;
    }

    /**
     * @param IMiddleware|null $middleware
     * @return $this|mixed
     */
    public function middleware(IMiddleware $middleware = null)
    {
        if (!is_null($middleware)) {
            $this->middlewareState = $middleware->handle() && $this->middlewareState;
        }
        return $this;
    }

    /**
     * @summary Index/Default controller method
     */
    public function index()
    {
        /**
         * Implement index method from children class if required.
         */
        $this->response->send();
    }

    /**
     * @summery Run controller instance
     *
     * @return void
     */
    public function start()
    {
        /** @var IController $this */
        if ($this->middlewareState && !is_null($this->response)) {
            $this->response->proceed = true;
        } else {
            $this->response->proceed = false;
        }

        if (empty($this->method)) {
            $this->index();
        } else {

            //TODO: call_user_func_array Call method with string approach.
        }

    }

    /**
     *
     * @summary Model static instance initializer.
     *
     * @param null $source
     * @return Model|IModel
     */
    public static function model($source =  null)
    {
        if (is_null($source)) return new Model();
        return new Model($source);
    }

    /**
     *
     */
    public function __destruct()
    {

    }
}
