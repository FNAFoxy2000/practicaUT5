<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle estudiante matricula</title>
</head>

<body>
    <h1><?php echo "Matriculas del curso con ID: " . htmlspecialchars($idCurso); ?></h1>
    <table border="1">
        <thead>
            <tr>
                <th>Id Matricula</th>
                <th>Nia Estudiante</th>
                <th>Id Curso</th>
                <th>Fecha</th>
                
            </tr>
        </thead>
        <tbody>
        <?php foreach ($matriculas as $matri):
            if($matri->idCurso == $idCurso):
            ?>
                <tr>
                    <td><?=  $matri->id ?></td>
                    <td><?=  $matri->niaEstudiante ?></td>
                    <td><?=  $idCurso ?></td>
                    <td><?=  $matri->fecha->format("Y-m-d")?></td>
                    <td>
                        <a href="index.php?controller=matricula&action=detalleEstudiante&niaEstudiante=<?=$niaEstudiante?>">Detalle Estudiante</a>
                    </td>
                    <td>
                        <a href="index.php?controller=matricula&action=detalleCurso&idCurso=<?=$matri->idCurso?>">Detalle Curso</a>
                    </td>
                    <td>
                        <a href="index.php?controller=matricula&action=eliminar&id=<?= $matri->id?>">Eliminar</a>
                    </td>
                </tr>
            <?php endif;
        endforeach; ?>
        </tbody>

    </table>
    <button><a href="index.php?controller=estudiante">Al listado</a></button>
    <button><a href="index.php">Al inicio</a></button>
</body>

</html>