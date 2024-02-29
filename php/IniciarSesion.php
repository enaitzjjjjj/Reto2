<?php
session_start();

include('Conexion.php');

if (isset($_POST['usuario']) && isset($_POST['clave'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $usuario = validate($_POST['usuario']);
    $clave = validate($_POST['clave']);

    if (empty($usuario)) {
        header("location: index.php?error=El usuario es requerido");
        exit();
    } elseif (empty($clave)) {
        header("location: index.php?error=La clave es requerida");
        exit();
    } else {

        try {
            $conexion = new CConexion();
            $conn = $conexion->ConexionBD();

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND clave = :clave");

$stmt->bindValue(':usuario', $usuario);
$stmt->bindValue(':clave', $clave);
$stmt->execute();



            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['Nombre'] = $row['Nombre'];
                $_SESSION['id'] = $row['id'];
                header("location: inicio.php");
                exit();
            } else {
                header("Location: index.php?error=El usuario o la clave son incorrectas");
                exit();
            }
        } catch (PDOException $exp) {
            echo "Error: " . $exp->getMessage();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>