<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <?php 
        include './head.php';
        include './conection.php'; 
        include './header.php';
    ?>
    <body>
        <?php 
        if(empty($_SESSION)) {            
            echo '<div class="container">'
            . '<h1>Log In</h1>'
            . '<form method="POST" class="form-login">'
                . '<table class="table" style="width: 30%">'
                    . '<tr> <td>Email</td> <td> <input type="email" name="email"> </td> </tr>'
                    . '<tr> <td>Clave</td> <td> <input type="password" name="password"> </td> </tr>'
                    . '<tr> <td><input type="submit"></td> <td align="right"> <a href="./includes/register.php">Registrarse</a> </td></tr>'
                    .'</table></form></div>';
            if (array_key_exists("email", $_POST) && array_key_exists("password", $_POST)){
                if(strlen($_POST['email']) > 0 && strlen($_POST['password']) > 0) {
                    $afterLogIn = loginOperations($_POST['email'],'login', $_POST['password']);
                    if($afterLogIn==0){
                        echo '<label>Usuario o clave incorrecta</label>';
                    } else {
                        header('Location:'. $_SERVER['HTTP_ORIGIN'] . '/Obligatorio-167467/index.php' );
                    }
                } else { 
                    echo '<label>Ingrese usuario y clave</label>';
                }
            }      
        } ?>
    </body>
    <?php include './includes/footer.php'; ?>
</html>