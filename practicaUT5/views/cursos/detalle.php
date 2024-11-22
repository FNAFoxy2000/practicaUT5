<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle curso</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Capacidad Maxima</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>

        <tr>
            <td><?php echo htmlspecialchars($curso->id); ?></td>
            <td><?php echo htmlspecialchars($curso->nombre); ?></td>
            <td><?php echo htmlspecialchars($curso->descripcion); ?></td>
            <td><?php echo htmlspecialchars($curso->capacidadMaxima); ?></td>
            <td>
                <a href="index.php?controller=curso&action=editar&id=<?php echo $curso->id; ?>">Editar</a>
            </td>
            <td>
                <a href="index.php?controller=curso&action=eliminar&id=<?php echo $curso->id; ?>">Editar</a>
            </td>
        </tr>
    </table>
    <button><a href="index.php?controller=curso">Al listado</a></button>
    <button><a href="index.php">Al inicio</a></button>
</body>
</html>