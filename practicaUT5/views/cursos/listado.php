<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Cursos</title>
</head>
<body>
    <h1>Cursos</h1>
    <button><a href="index.php?controller=curso&action=crear">Añadir curso</a></button>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>capacidad Maxima</th>
                <th>Detalle</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cursos as $curso): ?>
                <tr>
                    <td><?=  $curso->id ?></td>
                    <td><?=  $curso->nombre ?></td>
                    <td><?=  $curso->descripcion ?></td>
                    <td><?=  $curso->capacidadMaxima?></td>
                    <td>
                        <a href="index.php?controller=curso&action=detalle&id=<?=$curso->id?>">Detalle</a>
                    </td>
                    <td>
                        <a href="index.php?controller=curso&action=editar&id=<?=$curso->id?>">Editar</a>
                    </td>
                    <td>
                        <a href="index.php?controller=curso&action=eliminar&id=<?= $curso->id?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>