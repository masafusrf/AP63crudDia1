<!DOCTYPE html>
<html>
<!-- ...-->
<!-- FORMULARIO CREAR -->
<h2>Crear</h2>

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


</body>
</html>