<?php 
    session_start();
    include 'head.php';
    include 'header.php';
    include './conection.php';
?>
<div class="container">
<h1>Usuarios</h1>
<table class="table">
    <thead class="thead-dark"> 
        <tr>
            <th scope="col"> Email </th> 
            <th scope="col"> Alias </th>
            <th scope="col"> Es Admin </th> 
        </tr> 
    </thead>
    <tbody><tr>
        <?php 
        $users = getAllUsers();
        foreach ($users as $user) {
            echo '<tbody><tr>';
            echo "<td>$user[1]</td> <td>$user[2]</td> ";
            if($user[4]==1){
                echo "<td>Si</td>";
            } else {
                echo "<td>No</td>";
            }
            echo '</tr></tbody>';
        }
        ?>
    </tr></tbody>
</table>
</div>
<?php 
    include './footer.php';
?>