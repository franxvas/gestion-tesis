<?php include('../db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tesistas</title>
    <link rel="stylesheet" href="/GestionTesis/styles.css">
</head>
<body>
<div class="container">
    <h4>Lista de Tesistas</h4>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>DNI</th>
                <th>Escuela</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $res = $conn->query("SELECT * FROM tesistas");
        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['apellidos']}</td>
                <td>{$row['nombres']}</td>
                <td>{$row['dni']}</td>
                <td>{$row['escuela_profesional']}</td>
                <td>{$row['estado']}</td>
                <td><a href='editar.php?id={$row['id']}' class='btn btn-warning'>Editar</a></td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
    <a href="../index.php" class="volver">&larr; Volver al Inicio</a>
</body>
</html>
