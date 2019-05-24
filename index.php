<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 */

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same directory
 * as this file.
 */



$system_path = 'isys';

if(isset($_SERVER['ESTIC_ORIGIN'])){

    if (isset($_SERVER['PWD'])){

        if(strstr($_SERVER['PWD'],$_SERVER['ESTIC_ORIGIN'])) {

            $array = explode($_SERVER['ESTIC_ORIGIN'],$_SERVER['PWD']);

            if(is_array($array)){

                $_SERVER['PWD'] = '/'.trim(implode('/',$array),'/');
            }
        }
    } else {
        $_SERVER['PWD'] = $_SERVER['ESTIC_ORIGIN'];
    }
}

// Path to the system folder

    if(isset($_SERVER['PWD'])){
      define('PWD', str_replace('\\', '/', $_SERVER['PWD']). '/');
    } else if(isset($_SERVER['DOCUMENT_ROOT'])){
      define('PWD', str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']) . '/');
    } else if(isset($_SERVER['CONTEXT_DOCUMENT_ROOT'])){
      define('PWD', str_replace('\\', '/', $_SERVER['CONTEXT_DOCUMENT_ROOT']) . '/');
    }

    define('BASEPATH', str_replace('\\', '/', PWD != '' ? PWD . "/$system_path/" : "$system_path/" ));

require_once BASEPATH . 'core/CodeIgniter.php';

//TODO: Arreglar la creacion de modelos con nombres plurales, ejemplo: hbf_detalles_vasos con id id_detalle_vaso crea codigo con id: id_detall_vaso
