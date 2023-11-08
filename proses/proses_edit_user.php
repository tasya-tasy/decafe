<?php 
include "connect.php";
$id = (isset ($_POST['nama'])) ? htmlentities($_POST['id']) :"";
$username = (isset( $_POST["username"])) ? htmlentities($_POST["username"]) :"";
$level = (isset($_POST["level"])) ? htmlentities($_POST["level"]) :"";
$nohp = (isset($_POST["nohp"])) ? htmlentities($_POST["nohp"]) :"";
$alamat = (isset($_POST["alamat"])) ? htmlentities($_POST["alamat"]) :"";
$password = md5('password');

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "UPDATE tb_user SET nama='$name', username='$username', level='$level', nohp='$nohp',alamat='$alamat' WHERE id='$id'");
    if($query){
        $message = '<script>alert("data gagal diupdate")</script>';
    } else{
        $message = '<script>alert("data berhasil diupdate ");
                    window.location="../user"</script>
                    </script>';
    }
}echo $message;
?>