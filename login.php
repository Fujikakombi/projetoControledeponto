<?php
if (!empty($_SESSION["id"])) {
    header("location: index.php");
}
require 'config.php';
if (isset($_POST["submit"])) {
    $userormail = $_POST["userormail"];
    $pass = $_POST["pass"];
    $result = mysqli_query($connect, "SELECT * FROM tb_users WHERE username = '$userormail' OR e_mail = '$userormail'");

if ($result) {
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($pass == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
            exit; 
        } else {
            echo "<script> alert('Senha incorreta')</script>";
        }
    } else {
        echo "<script> alert('Nome de usuário não registrado')</script>";
    }
} else {
    echo "Erro na consulta: " . mysqli_error($connect);
}


mysqli_close($connect);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    
    <div class="wrapper">
        <form class="" action="" method="post" autocomplete="off">
            <h1>LogIn</h1>
            <div class="input-box">
                <input type="text" name="userormail" id="userormail" placeholder="Usuário" required value="">
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="pass" id="pass" placeholder="Senha" required value="">
                <i class='bx bxs-lock-alt' ></i>
            </div>
            
            <div class="remember-forgot">
                <label"> <input type="checkbox">Lembrar me <a href="#">Esqueceu sua Senha? </a></label>
            </div>
            
            <button type="submit" name="submit" class="btn">Entrar</button>

            <div class="register-link">
            <p>Não tenho uma conta <a href="registration.php">Registrar</a></p>
            </div>

    </form>
        
    </div>

</body>

</html>