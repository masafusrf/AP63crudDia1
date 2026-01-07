<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <table border="1" cellpadding="10">
        <tr>
            <td>
                <!-- Botón Editar -->
                <form method="POST" action="index.php?accion=actualizar" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $producto->getId() ?>">
                    Nombre: <input type="text" name="nombre" value="<?= $producto->getNombre() ?>" required>
                    Precio: <input type="number" step="1" name="precio" value="<?= $producto->getPrecio() ?>" required>

                    <?php if ($producto instanceof Electronico): ?>
                        Fabricante:
                        <input type="text" name="fabricante" value="<?= $producto->getFabricante() ?>">
                    <?php endif; ?>

                    <?php if ($producto instanceof Alimento): ?>
                        Caducidad:
                        <input type="date" name="caducidad" value="<?= $producto->getCaducidad() ?>">
                    <?php endif; ?>

                    <button type="submit">Modificar</button>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>
