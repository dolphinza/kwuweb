
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
                <li class="float-right mobile"><a href="wishlist.php">Wishlist</a></li>
            </ul>
        </div>
    </topheader>

    <!-- Bagian navigasi utama -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="60" height="40"></a>
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
                            <a class="dropdown-item" href="wishlist.php">Wishlist</a>
                            <a class="dropdown-item" href="#">Trolly</a>
                            <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Kosongkan keranjang</a> -->
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
            <button type="button" class="btn btn-dark mr-2 btn-md" onclick="window.location.href = 'login.php'">Login</button>
        </div>
    </nav>
