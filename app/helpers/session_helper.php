<?php

session_start();

/**
 * Flash messaging helper
 *
 * Example: flash('register_success', 'User successfully created', 'alert alert-danger');
 * Diplay: <?php echo flash('register_success');
 */
function flash($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            if(!empty($_SESSION[$name . '_class'])){
                unset($_SESSION[$name . '_class']);
            }
            $_SESSION[$name] = $name;
            $_SESSION[$name . '_class'] = $class;
        }
    }
}