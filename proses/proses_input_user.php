<?php
include "connect.php";
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : '';
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : '';
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : '';
$password = md5('password');

if (!empty($_POST['input_user_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("username yg di masukkan sudah ada");
        window.location="../User"</script>
        </script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_user (nama,username,level,password) VALUES ('$name','$username','$level','$password')");
        if (!$query) {
            $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../User"</script>
        </script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan")</script>';
        }
    }
}
echo $message;
?>