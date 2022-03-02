<!DOCTYPE html>

<html>
    <?php 
        include './includes/head.php';
        include './includes/conection.php';  
    ?>
    <body>
        <?php include './includes/header.php'; ?>
        <div class="places">
            <h1>Lugares a visitar</h1>
            <table class="table-places">
                <?php 
                    $result = getAllLocations();
                    echo '<tr>'
                        . '<th> Nombre </th> '
                        . '<th> Foto </th>'
                        . '<th> Video </th> '
                        . '<th> Descripcion </th> '
                        . '<th> Promedio Puntaje </th> '
                        . '<th> Comentarios </th> '
                        . '</tr>';
                    foreach ($result as $cat) {
                        echo "<tr>"
                            . "<td>$cat[1]</td> "
                            . "<td> <img src=./asseets/images/$cat[3]  width='70' height='35'> </td>"
                            . "<td> <a href='$cat[4]'>Link</a> </td> "
                            . "<td>$cat[5]</td>"
                            . "<td>25</td>"
                            . "<td><button> Ver </button> </td>"
                            . "</tr>";
                    }
                ?>
            </table>
        </div>
        <div class="login">
            <h1>Log In</h1>
            <form method="POST" class="form-login">
                <table>
                    <tr> <td>Email</td> <td> <input type="email" name="email"> </td> </tr>
                    <tr> <td>Clave</td> <td> <input type="password" name="password"> </td> </tr>
                    <tr> <td><input type="submit"></td> <td align="right"> <a href="./includes/register.php">Registrarse</a> </td></tr>
                    <?php 
                        if (array_key_exists("email", $_POST) && array_key_exists("password", $_POST)){
                            if(strlen($_POST['email']) > 0 && strlen($_POST['password']) > 0) {
                                $afterLogIn = loginOperations($_POST['email'],'login', $_POST['password']);
                                if($afterLogIn==0){
                                    echo '<label>Usuario o clave incorrecta</label>';
                                } else {
                                    echo '<label>Login exitoso!</label>';
                                }
                            } else { 
                                echo '<label>Ingrese usuario y clave</label>';
                            }
                        }
                    ?>
                </table>
            </form>
        </div>
    </body>
    <?php include './includes/footer.php'; ?>
</html>