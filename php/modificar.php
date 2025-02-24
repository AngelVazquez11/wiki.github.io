<!DOCTYPE html>
<html>
<head>
    <title>Modificar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgb(0, 153, 8);
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
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="checkbox"] {
            margin-bottom: 15px;
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
    <script>
        function buscarUsuario() {
            const buscarId = document.getElementById('buscar_id').value;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `buscar_usuario.php?id=${buscarId}`, true);
            xhr.onload = function () {
                if (this.status === 200) {
                    const usuario = JSON.parse(this.responseText);
                    if (usuario) {
                        document.getElementById('id').value = usuario.ID;
                        document.getElementById('nombre').value = usuario.Nombre;
                        document.getElementById('apellidoP').value = usuario.ApellidoP;
                        document.getElementById('apellidoM').value = usuario.ApellidoM;
                        document.getElementById('codigoPostal').value = usuario.CodigoPostal;
                        document.getElementById('beso').checked = usuario.Beso;
                        document.getElementById('sexo').value = usuario.Sexo;
                        document.getElementById('edad').value = usuario.Edad;
                    } else {
                        alert('Usuario no encontrado.');
                    }
                }
            }
            xhr.send();
        }
    </script>
</head>
<body>
    <div class="logo-container">
        <img src="../img/Logo_UPA.png" alt="Logo Universidad">
        <img src="../img/Logo_Educacion.jpg" alt="Logo Educación">
    </div>

    <form method="POST">
        <h2><img src="../img/Logo_UPA.png" alt="Logo Universidad">Modificar Usuario<img src="../img/Logo_Educacion.jpg" alt="Logo Educación"></h2>
        
        <!-- Campo para buscar usuario por ID -->
        <label for="buscar_id">Buscar ID:</label>
        <input type="text" id="buscar_id" required>
        <button type="button" onclick="buscarUsuario()">Buscar</button>
        
        <!-- Campos para modificar usuario -->
        <label for="id">ID Actual:</label>
        <input type="text" id="id" name="id" required readonly>
        <label for="nuevo_id">Nuevo ID:</label>
        <input type="text" id="nuevo_id" name="nuevo_id" required>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <label for="apellidoP">Apellido Paterno:</label>
        <input type="text" id="apellidoP" name="apellidoP">
        <label for="apellidoM">Apellido Materno:</label>
        <input type="text" id="apellidoM" name="apellidoM">
        <label for="codigoPostal">Código Postal:</label>
        <input type="text" id="codigoPostal" name="codigoPostal">
        <label for="beso">Beso:</label>
        <input type="checkbox" id="beso" name="beso">
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad">
        <button type="submit">Modificar</button>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conexion = new mysqli("sql101.byetcluster.com", "root", "", "if0_38382871_Saki_bd");
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            $id = $conexion->real_escape_string($_POST['id']);
            $nuevo_id = $conexion->real_escape_string($_POST['nuevo_id']);
            $nombre = $conexion->real_escape_string($_POST['nombre']);
            $apellidoP = $conexion->real_escape_string($_POST['apellidoP']);
            $apellidoM = $conexion->real_escape_string($_POST['apellidoM']);
            $codigoPostal = $conexion->real_escape_string($_POST['codigoPostal']);
            $beso = isset($_POST['beso']) ? 1 : 0;
            $sexo = $conexion->real_escape_string($_POST['sexo']);
            $edad = $conexion->real_escape_string($_POST['edad']);

            $query = "UPDATE Lista SET ID='$nuevo_id', Nombre='$nombre', ApellidoP='$apellidoP', ApellidoM='$apellidoM', CodigoPostal='$codigoPostal', Beso='$beso', Sexo='$sexo', Edad='$edad' WHERE ID='$id'";
            if ($conexion->query($query) === TRUE) {
                echo '<div class="message success">Usuario modificado con éxito.</div>';
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