<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Matriculas</title>
</head>
<body>
    <h1>Matriculas</h1>
    <button><a href="index.php?controller=matricula&action=crear">Añadir matricula</a></button>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>niaEstudiante</th>
                <th>idCurso</th>
                <th>Fecha</th>
                <th>Detalle</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Matriculas as $matricula): ?>
                <tr>
                    <td><?=  $matricula->id ?></td>
                    <td><?=  $matricula->niaEstudiante ?></td>
                    <td><?=  $matricula->idCurso ?></td>
                    <td><?=  $matricula->fecha?></td>
                    <td>
                        <a href="index.php?controller=matricula&action=detalle&id=<?=$matricula->id?>">Detalle</a>
                    </td>
                    <td>
                        <a href="index.php?controller=matricula&action=eliminar&id=<?= $matricula->id?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>