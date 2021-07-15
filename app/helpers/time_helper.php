<?php

function timestamps()
{
    $date = new DateTime("now", new DateTimeZone(getenv('APP_TIMEZONE')));

    return $date->format('Y-m-d H:i:s');
}