<?php

function render($view, $data = [])
{
    extract($data);
    require_once __DIR__ . "/Views/$view.php";
}

function redirect($url)
{
    header("Location: $url");
    exit();
}
