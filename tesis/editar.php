<?php
include('../db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $res = $conn->query("SELECT * FROM tesis WHERE id = $id");
    $tesis = $res->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE tesis SET titulo = ?, linea_investigacion = ?, resumen = ?, objetivos = ?, fecha_inicio = ?, fecha_fin = ?, estado = ?, id_tesista = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssii", $_POST["titulo"], $_POST["linea_investigacion"], $_POST["resumen"], $_POST["objetivos"], $_POST["fecha_inicio"], $_POST["fecha_fin"], $_POST["estado"], $_POST["id_tesista"], $_POST["id"]);
    $stmt->execute();
    echo "<script>alert('Tesis actualizada correctamente'); window.location='listar.php';</script>";
}

$tesistas = $conn->query("SELECT id, apellidos, nombres FROM tesistas");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tesis</title>
    <link rel="stylesheet" href="/GestionTesis/styles.css">
</head>
<body>
<div class="container">
    <h4>Editar Tesis</h4>
    <form method="post">
        <input type="hidden" name="id" value="<?= $tesis['id'] ?>">

        <label>Título:</label>
        <input type="text" name="titulo" value="<?= $tesis['titulo'] ?>" required><br>

        <label>Línea de Investigación:</label>
        <select name="linea_investigacion">
            <option <?= $tesis['linea_investigacion'] == 'Ing Software' ? 'selected' : '' ?>>Ing Software</option>
            <option <?= $tesis['linea_investigacion'] == 'Redes' ? 'selected' : '' ?>>Redes</option>
            <option <?= $tesis['linea_investigacion'] == 'Robótica e IA' ? 'selected' : '' ?>>Robótica e IA</option>
            <option <?= $tesis['linea_investigacion'] == 'Gestion de TI' ? 'selected' : '' ?>>Gestion de TI</option>
            <option <?= $tesis['linea_investigacion'] == 'Seguridad Informática' ? 'selected' : '' ?>>Seguridad Informática</option>
        </select><br>

        <label>Resumen:</label><br>
        <textarea name="resumen"><?= $tesis['resumen'] ?></textarea><br>

        <label>Objetivos:</label><br>
        <textarea name="objetivos"><?= $tesis['objetivos'] ?></textarea><br>

        <label>Fecha Inicio:</label>
        <input type="date" name="fecha_inicio" value="<?= $tesis['fecha_inicio'] ?>" required><br>

        <label>Fecha Fin:</label>
        <input type="date" name="fecha_fin" value="<?= $tesis['fecha_fin'] ?>" required><br>

        <label>Estado:</label>
        <select name="estado">
            <option <?= $tesis['estado'] == 'En curso' ? 'selected' : '' ?>>En curso</option>
            <option <?= $tesis['estado'] == 'Finalizado' ? 'selected' : '' ?>>Finalizado</option>
            <option <?= $tesis['estado'] == 'Suspendido' ? 'selected' : '' ?>>Suspendido</option>
        </select><br>

        <label>Tesista:</label>
        <select name="id_tesista">
            <?php while ($t = $tesistas->fetch_assoc()) { ?>
                <option value="<?= $t['id'] ?>" <?= $t['id'] == $tesis['id_tesista'] ? 'selected' : '' ?>>
                    <?= $t['apellidos'] . ' ' . $t['nombres'] ?>
                </option>
            <?php } ?>
        </select><br><br>

        <button type="submit" class="btn">Actualizar</button>
    </form>
</div>
<a href="../index.php" class="volver">&larr; Volver al Inicio</a>

</body>
</html>
