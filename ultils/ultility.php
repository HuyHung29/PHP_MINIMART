<?php

// fix sql injection
function fixInjection($sql)
{
    $sql = str_replace('\\', '\\\\', $sql);
    $sql = str_replace('\'', '\\\'', $sql);

    return $sql;
}

function getGet($key)
{
    $value = "";
    if (isset($_GET[$key])) {
        $value = $_GET[$key];
        $value = fixInjection($value);
    }

    return $value;
}

function getPost($key)
{
    $value = "";
    if (isset($_POST[$key])) {
        $value = $_POST[$key];
        $value = fixInjection($value);
    }

    return $value;
}

function getCookie($key)
{
    $value = "";
    if (isset($_COOKIE[$key])) {
        $value = $_COOKIE[$key];
        $value = fixInjection($value);
    }

    return $value;
}