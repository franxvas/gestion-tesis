<?php
include('../db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("UPDATE tesistas SET estado = 'Inactivo' WHERE id = $id");
}
header("location: listar.php");
?>