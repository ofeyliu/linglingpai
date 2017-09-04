<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");

include 'PHP/openapi_client.php';
include 'PHP/datasql.php';


if (isset($_COOKIE["user"]))
{
 	echo(0);
}   
else
{
    echo(1);

}

?>