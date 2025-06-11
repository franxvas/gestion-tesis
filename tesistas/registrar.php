<?php include('../db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Tesista</title>
    <link rel="stylesheet" href="/GestionTesis/styles.css">
</head>
<body>
<div class="container">
    <h4>Registrar Tesista</h4>
    <form method="post">
        <label>Apellidos:</label>
        <input type="text" name="apellidos" required><br>

        <label>Nombres:</label>
        <input type="text" name="nombres" required><br>

        <label>DNI:</label>
        <input type="text" name="dni" maxlength="8" required><br>

        <label>Escuela Profesional:</label>
        <select name="escuela_profesional">
            <option>Ing de Sistemas</option>
            <option>Ing Mecánica Eléctrica</option>
            <option>Ing Mecatrónica</option>
            <option>Ing Ciberseguridad</option>
        </select><br>

        <label>Estado:</label>
        <select name="estado">
            <option>Activo</option>
            <option>Inactivo</option>
        </select><br><br>

        <button type="submit" class="btn">Registrar</button>
    </form>
</div>
    <a href="../index.php" class="volver">&larr; Volver al Inicio</a>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO tesistas (apellidos, nombres, dni, escuela_profesional, estado)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $_POST["apellidos"], $_POST["nombres"], $_POST["dni"], $_POST["escuela_profesional"], $_POST["estado"]);
    $stmt->execute();
    echo "<script>alert('Tesista registrado correctamente'); window.location='listar.php';</script>";
}
?>
