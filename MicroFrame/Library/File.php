<?php
/**
 * File Library class
 *
 * PHP Version 7
 *
 * @category  Library
 * @package   MicroFrame\Library
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

namespace MicroFrame\Library;
defined('BASE_PATH') OR exit('No direct script access allowed');

/**
 * Class File
 * @package MicroFrame\Library
 */
final class File {


    /**
     * @return File
     */
    public static function init() {
        return new self();
    }

    /**
     * @summary Clears old files in a directory above the number of days specified
     *
     * @param $path
     * @param int $days
     * @return void
     */
    public function clearOld($path, $days = 3) {
        $files = glob($path ."/*");
        $now   = time();

        foreach ($files as $file) {
            if (is_file($file)) {
                if ($now - filemtime($file) >= 60 * 60 * 24 * $days) {
                    unlink($file);
                }
            }
        }
    }
    
}