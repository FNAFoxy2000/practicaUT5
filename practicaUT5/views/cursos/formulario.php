<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de creación de cursos</title>
</head>
<body>
<!-- En el action en lugar de solo poner la página que gestionará la información, se mete la info de controlador-->
<form method="POST" action="index.php?controller=curso&action=guardar">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" required><br><br>

        <label for="capacidadMaxima">Capacidad Maxima:</label>
        <input type="number" id="capacidadMaxima" name="capacidadMaxima" min="0" required><br><br>

        <button type="submit">Guardar Curso</button>
    </form>
</body>
</html>