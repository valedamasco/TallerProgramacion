<?php
    session_start();
    include 'head.php';
    include 'header.php';
?>
<div class="container">
    <h1>Sobre mi</h1>
    <table class="table" style="width: 40%">
        <thead>
            <tr> <td>Email</td> <td> <?php echo '<input type="email" name="email" value="' . $_SESSION['email'] . '">';  ?> </td> </tr>
            <tr> <td>Clave</td> <td> <input type="password" name="password"  value="valorpordefecto"></td> </tr>
            <tr> <td>Alias</td> <td> <?php echo '<input type="text" name="alias" value="' . $_SESSION['alias'] . '">';  ?> </td> </tr>
            <tr> <td>Es administrador</td> <td> <?php 
                                                   echo '<input type="checkbox" name="isAdmin" ';
                                                        if($_SESSION['admin']==1) {
                                                            echo ' checked="true"';
                                                        }
                                                            echo '>';  ?>  </td> </tr>
            <tr> <td><input type="submit"></td> </tr>

        </thead>
    </table>
</div>
<?php 
    include './footer.php';
?>