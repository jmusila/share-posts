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
        $data['created_at'] = date('Y-m-d h:i:sa', time());
    }

    if($data['updated_at']){
        $data['updated_at'] = date('Y-m-d h:i:sa', time());
    }
}