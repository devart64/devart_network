<?php
/**
 * Created by PhpStorm.
 * User: steph
 * Date: 02/11/2017
 * Time: 14:17
 */
session_start();
session_destroy();
$_SESSION = [];
