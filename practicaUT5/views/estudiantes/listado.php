<!DOCTYPE html>
<html>
<head>
    <title>Listado de Estudiantes</title>
</head>
<body>
    <h1>Estudiantes</h1>

    <button><a href="index.php?controller=estudiante&action=crear">Añadir Estudiante</a></button>
    <table border="1">
        <thead>
            <tr>
                <th>NIA</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Detalle</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estudiantes as $estudiante): ?>
                <tr>
                    <td><?=  $estudiante->nia ?></td>
                    <td><?=  $estudiante->nombre ?></td>
                    <td><?=  $estudiante->apellidos ?></td>
                    <td><?=  $estudiante->edad?></td>
                    <td>
                        <a href="index.php?controller=estudiante&action=detalle&nia=<?=$estudiante->nia?>">Detalle</a>
                    </td>
                    <td>
                        <a href="index.php?controller=estudiante&action=editar&nia=<?=$estudiante->nia?>">Editar</a>
                    </td>
                    <td>
                        <a href="index.php?controller=estudiante&action=eliminar&nia=<?= $estudiante->nia?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
