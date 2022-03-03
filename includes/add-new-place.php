<?php 
    include_once './head.php';
    include 'header.php';
    include './conection.php';
    echo '<h1>Agregar nuevo lugar</h1>';
?>
<form method="POST" class="form-ass-new-place">
    <table>
        <tr> <td>Nombre</td> <td> <input type="text" name="name"> </td> </tr>
        <tr> <td>Departamento</td> <td> 
            <select name="department">
                <option value='1'>Artigas</option>
                <option value='2'>Canelones</option>
                <option value='3'>Cerro Largo</option>
                <option value='4'>Colonia</option>
                <option value='5'>Durazno</option>
                <option value='6'>Flores</option>
                <option value='7'>Florida</option>
                <option value='8'>Lavalleja</option>
                <option value='9'>Maldonado</option>
                <option value='10'>Montevideo</option>
                <option value='11'>Paysandu</option>
                <option value='12'>Rio Negro</option>
                <option value='13'>Rivera</option>
                <option value='14'>Rocha</option>
                <option value='15'>Salto</option>
                <option value='16'>San Jose</option>
                <option value='17'>Soriano</option>
                <option value='18'>Tacuarembo</option>
                <option value='19'>Treita y Tres</option>
            </select> 
            </td> </tr>
        <tr> <td>Foto</td> <td> <input type="file" name="image"> </td> </tr>
        <tr> <td>Link video</td> <td> <input type="url" name="video"> </td> </tr>
        <tr> <td>Descripcion</td> <td> <input type="text" name="description"> </td> </tr>
        <tr> <td><input type="submit"></td> </tr>

        <?php 
            if(!empty($_POST['name'])&& !empty($_POST['image']) && !empty($_POST['video']) && !empty($_POST['description'])){
                $afterAddLocation = postNewLocation($_POST['name'], $_POST['department'], $_POST['image'], $_POST['video'], $_POST['description']);
                if($afterAddLocation){
                    echo '<label>Se agrego con exito!</label>';
                } else {
                    echo '<label class="bad-request">No se pudo agregar!</label>';
                }
            } else {
                echo '<label class="bad-request">Se deben completar todos los campos</label>';
            }
        ?>
    </table>
</form>
<?php 
    include './footer.php';
?>
