<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan hasil pendaftaran baru</title>
</head>
<body>
    <?php
    $nama = $_GET["namabaru"]; /*This is the beginning of the registration, all input will be stored in $nama and $pass*/
    $pass = $_GET["passwordbaru"];
    if (isset($_GET["job"]) == "Dosen") { /*This condition is used to see what's user's profession*/
        $kerja = $_GET["job"];
    }
    else if (isset($_GET["job"]) == "Mahasiswa") {
        $kerja = $_GET["job"];
    }
    $conn=mysqli_connect ("localhost","root","") or die ("koneksi gagal"); 
    mysqli_select_db($conn, "postest");
    $sqlstr="INSERT INTO `login` (Username , Password, Pekerjaan) VALUE ('$nama','$pass','$kerja')"; /*This syntax will help you save all of user input into your database*/
    $hasil = mysqli_query($conn, $sqlstr);
    if ($hasil) {                       /*This conditon is a must when you're connecting your PHP with your database*/
        echo "Your data has been saved";/*It'll help you check does the storing in database works or not*/
    }
    else {
        mysqli_error($conn);
        echo "Error"; /*This message will appear if the proccess of storing failed*/
    }
    echo "<br>";
    echo "User berhasil terdaftar"; 
    ?>