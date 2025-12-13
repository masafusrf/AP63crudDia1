<?php

    require_once "autoloader.php";

    $gestor= new GestorEntidad();

    for ($i=1; $i<=50; $i++) { 
        if ($i % 2 == 0) {
            if ($i % 4 == 0) {
                $producto= new Electronico($i, "producto$i", $i * 20, "Samsung");
            } else{
                $producto= new Electronico($i, "producto$i", $i * 20, "LG");
            }
            
        } else{

            $fecha= date( "d-m-Y", rand(strtotime("2026-01-01"), strtotime("2028-01-01")));

            $producto= new Alimento($i, "producto$i", $i * 5, $fecha);
            
        }

        $gestor->crearObjeto($producto);
    }

    $gestor->actObj(20, "nuevoProd20", 70);
    $gestor->actObj(40, "nuevoProd40", 80);

    $gestor->elimObj(1);
    $gestor->elimObj(20);

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
        <th>Fabricante</th>
        <th>Caducidad</th>
    </tr>

    <?php foreach ($productos as $p): ?>
    <tr>
        <td><?= $p->getId() ?></td>
        <td><?= $p->getNombre() ?></td>
        <td><?= $p->getPrecio() ?></td>
        <td><?= ($p instanceof Electronico) ? $p->getFabricante() : 'X' ?></td>
        <td><?= ($p instanceof Alimento) ? $p->getCaducidad() : 'X' ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php endif; ?>

</body>
</html>