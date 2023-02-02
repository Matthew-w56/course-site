<?php

session_start();
//Destroy the session
session_destroy();
//Destroy login cookie
setcookie('satonalog', 'adios!', time() - 1, '/');
header('location: /course-site/.');

?>