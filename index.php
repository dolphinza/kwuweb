<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- CSS Online -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <!-- CSS Offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/univstyle.css">
    <link rel="stylesheet" href="bootstrap/css/allmobileview.css">
    <link rel="stylesheet" href="bootstrap/css/loader.css">

    <title>Puma Store</title>
</head>

<body>
<?php include "static/header.php"; ?>

    <!-- Bagian slider -->
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <!-- https://bit.ly/3gFm4v9 -->
                <img src="./img/slide 1.jpg" class="d-block w-100" style="height: 450px;" alt="...">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="./img/slide 1.jpg" class="d-block w-100" style="height: 450px;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/slide 1.jpg" class="d-block w-100" style="height: 450px;" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- main content -->
    <div class="container mt-3">

        <!-- card rekomendasi -->
        <h4>Paling banyak di cari</h4>
        
        <div class="row my-3">
            <?php for ($i=0; $i < 5 ; $i++) { ?>
                <!-- Card rekomendasi hanya ada 4 col -->
                <div class="col">
                    <div class="card mx-auto mt-3" style="width: 12rem;">
                        <a href="#" style="text-decoration: none;">
                            <?php include "produk.php"; ?>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
       
        <!-- more item -->
        <h4>produk-produk lainnya</h4>
        <div class="row">

            <!-- bagian List Produk more item -->
            <?php for($i = 0; $i < 20; $i++){ ?>
                <div class="col">
                    <div class="ulas card mx-auto mt-3" style="width: 12rem;">
                        <a href="viewProduct.php" style="text-decoration: none;">
                            <?php include "produk.php"; ?>
                        </a>
                    </div>
                </div>
        <?php }?>

        </div>

    </div>

    <!-- btn Lihat lainnya -->
    <div class="container mt-4 mb-4">
        <!-- style button pertama (pilih salah satu yang cocok-->
        <div class="mx-auto">
            <div class="show-more btn btn-outline-dark btn-lg btn-block pb-2 pt-2">Show more</div>
        </div>

        <!-- style button kedua (pilih salah satu yang cocok) -->
        <!-- <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col pt-5 pb-5"><a href="#" class="btn btn-outline-dark btn-lg btn-block pb-2 pt-2">Lihat lainnya</a></div>
            <div class="col"></div>
            <div class="col"></div>
        </div> -->
    </div>


    <?php include "static/footer.php"; ?>

    
    <!-- CDN Online -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <!-- CDN Offline -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
        //this will execute on page load(to be more specific when document ready event occurs)
        if ($('.ulas').length > 15) {
            $('.ulas:gt(14)').hide();
            $('.show-more').show();
        }

        $('.show-more').on('click', function () {
            //toggle elements with class .ty-compact-list that their index is bigger than 2
            $('.ulas:gt(14)').toggle();
            //change text of show more element just for demonstration purposes to this demo
            $(this).text() === 'Show more' ? $(this).text('Show less') : $(this).text('Show more');
        });
    </script>
    <script>
        $(window).on('load', function(){
            $('.se-pre-con').fadeOut("slow");
        });
    </script>


</body>

</html>