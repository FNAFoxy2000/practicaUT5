<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle estudiante matricula</title>
</head>

<body>
    <h1><?php echo "Matriculas del estudiante con NIA: " . htmlspecialchars($niaEstudiante); ?></h1>
    <table border="1">
        <thead>
            <tr>
                <th>Id matricula</th>
                <th>Nia Estudiante</th>
                <th>Id Curso</th>
                <th>Fecha</th>
                <th>Borrar</th>    
            </tr>
        </thead>
        <tbody>
        <?php foreach ($matriculas as $matri):
            if($matri->niaEstudiante == $niaEstudiante):
            ?>
                <tr>
                    <td><?=  $matri->id ?></td>
                    <td><?=  $niaEstudiante ?></td>
                    <td><?=  $matri->idCurso ?></td>
                    <td><?=  $matri->fecha->format("Y-m-d")?></td>
                    <td>
                        <a href="index.php?controller=matricula&action=eliminar&id=<?= $matri->id?>">Eliminar</a>
                    </td>
                </tr>
            <?php endif;
        endforeach; ?>
        </tbody>

    </table>
    <button><a href="index.php?controller=matricula">Al listado</a></button>
    <button><a href="index.php">Al inicio</a></button>
</body>

</html>