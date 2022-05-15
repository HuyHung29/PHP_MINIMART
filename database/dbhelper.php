<?php
require_once 'config.php';

// insert, update, delete
function execute($sql)
{
    // open connect
    $cont = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($cont, "utf8");

    // query
    $result = mysqli_query($cont, $sql);

    // close connect
    mysqli_close($cont);

    return $result;
}

// select
function executeResult($sql, $isSingle = false)
{
    $data = null;
    // open connect
    $cont = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($cont, "utf8");

    // query
    $result = mysqli_query($cont, $sql);
    if ($isSingle) {
        $data = mysqli_fetch_array($result, 1);
    } else {
        $data = [];
        while (($row = mysqli_fetch_array($result, 1)) != null) {
            $data[] = $row;
        }
    }

    // close connect
    mysqli_close($cont);

    return $data;
}