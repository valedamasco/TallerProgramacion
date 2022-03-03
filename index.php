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
            <table class="table">
                <?php 
                    $result = getAllLocations();
                    echo '<tr> <thead class="thead-dark">'
                        . '<th scope="col"> Nombre </th> '
                        . '<th scope="col"> Foto </th>'
                        . '<th scope="col"> Video </th> '
                        . '<th scope="col"> Descripcion </th> '
                        . '<th scope="col"> Promedio Puntaje </th> '
                        . '<th scope="col"> Comentarios </th> '
                        . '</tr> </thead>';
                    foreach ($result as $cat) {
                        echo "<tr>"
                            . "<td>$cat[1]</td> "
                            . "<td> <img src=./asseets/images/$cat[3]  width='80' height='40'> </td>";
                            if($cat[4]!=null) {
                                echo "<td> <a href='$cat[4]'>Link</a> </td> ";
                            } else {
                                 echo "<td> <p>Link</p> </td> ";
                            };
                        echo "<td>$cat[5]</td>"
                            . "<td>3</td>";
                        echo '<td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"> Ver </button> </td></tr>';
                    }
                ?>
            </table>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                <p>Some text in the modal.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
  
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