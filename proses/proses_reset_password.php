<?php
include"connect.php";
$id =(isset($_POST['id'])) ? htmlentities($_POST['id']) :"";
if (!empty($_POST['input_edit_validate'])){
    $query = mysqli_query($conn,"UPDATE tb_user SET password= md5 ('password') WHERE id='$id'") ;
    if ($query){
        $message = '<script>alert("Password berhasil direset");
        window.location="../user";</script>
        </script>';
   } else {
      $message = '<script>alert("password gagal direset")</script>';
    }
}
echo $message;
?>