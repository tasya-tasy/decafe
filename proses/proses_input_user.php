<?php 
include "connect.php";
$name = (isset ($_POST['nama'])) ? htmlentities($_POST['nama']) :"";
$username = (isset( $_POST["username"])) ? htmlentities($_POST["username"]) :"";
$level = (isset($_POST["level"])) ? htmlentities($_POST["level"]) :"";
$nohp = (isset($_POST["nohp"])) ? htmlentities($_POST["nohp"]) :"";
$alamat = (isset($_POST["alamat"])) ? htmlentities($_POST["alamat"]) :"";
$password = md5('password');

if (!empty($_POST['input_user_validate'])) {
    $select = mysqli_query($conn, "INSERT INTO tb_user(nama,username,level,nohp,alamat,password) values ('$name','$level','$nohp','$alamat','$password')");
    if($query){
        $message = '<script>alert("data gagal dimasukkan")</script>';
    } else{
        $message = '<script>alert("data berhasil dimasukkan ");
                    window.location="../user"</script>
                    </script>';
    }
}echo $message;
?>