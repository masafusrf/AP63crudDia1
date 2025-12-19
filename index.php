<?php

    require_once "autoloader.php";
    session_start();

    $gestor= new GestorEntidad();

    $accion = $_GET['accion'] ?? null;

    if ($accion === 'crear') {
        
        $id=uniqid();
        $nombre= $_POST['nombre'];
        $precio= $_POST['precio'];
        $fabricante= $_POST['fabricante'];
        $caducidad= $_POST['caducidad'];

        $producto = new Producto($id, $nombre, $precio, $fabricante, $caducidad);
        $gestor->crearObjeto($producto);
        header("Location: index.php");
        exit();
    }

    $productos = $gestor->leerObj();

    if ($accion === 'actualizar') {
        $gestor->actObj($_POST['id'], $_POST['nombre'], $_POST['precio']);
        header("Location: index.php");
        exit();   
    }

    // $gestor->actObj(20, "nuevoProd20", 70);
    // $gestor->actObj(40, "nuevoProd40", 80);

    $gestor->elimObj(1);
    $gestor->elimObj(20);

    $productos= $gestor->leerObj();

?>

<!DOCTYPE html>
<html>
<!-- ...-->
<!-- FORMULARIO CREAR -->
<h2>Crear Producto</h2>

<form method="POST" action="index.php?accion=crear"> <!-- Aquí está la clave de recoger por GET la acción -->

    <label for="nombre">Nombre</label><br>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="precio">Precio</label><br>
    <input type="number" id="precio" name="precio" required><br>

    <label for="nombre">Fabricante</label><br>
    <input type="text" id="fabricante" name="fabricante"><br>

    <label for="id">Caducidad</label><br>
    <input type="date" id="caducidad" name="caducidad"><br>

    <input type="submit" value="Guardar">
</form>

    <!-- LISTADO -->
<h2>Listado de Productos</h2>


<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Fabricante</th>
        <th>Caducidad</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($productos as $p): ?>
    <tr>
        <td><?= $p->getId() ?></td>
        <td><?= $p->getNombre() ?></td>
        <td><?= $p->getPrecio() ?></td>
        <td><?= ($p instanceof Electronico) ? $p->getFabricante() : 'X' ?></td>
        <td><?= ($p instanceof Alimento) ? $p->getCaducidad() : 'X' ?></td>
        <td>
            <!-- Botón Editar -->
            <form method="POST" action="index.php?accion=actualizar" style="display:inline;"> <!-- Recogemos por GET la acción -->
                <input type="hidden" name="id" value="<?= $p->getId() ?>">
                Nombre: <input type="text" name="nombre" value="<?= $p->getNombre() ?>" required>
                Precio: <input type="number" step= "1" name="precio" value="<?= $p->getPrecio() ?>" required>
                <?php if ($p instanceof Electronico): ?>
                    Fabricante:
                    <input type="text" name="fabricante" value="<?= $p->getFabricante() ?>">
                <?php endif; ?> 
                <?php if ($p instanceof Alimento): ?>
                   Caducidad:
                    <input type="date" name="caducidad" value="<?= $p->getCaducidad() ?>">
                <?php endif; ?>

                <button type="submit">Guardar</button>    
            <!-- recogemos por POST los datos para modificar (podemos poner datos por defecto) -->
            </form>

        </td>
    </tr>
    <?php endforeach; ?>
</table>



</body>
</html>