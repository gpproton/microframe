<?php
defined('BASE_PATH') OR exit('No direct script access allowed');
/**
 * Default Middleware class
 *
 * PHP Version 5
 *
 * @category  DefaultMiddleware
 * @package   MicroFrame
 * @author    Godwin peter .O <me@godwin.dev>
 * @author    Tolaram Group Nigeria <teamerp@tolaram.com>
 * @copyright 2020 Tolaram Group Nigeria
 * @license   MIT License
 * @link      https://github.com/gpproton/bhn_mcpl_invoicepdf
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so
 */

namespace Microframe\Defaults\Middleware;

use \Microframe\Core\Middleware;

class DefaultMiddleware extends Middleware
{
    public function handle()
    {

        /**
         * All available request methods are accessible through this
         * $this->request;
         */


        /**
         * Sample auth call for
         * $this->request->auth();
         */

        /**
         *
         * Sample data call with default instance
         *
         * $data = $this->model->query('select 1 from dual')
         * ->execute()
         * ->result();
         */

        /**
         *
         * Sample data call with custom database instance
         *
         * $data = parent::model('oracle2x')->query('select 1 from dual')
         * ->execute()
         * ->result();
         */


        return true;
    }

}