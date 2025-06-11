<?php
include('../db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $res = $conn->query("SELECT * FROM tesistas WHERE id = $id");
    $tesista = $res->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE tesistas SET apellidos = ?, nombres = ?, dni = ?, escuela_profesional = ?, estado = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $_POST["apellidos"], $_POST["nombres"], $_POST["dni"], $_POST["escuela_profesional"], $_POST["estado"], $_POST["id"]);
    $stmt->execute();
    echo "<script>alert('Tesista actualizado correctamente'); window.location='listar.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tesista</title>
    <link rel="stylesheet" href="/GestionTesis/styles.css">
</head>
<body>
<div class="container">
    <h4>Editar Tesista</h4>
    <form method="post">
        <input type="hidden" name="id" value="<?= $tesista['id'] ?>">

        <label>Apellidos:</label>
        <input type="text" name="apellidos" value="<?= $tesista['apellidos'] ?>" required><br>

        <label>Nombres:</label>
        <input type="text" name="nombres" value="<?= $tesista['nombres'] ?>" required><br>

        <label>DNI:</label>
        <input type="text" name="dni" maxlength="8" value="<?= $tesista['dni'] ?>" required><br>

        <label>Escuela Profesional:</label>
        <select name="escuela_profesional">
            <option <?= $tesista['escuela_profesional'] == 'Ing de Sistemas' ? 'selected' : '' ?>>Ing de Sistemas</option>
            <option <?= $tesista['escuela_profesional'] == 'Ing Mecánica Eléctrica' ? 'selected' : '' ?>>Ing Mecánica Eléctrica</option>
            <option <?= $tesista['escuela_profesional'] == 'Ing Mecatrónica' ? 'selected' : '' ?>>Ing Mecatrónica</option>
            <option <?= $tesista['escuela_profesional'] == 'Ing Ciberseguridad' ? 'selected' : '' ?>>Ing Ciberseguridad</option>
        </select><br>

        <label>Estado:</label>
        <select name="estado">
            <option <?= $tesista['estado'] == 'Activo' ? 'selected' : '' ?>>Activo</option>
            <option <?= $tesista['estado'] == 'Inactivo' ? 'selected' : '' ?>>Inactivo</option>
        </select><br><br>

        <button type="submit" class="btn">Actualizar</button>
    </form>
</div>
</body>
</html>