<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de edición de curso</title>
</head>
<body>
    <h1>Editar Curso</h1>

    <!-- El formulario se envía a la acción 'guardar' para que se actualicen los datos -->
    <form method="POST" action="index.php?controller=curso&action=guardar">
        <label for="id">ID:</label>
        <!-- id es readonly porque no debe ser modificado -->
        <input type="text" id="id" name="id" value="<?= $curso->id ?>" readonly><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= $curso->nombre ?>" required><br><br>

        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" value="<?= $curso->descripcion ?>" required><br><br>

        <label for="capacidadMaxima">Capacidad Maxima:</label>
        <input type="number" id="capacidadMaxima" name="capacidadMaxima" value="<?= $curso->capacidadMaxima ?>" min="0" required><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
