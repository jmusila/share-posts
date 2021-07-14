<?php

/**
 * Simple page redirect function
 *
 * @return void
 */
function redirect($page)
{
    header('location: ' . URLROOT . '/' . $page);
}
