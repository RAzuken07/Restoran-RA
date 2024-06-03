<?php
    //session_start();
    if(empty($_SESSION['username_restoran'])){
        header('location:login');
    }

    include "proses/connect.php";
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_restoran]'");
    $hasil = mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!--header-->
<?php include "header.php" ?>
    <!--header end-->
    <div class="container-lg">
        <div class="row">
            <!--sidebar-->
            <?php include "sidebar.php";
          
             ?>
            <!--sidebar end-->
            <!--content-->
            <?php
                include $page;
            ?>
        <!--content end-->
    </div>
    <div class="fixed-bottom text-center  bg-gray bg-light py-2"> 
        copyright 2024 Razuken
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>