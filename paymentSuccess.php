<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <title>paymentSuccess</title>

    <!-- CSS Offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/univstyle.css">
    <link rel="stylesheet" href="bootstrap/css/allmobileview.css">
</head>

<body>
    <?php session_start(); include "static/header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="p-3 mb-2 bg-light text-success text-center">
                    <h1>Belanjaanmu sedang kami proses</h1>
                    <img src="img/200.gif" alt="">
                </div>
            </div>
        </div>
    </div>


    <!-- CDN Offline -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(window).on('load', function() {
            $('.se-pre-con').fadeOut("slow");
        });
    </script>
</body>

</html>