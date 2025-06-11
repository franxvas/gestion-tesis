<?php include('../db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tesis</title>
    <link rel="stylesheet" href="/GestionTesis/styles.css">
</head>
<body>
<div class="container">
    <h4>Lista de Tesis</h4>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Línea</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Estado</th>
                <th>Tesista</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT tesis.*, tesistas.apellidos, tesistas.nombres FROM tesis JOIN tesistas ON tesis.id_tesista = tesistas.id";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['titulo']}</td>
                <td>{$row['linea_investigacion']}</td>
                <td>{$row['fecha_inicio']}</td>
                <td>{$row['fecha_fin']}</td>
                <td>{$row['estado']}</td>
                <td>{$row['apellidos']} {$row['nombres']}</td>
                <td>
                <a href='editar.php?id={$row['id']}' class='btn btn-warning'>Editar</a>
                <a href='eliminar.php?id={$row['id']}' class='btn btn-danger' onclick=\"return confirm('segguro que deseas eliminar este registro?')\">Eliminar</a>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
    <a href="../index.php" class="volver">&larr; Volver al Inicio</a>

</body>
</html>

