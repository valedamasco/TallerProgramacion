<?php
function conectionDB(){
    $servidor = '127.0.0.1';
    $usuario = 'root';
    $password = 'root';
    $baseDeDatos = 'obligatorio';
    $db = mysql_connect($servidor, $usuario, $password, $baseDeDatos);

    if(!db){
        echo '<label>Error al conectarse a la base</label>';
        var_dump($db);
        die();
    }else{
        mysqli_query($db, "SET NAMES 'utf8'");
        session_start();
        return 'EXITO';
    }
}

function loginOperations($emailLogin, $mode, $passwordLogin = '', $aliasLogin = null, $isAdmin = 0){
    
    $servidor = '127.0.0.1';
    $usuario = 'root';
    $password = 'root';
    $baseDeDatos = 'obligatorio';
    $db = mysqli_connect($servidor, $usuario, $password, $baseDeDatos);

    if(!$db){
        echo '<label>Error al conectarse a la base</label>';
    }else{
        switch ($mode) {
            case 'login':
                $consultaSql = "SELECT * FROM usuarios WHERE email='$emailLogin' AND password='$passwordLogin'";
                $result = mysqli_query($db, $consultaSql);
                $logIn = mysqli_num_rows($result);
                if($logIn>0){
                    session_start();
                    $_SESSION['email'] = $emailLogin;
                    $fetchResult = mysqli_fetch_assoc($result);
                    $_SESSION['alias'] = $fetchResult['alias'];
                } 
                return $logIn;
                break;
            case 'check':
                $consultaSql = "SELECT * FROM usuarios WHERE email='$emailLogin'";
                $result = mysqli_query($db, $consultaSql);
                $checkUser = mysqli_num_rows($result);
                if($checkUser>0){
                    return true; 
                } else {
                    return false;
                }
                break;
            case 'register':
                $consultaSql = "INSERT INTO usuarios VALUES ('','$emailLogin','$aliasLogin','$passwordLogin','$isAdmin')";
                $result = mysqli_query($db, $consultaSql);
                $registerUser = mysqli_num_rows($result);
                if($registerUser>0){
                    session_start();
                    $_SESSION['email'] = $emailLogin;
                    $_SESSION['alias'] = $aliasLogin;
                } 
                return $registerUser;
                break;
        }
    }
    
    mysqli_close($db);
    
}


function getAllLocations(){
    
    $servidor = '127.0.0.1';
    $usuario = 'root';
    $password = 'root';
    $baseDeDatos = 'obligatorio';
    $db = mysqli_connect($servidor, $usuario, $password, $baseDeDatos);

    if(!db){
        echo '<label>Error al conectarse a la base</label>';
        var_dump($db);
    }else{
        $consultaSql = "SELECT * FROM lugares";
        $result = mysqli_query($db, $consultaSql);
        $rows = mysqli_num_rows($result);
        if($rows>0){
            $data = array();
            while($row = mysqli_fetch_row($result)) {
                $data[] = $row;
            }
            return $data;
        } 
        return [];
    }    
}