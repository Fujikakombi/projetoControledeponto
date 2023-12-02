<?php
if (!empty($_SESSION["id"])) {
    header("location: index.php");
}
require 'config.php';
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $data_nasc = $_POST["data_nasc"];
    $email = $_POST["mail"];
    $pass = $_POST["pass"];
    $confirmpass = $_POST["confirmpass"];
    $duplicate = mysqli_query($connect, "SELECT * FROM tb_users WHERE username ='$username' OR e_mail='$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Username or E-Mail Already Taken')</script>";
    } else {
        if ($pass == $confirmpass) {
            $query = "INSERT INTO tb_users(username, password, nome, e_mail, data_nasc) VALUES ('$username','$pass','$name','$email','$data_nasc')";
            mysqli_query($connect, $query) or die(mysqli_error($connect));
            echo "<script> alert('Registration Successful')</script>";
        } else {
            echo "<script> alert('Password Does Not Match')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="regiscreen">
        <form action="" method="post" autocomplete="off">
            <h2>Registration</h2>
            <div class="input-box">
                <input type="text" name="Nome" placeholder="Nome" required>
            </div>

            <div class="input-box">
                <input type="text" name="username" placeholder="Usuário" required>
            </div>

            <div class="input-box">
                <input type="email" name="mail" placeholder="E-Mail" required>
            </div>

            <div class="input-box">
                <input type="date" name="data_nasc" value="<?php print $row->data_nasc; ?>" class="form-control">
            </div>


            <div class="input-box">
                <input type="password" name="pass" placeholder="Senha" required>
            </div>

            <div class="input-box">
                <input type="password" name="confirmpass" placeholder="Confirme sua senha" required>
            </div>

            <button type="submit" name="submit" class="btn">Registrar</button>
            <div class="login-link">
                <p>Já tenho uma conta <a href="login.php">Logar</a></p>
            </div>
        </form>
    </div>
</body>

</html>