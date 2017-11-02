<?php
/**
 * Created by PhpStorm.
 * User: steph
 * Date: 01/11/2017
 * Time: 12:31
 */
if (isset($errors) && count($errors) != 0){
    echo '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    foreach ($errors as $error){
        echo $error.'<br/>';
    }
    echo '</div><br />';
}