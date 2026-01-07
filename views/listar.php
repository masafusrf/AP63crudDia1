<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <!-- LISTADO -->
<h2>Listado de Productos</h2>


<a href="index.php?accion=crear">Crear producto</a>



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
            <a href="index.php?accion=actualizar&id=<?= $p->getId() ?>">Editar</a>
            <a href="index.php?accion=eliminar&id=<?= $p->getId() ?>">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
    
</body>
</html>