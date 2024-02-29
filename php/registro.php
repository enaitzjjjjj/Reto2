<?php
session_start();

include('Conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar datos del formulario
    $usuario = validate($_POST['usuario']);
    $clave = validate($_POST['clave']);
    
    // Insertar el nuevo usuario en la base de datos
    try {
        $conexion = new CConexion();
        $conn = $conexion->ConexionBD();

        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, clave) VALUES (:usuario, :clave)");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':clave', $clave);
        $stmt->execute();

        // Redireccionar a la página de registro exitoso
        header("location: inicio.php");
        exit();
    } catch (PDOException $exp) {
        echo "Error: " . $exp->getMessage();
    }
}

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PeppoBytes - Registro</title>
    <link rel="stylesheet" type="text/css" href="../Styles/signUp.css">

</head>
<body>
<div class="form-box">
        <form class="form" action="../php/register.php">
            <span class="title">Sign Up</span>
            <span class="subtitle">Crea una cuenta gratuita en nuestra Web.</span>
            <div class="form-container">
                <input type="text" class="input" id="usuario" name="usuario" placeholder="Usuario" required><br>
                <input type="password" class="input" id="clave" name="clave" placeholder="Clave" required><br>
            </div>
            <button>Sign Up</button>
        </form>
        <div class="form-section">
          <p>Ya tienes una cuenta? <a href="./index.php">Log in</a> </p>
        </div>
    </div>
    <button id="back">
        <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
        <span><a href="../index.html">Back</a></span>
    </button>
</body>
</html>     