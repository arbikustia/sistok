<?php
include 'koneksi.php';
if(isset($_POST['btnLogin'])){
    
$username=$_POST['username'];
$password=$_POST['password'];

$query = mysqli_query($kon, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_array($query);

session_start();
if(mysqli_num_rows($query)>= 1) {
    if ($data['password']){
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];
        $_SESSION['id'] = $data['id'];
        $query = mysqli_query($kon, "INSERT INTO log_login (username) VALUES ('$username')");
        header('location:index.php');
}else{
    header('location:login.php?pesan=Password anda salah');
}
}else{
    header('location:login.php?pesan=Username yang anda masukan salah!');
}
}
?>
