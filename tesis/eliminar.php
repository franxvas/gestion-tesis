<?php
include('../db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("UPDATE tesis SET estado = 'Suspendido' WHERE id = $id");
}
header("location: listar.php");
?>