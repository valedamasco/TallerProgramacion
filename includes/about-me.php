<?php 
    include 'head.php';
    include 'header.php';
    var_dump($_SESSION)
?>
<div class="container">
    <h1>Sobre mi</h1>
    <table class="table" style="width: 40%">
        <thead>
            <tr> <td>Email</td> <td> <input type="email" name="email"> </td> </tr>
            <tr> <td>Clave</td> <td> <input type="password" name="password"> </td> </tr>
            <tr> <td>Alias</td> <td> <input type="text" name="alias"> </td> </tr>
            <tr> <td><input type="submit"></td> </tr>

        </thead>
    </table>
</div>
<?php 
    include './footer.php';
?>