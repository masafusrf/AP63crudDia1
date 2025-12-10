<?php

    require_once "autoloader.php";

    $gestor= new GestorEntidad();

    for ($i=1; $i<=50; $i++) { 
        $producto = new Producto($i, "producto$i", $i *10);
        $gestor->crearObjeto($producto);
    }

    $gestor->actObj(20, "nuevoProd20", 70);
    $gestor->actObj(40, "nuevoProd40", 80);

    $gestor->elimObj(1);
    $gestor->elimObj(50);

    $productos= $gestor->leerObj();

?>

    <!-- LISTADO -->
<h2>Listado de Productos</h2>

<?php if (empty($productos)): ?>
    <p>No hay productos aún.</p>
<?php else: ?>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
    </tr>

    <?php foreach ($productos as $p): ?>
    <tr>
        <td><?= $p->getId() ?></td>
        <td><?= $p->getNombre() ?></td>
        <td><?= $p->getPrecio() ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php endif; ?>

</body>
</html>