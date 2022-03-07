<?php
session_start();
session_destroy();
header('Location:'. $_SERVER['HTTP_ORIGIN'] . '/Obligatorio-167467/index.php' );
exit;
