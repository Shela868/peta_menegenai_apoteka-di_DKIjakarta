<?php

$setUri['base'] = 'http://localhost/gis/';

function getPage($a = '')
{
    $url = '?page=' . $a;
    $getbase_url = $GLOBALS['setUri']['base'];
    return $getbase_url . $url;
}

?>