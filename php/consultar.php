<!DOCTYPE html>
<html>
<head>
    <title>Consultar Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgb(1, 131, 171);
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
        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 800px;
            overflow-x: auto;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
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
    <div class="container">
        <h2><img src="../img/Logo_UPA.png" alt="Logo Universidad">Consultar Usuarios<img src="../img/Logo_Educacion.jpg" alt="Logo Educación"></h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Código Postal</th>
                <th>Beso</th>
                <th>Sexo</th>
                <th>Edad</th>
            </tr>

            <?php
            $conexion = new mysqli("sql101.byetcluster.com", "root", "", "if0_38382871_Saki_bd");
            $query = "SELECT * FROM Lista";
            $result = $conexion->query($query);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['ID'] . "</td>
                            <td>" . $row['Nombre'] . "</td>
                            <td>" . $row['ApellidoP'] . "</td>
                            <td>" . $row['ApellidoM'] . "</td>
                            <td>" . $row['CodigoPostal'] . "</td>
                            <td>" . ($row['Beso'] ? 'Sí' : 'No') . "</td>
                            <td>" . $row['Sexo'] . "</td>
                            <td>" . $row['Edad'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay usuarios registrados</td></tr>";
            }
            ?>
        </table>
    </div>

    <a href="contador.php" class="back-button">Volver a Contador</a>
</body>
</html>