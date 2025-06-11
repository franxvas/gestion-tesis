<?php include('../db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Tesis</title>
    <link rel="stylesheet" href="/GestionTesis/styles.css">
</head>
<body>
<div class="container">
    <h4>Registrar Tesis</h4>
    <form method="post">
        <label>Título:</label>
        <input type="text" name="titulo" required><br>

        <label>Línea de Investigación:</label>
        <select name="linea_investigacion">
            <option>Ing Software</option>
            <option>Redes</option>
            <option>Robótica e IA</option>
        </select><br>

        <label>Resumen:</label><br>
        <textarea name="resumen"></textarea><br>

        <label>Objetivos:</label><br>
        <textarea name="objetivos"></textarea><br>

        <label>Fecha Inicio:</label>
        <input type="date" name="fecha_inicio" required><br>

        <label>Fecha Fin:</label>
        <input type="date" name="fecha_fin" required><br>

        <label>Estado:</label>
        <select name="estado">
            <option>En curso</option>
            <option>Finalizado</option>
            <option>Suspendido</option>
        </select><br>

        <label>Tesista:</label>
        <select name="id_tesista">
            <?php
            $res = $conn->query("SELECT id, apellidos, nombres FROM tesistas");
            while ($row = $res->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['apellidos']} {$row['nombres']}</option>";
            }
            ?>
        </select><br><br>

        <button type="submit" class="btn">Registrar</button>
    </form>
</div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO tesis (titulo, linea_investigacion, resumen, objetivos, fecha_inicio, fecha_fin, estado, id_tesista)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $_POST["titulo"], $_POST["linea_investigacion"], $_POST["resumen"],
        $_POST["objetivos"], $_POST["fecha_inicio"], $_POST["fecha_fin"], $_POST["estado"], $_POST["id_tesista"]);
    $stmt->execute();
    echo "<script>alert('tesis registrada correctamente'); window.location='listar.php';</script>";
}
?>
