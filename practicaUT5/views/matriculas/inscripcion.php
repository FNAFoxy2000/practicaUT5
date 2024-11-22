<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de creación de matriculas</title>
</head>
<body>
<!-- En el action en lugar de solo poner la página que gestionará la información, se mete la info de controlador-->
<form method="POST" action="index.php?controller=matricula&action=guardar">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="niaEstudiante">Nia del estudiante:</label>
        <input type="text" id="niaEstudiante" name="niaEstudiante" required><br><br>

        <label for="idCurso">Id del curso:</label>
        <input type="number" id="idCurso" name="idCurso" required><br><br>

        <button type="submit">Guardar Matricula</button>
    </form>
</body>
</html>