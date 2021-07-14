<?php

/**
 * Simple page redirect function
 */
function redirect($page)
{
    header('location: ' . URLROOT . '/' . $page);
}

/**
 * Automatically add timestamps
 */
function timestamps($data)
{
    if($data['created_at']){
        $created_at = date('Y-m-d h:i:sa', time());
        return $created_at;
    }

    if($data['updated_at']){
        date('Y-m-d h:i:sa', time());
    }
}