<?php
include_once("Conexion.php");
$usuarios = "SELECT * FROM usuarios"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Styles/login.css">
    <title>PeppoBytes - Login</title>
    <link rel="icon" href="../Images/favicon_pb.png" type="image/x-icon">
    <meta name="author" content="PeppoBytes Corporations">
    <meta name="description" content="Pagina Web oficial de PeppoBytes">
<body>
<form action="IniciarSesion.php" method="POST">      
    <div class="form-box">
        <div class="form">
            <span class="title">Login</span>
            <span class="subtitle">Inicia sesión con tu cuenta de correo electronico.</span>
            <div class="form-container">
                    <input type="text" class="input" name="Usuario" placeholder="Usuario" required>
                    <input type="text" class="input" name="Clave" placeholder="Clave" required>
            </div>
            <button type="submit">Sign up</button>
        </div>
        <div class="form-section">
            <p>No tienes una cuenta? <a href="./registro.php">Sign Up</a> </p>
        </div>
    </div>
</form>
        <button id="back">
            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
            <span><a href="../index.html">Back</a></span>
        </button>
</body>
</html>
