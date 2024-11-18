<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de creación de estudiantes</title>
</head>
<body>
<!-- En el action en lugar de solo poner la página que gestionará la información, se mete la info de controlador-->
<form method="POST" action="index.php?controller=estudiante&action=guardar">
        <label for="nia">NIA:</label>
        <input type="text" id="nia" name="nia" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="0" required><br><br>

        <button type="submit">Guardar Estudiante</button>
    </form>
</body>
</html>