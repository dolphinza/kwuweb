<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/allmobileview.css">
    <link rel="stylesheet" href="bootstrap/css/index.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll > 60) {
                // $(".searc").addClass("scrollIn")
                $(".search").fadeOut(500);
            }
            if(scroll < 35){
                // $(".search").removeClass("scrollIn")
                $(".search").fadeIn(500);
            }
        });
    </script>
    <title>Favorite List</title>
    <style>
        .card-header{
            /* padding: 0px 10px 0px 0px; */
            background-color: transparent;
            border-bottom: transparent;
            margin: 0px;
        }
        .card-body{
            font-style: normal;
            color: black;
        }
        .img{
            width: 200px;
            height: 200px;
        }
        .harga{
            font-weight: bold;
        }
        .bintang{
            color: darkslategray;
        }
        .search.scrollIn{
            box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302), 0 2px 6px 2px rgba(60,64,67,0.149);
            border-bottom: 0;
        }
        .search{
            background: white;
            transition: transform cubic-bezier(0.4,0.0,0.2,1) 240ms;
            width: 100%;
            z-index: 50;
        }
        nav{
            display: block;
        }
    </style>
</head>
<body>
    <?php include "static/header.php"; ?> 
    <div class="container mt-3">
        <div class="jumbotron pt-3">
            <nav class="search">
                <input class="form-control mr-2 search-mobile-version" type="search" placeholder="Search" aria-label="Search">
            </nav>
			
			<?php for($i = 0; $i < 3; $i++){ ?>
            <div class="card mt-3">
                <!-- href disesuaikan linknya dengan card -->
                <a href="viewProduct.php" class="link" style="text-decoration: none;">
                    <div class="row">
                        <div class="card-header">
                            <img src="./img/sepatu.jpg" class="img img-fluid" alt="card">
                        </div>
                        <div class="card-body">
                            <h5>SHOES</h5>
                            <p class="harga">Rp.500.000</p>
                            <p class="bintang">✨✨✨✨✨ (10)</p>
                        </div>
                    </div>
                </a>
                <div class="card-footer">
                    <div class="row">
                        <div class="hapus pr-3">
                            <button class="btn btn-outline-danger">Hapus</button>
                        </div>
                        <div class="keranjang">
                            <button class="btn btn-outline-primary">Tambah Ke Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>
			<?php } ?>
			
        </div>
    </div>

    <?php include "static/footer.php"; ?>

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
</body>
</html>