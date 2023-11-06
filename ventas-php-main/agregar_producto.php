<?php
include_once "encabezado.php";
include_once "navbar.php";
session_start();

if(empty($_SESSION['usuario'])) header("location: login.php");

?>
<div class="container">
    <h3>Agregar producto</h3>
    <form method="post">
    <div class="mb-3">
    <label for="codigo" class="form-label">Código de barras</label>
    <select name="codigo" class="form-select" id="codigo">
        <option value="123456789">123456789</option>
        <option value="987654321">987654321</option>
        <option value="567890123">567890123</option>
        <option value="111222333">111222333</option>
        <option value="444555666">444555666</option>
    </select>
</div>

        <div class="mb-3">
    <label for="nombre" class="form-label">Nombre o descripción</label>
    <select name="nombre" class="form-select" id="nombre">
        <option value="Coca-Cola">Coca-Cola</option>
        <option value="Pepsi">Pepsi</option>
        <option value="Sprite">Sprite</option>
        <option value="Fanta">Fanta</option>
        <option value="7UP">7UP</option>
        <!-- Agrega más opciones según sea necesario -->
    </select>
</div>


        <div class="row">
            <div class="col">
                <label for="compra" class="form-label">Precio compra</label>
                <input type="number" name="compra" step="any" id="compra" class="form-control" placeholder="Precio de compra" aria-label="">
            </div>
            <div class="col">
                <label for="venta" class="form-label">Precio venta</label>
                <input type="number" name="venta" step="any" id="venta" class="form-control" placeholder="Precio de venta" aria-label="">
            </div>
            <div class="col">
                <label for="existencia" class="form-label">Existencia</label>
                <input type="number" name="existencia" step="any" id="existencia" class="form-control" placeholder="Existencia" aria-label="">
            </div>
            
        </div>
        <div class="text-center mt-3">
            <input type="submit" name="registrar" value="Registrar" class="btn btn-primary btn-lg">
            
            </input>
            <a class="btn btn-danger btn-lg" href="productos.php">
                <i class="fa fa-times"></i> 
                Cancelar
            </a>
        </div>
    </form>
</div>
<?php
if(isset($_POST['registrar'])){
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $compra = $_POST['compra'];
    $venta = $_POST['venta'];
    $existencia = $_POST['existencia'];
    if(empty($codigo) 
    || empty($nombre) 
    || empty($compra) 
    || empty($venta)
    || empty($existencia)){
        echo'
        <div class="alert alert-danger mt-3" role="alert">
            Debes completar todos los datos.
        </div>';
        return;
    } 
    
    include_once "funciones.php";
    $resultado = registrarProducto($codigo, $nombre, $compra, $venta, $existencia);
    if($resultado){
        echo'
        <div class="alert alert-success mt-3" role="alert">
            Producto registrado con éxito.
        </div>';
    }
    
}
?>