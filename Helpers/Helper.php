<?php

function dd($param)
{
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
    die;
}

function setlog($file, $content, $append = "")
{
    $content = json_encode($content);

    if ($append != "") {
        file_put_contents('./logs/'.$file, $content);
    } else {
        file_put_contents('./logs/'.$file, $content, FILE_APPEND);
    }
}
