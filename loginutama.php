<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <!--This is the main purpose of the problem-->
    <?php
    $name = $_GET["username"]; /*All of user input will be stored in $name and $pass*/
    $pass = $_GET["sandi"];
    $conn=mysqli_connect ("localhost","root","") or die ("koneksi gagal"); 
    mysqli_select_db($conn, "postest");
    if ($_GET["job"] == "Dosen") { /*The session_start() begins here because we need to check which profession is choosen*/
        session_start();
        $kerja = $_GET["job"];
        $_SESSION['kerja'] = $kerja; /*This will create a new variable of $kerja which it will be used on page dosen.php*/
        $query = "SELECT * FROM `login` WHERE Pekerjaan='$kerja' AND Password='$pass'"; /*This syntax will search data in your database based on user input*/
        $hasil = mysqli_query($conn, $query);
        if (mysqli_num_rows($hasil) == 1) { 
            header('Location:dosen.php'); /*If the syntax found a match, it will move user to page dosen.php*/
            $_SESSION['user'] = $name; /*This will create a new variable of $name which it will be used on page dosen.php also*/
            exit;
        }
        else {
            session_destroy();
        }
    }
    else if ($_GET["job"] == "Mahasiswa") { /*This is the second condition*/
        session_start();
        $kerja = $_GET["job"];
        $_SESSION['kerja'] = $kerja;
        $query = "SELECT * FROM `login` WHERE Pekerjaan='$kerja' AND Password='$pass'";
        $hasil = mysqli_query($conn, $query);
        if (mysqli_num_rows($hasil) == 1) { 
            header('Location:mahasiswa.php'); /*If the syntax found amatch, it will move user to page mahasiswa.php*/
            $_SESSION['user'] = $name; /*This will create a new variable of $name which it will be used in mahasiswa.php*/
            exit;
        }
        else {
            session_destroy();
        }
    }
    ?>
</body>
</html>