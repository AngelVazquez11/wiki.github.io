<!DOCTYPE html>
<html>
<head>
    <title>Baja de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgba(176, 0, 161, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        .logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 500px;
            margin-bottom: 20px;
        }
        .logo-container img {
            width: 150px;
            height: auto;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h2 img {
            width: 70px;
            height: auto;
            margin: 0 15px;
        }
        label {
            display: block;
            margin: 15px 0 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #45a049;
        }
        .message {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .message.success {
            color: #4CAF50;
        }
        .message.error {
            color: #f44336;
        }
        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        .back-button:hover {
            background: #555;
        }
    </style>
</head>
<body>

<div class="logo-container">
    <img src="Logo_UPA.png" alt="Logo Universidad">
    <img src="Logo Educacion.jpg" alt="Logo Educación">
</div>

<form method="POST">
    <h2>Baja de Usuario</h2>
    <label for="id">ID:</label>
    <input type="text" name="id" required>
    <button type="submit">Eliminar</button>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conexion = new mysqli("localhost", "root", "", "Saki_bd");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $id = $conexion->real_escape_string($_POST['id']);
        
        $query = "DELETE FROM Lista WHERE ID='$id'";
        if ($conexion->query($query) === TRUE) {
            echo '<div class="message success">Usuario eliminado con éxito.</div>';
        } else {
            echo '<div class="message error">Error: ' . $conexion->error . '</div>';
        }

        $conexion->close();
    }
    ?>
</form>

<a href="contador.php" class="back-button">Volver a Contador</a>

</body>
</html>
