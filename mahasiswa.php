<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <!--Result of mahasiswa.php page-->
    <p><b>Ini adalah halaman mahasiswa</b></p>
    <?php
    session_start();
    if (!isset ($_SESSION['user'])) {
        header('Location:tampilanlogin.html'); /*This function helps you if the condition doesn't meet the requirement, it will be move to the login page*/
        exit;
    }
    else {
        echo "Pekerjaan : ".$_SESSION['kerja']; /*This is where you start using $_SESSION to echo the results*/
        echo "<br>";
        echo "Login anda : ".$_SESSION['user']; /*The value of these variable is depend on loginutama.php*/
        echo "<br>";
        echo "Ini adalah halaman utama";
        echo "<br>";
    }
    echo "<a href='tampilanlogin.html'>Logout</a>"; /*If use press this button, they'll be move to tampilanlogin.html*/
    session_destroy();
    ?>
</body>
</html>