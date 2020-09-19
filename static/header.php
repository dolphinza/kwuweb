<!doctype html>
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
    <div class="se-pre-con"></div>
    <!-- Bagian paling atas halaman website-->
    <topheader>
        <div class="navbar header">
            <div></div> <!-- Jangan dihapus -->
            <ul>
                <li class="float-right pc"><a href="#">customer care</a></li>
                <li class="float-right pc"><a href="#">tentang puma store</a></li>
                <!-- <li class="float-right mobile"><a href="#">signup</a></li>
                <li class="float-right mobile"><a href="#">Login</a></li> -->
                <li class="float-right mobile"><a href="#">Wishlist</a></li>
            </ul>
        </div>
    </topheader>

    <!-- Bagian navigasi utama -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Puma store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <input class="form-control mr-2 search-mobile-version" type="search" placeholder="Search" aria-label="Search">
            <!-- <button class="btn btn-outline-dark my-0 my-sm-0 mr-2" type="submit">Search</button> -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">

                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Wishlist 1</a>
                            <a class="dropdown-item" href="#">Wishlist 2</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Kosongkan keranjang</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class=" fa fa-ellipsis-v fa-lg mr-2" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-outline-dark mr-2 btn-sm" onclick="window.location.href = 'login.php'">Sign in</button>
            <button type="button" class="btn btn-dark btn-sm p1">Sign up</button>
        </div>
    </nav>