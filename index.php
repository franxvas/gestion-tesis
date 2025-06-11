<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Tesis</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .menu {
            max-width: 500px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .menu h1 {
            margin-bottom: 20px;
        }
        .menu ul {
            list-style: none;
            padding: 0;
        }
        .menu li {
            margin: 10px 0;
        }
        .menu a {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .menu a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="menu">
        <h1>Gestión de Tesis</h1>
        <ul>
            <li><a href="tesistas/registrar.php">Registrar Tesista</a></li>
            <li><a href="tesistas/listar.php">Listar Tesistas</a></li>
            <li><a href="tesis/registrar.php">Registrar Tesis</a></li>
            <li><a href="tesis/listar.php">Listar Tesis</a></li>
        </ul>
    </div>
</body>
</html>
