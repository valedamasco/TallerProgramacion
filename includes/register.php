<?php 
    include 'head.php';
    include 'header.php';
    include './conection.php';
    echo '<h1>Registrarse</h1>';
?>
<form method="POST">
    <table class="register-table">
        <tr> <td>Email</td> <td> <input type="email" name="email"> </td> </tr>
        <tr> <td>Alias</td> <td> <input type="text" name="alias"> </td> </tr>
        <tr> <td>Clave</td> <td> <input type="password" name="password1"> </td> </tr>
        <tr> <td>Repetir clave</td> <td> <input type="password" name="password2"> </td> </tr>
        <tr> <td>Es administrador</td> <td> <input type="checkbox" name="isAdmin"> </td> </tr>
        <tr> <td><input type="submit"></td></tr>
        <?php 
            if (array_key_exists("password1", $_POST) && array_key_exists("password2", $_POST)
                    && array_key_exists("email", $_POST)&& array_key_exists("alias", $_POST)){
                if($_POST['password1']!=$_POST['password2']){
                    echo '<label>Claves deben ser iguales</label>';
                    return;
                }
                elseif(strlen($_POST['email']) > 0 && strlen($_POST['alias']) > 0 && strlen($_POST['password2'])>0) {
                    $afterCheck = loginOperations($_POST['email'],'check');
                    if($afterCheck){
                        echo '<label>Ya existe usuario con ese mail</label>';
                        return;
                    } else {
                        if($_POST['isAdmin']=='on') {
                            $registerUser = loginOperations($_POST['email'], 'register',$_POST['password1'], $_POST['alias'], 1);
                        } else {
                            $registerUser = loginOperations($_POST['email'], 'register',$_POST['password1'], $_POST['alias']);                            
                        }
                        echo '<label>Usuario registrado con exito!</label>';
                    }
                }
            }
        ?>
    </table>
</form>
<?php 
    include './footer.php';
?>