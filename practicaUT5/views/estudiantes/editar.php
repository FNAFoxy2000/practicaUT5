<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de edición de estudiante</title>
</head>
<body>
    <h1>Editar Estudiante</h1>

    <!-- El formulario se envía a la acción 'guardar' para que se actualicen los datos -->
    <form method="POST" action="index.php?controller=estudiante&action=guardar">
        <label for="nia">NIA:</label>
        <!-- NIA es readonly porque no debe ser modificado -->
        <input type="text" id="nia" name="nia" value="<?= $estudiante->nia ?>" readonly><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= $estudiante->nombre ?>" required><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?= $estudiante->apellidos ?>" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="<?= $estudiante->edad ?>" min="0" required><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
