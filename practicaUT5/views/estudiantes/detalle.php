<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle estudiante</title>
</head>
<body>
    <table border="1">
    <thead>
            <tr>
                <th>NIA</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
                <tr>
                    <td><?php echo htmlspecialchars($estudiante->nia); ?></td>
                    <td><?php echo htmlspecialchars($estudiante->nombre); ?></td>
                    <td><?php echo htmlspecialchars($estudiante->apellidos); ?></td>
                    <td><?php echo htmlspecialchars($estudiante->edad); ?></td>
                    <td>
                        <a href="index.php?controller=estudiante&action=editar&nia=<?php echo $estudiante->nia; ?>">Editar</a>
                    </td>
                    <td>
                        <a href="index.php?controller=estudiante&action=eliminar&nia=<?php echo $estudiante->nia; ?>">Eliminar</a>
                    </td>
                </tr>
    </table>
    <button><a href="index.php?controller=estudiante">Al listado</a></button>
    <button><a href="index.php">Al inicio</a></button>
</body>
</html>