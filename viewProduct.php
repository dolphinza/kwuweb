<?php include "static/header.php" ?>

    <!-- main content viewProduct -->
    <div class="container">

        <!-- produk picture and mini description -->
        <div class="row mt-4">

            <!-- (bagian kiri) bagian gambar produk dan 3 versi mini gambar produk -->
            <div class="col">
                <img src="img/sepatu.jpg" class="img-thumbnail" alt="">

                <div class="container mt-2 mb-2">
                    <div class="row mr-2">
                        <div class="col">
                            <img class="img-thumbnail" src="img/sepatu.jpg" alt="" style="width: 120px; height: 80px;">
                        </div>
                        <div class="col">
                            <img class="img-thumbnail" src="img/sepatu.jpg" alt="" style="width: 120px; height: 80px;">
                        </div>
                        <div class="col">
                            <img class="img-thumbnail" src="img/sepatu.jpg" alt="" style="width: 120px; height: 80px;">
                        </div>
                    </div>
                </div>

                <!-- <ul>
                    <li class="img-thumbnail img-list "></li>
                    <li class="img-thumbnail img-list mr-2 mt-2 mb-2"><img src="img/sepatu.jpg" alt="" style="width: 120px; height: 80px;"></li>
                    <li class="img-thumbnail img-list mr-2 mt-2 mb-2"><img src="img/sepatu.jpg" alt="" style="width: 120px; height: 80px;"></li>
                </ul> -->
            </div>

            <!-- bagian kanan (judul produk, harga, discount, jumlah) -->
            <div class="col mt-5">

                <!-- bagian judul produk -->
                <h3 class="mt-4 product-title">Lorem Ipsum judul produk akan ditaruh disini</h3>
                <div class="line-space-price"></div>

                <!-- bagian Harga dan discount -->
                <div class="row mt-2">
                    <div class="col">
                        <h6 class="title-mini-product">Harga</h6>
                    </div>

                    <div class="col">

                        <!-- bagian yang menampilkan discount dan potongan harganya -->
                        <!-- bisa disembunyikan menggunakan style -->
                        <div class="row hidden title-discount">
                            <div class="discountbox">20%</div>
                            <del>100.xxx</del>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>

                        <!-- bagian harga barang -->
                        <div class="row">
                            <h3 class="text-success price">Rp. 400.xxx</h3>
                        </div>

                    </div>

                    <div class="col"></div> <!-- pemberi space di sisi kanan bagian harga -->
                </div>
                <div class="line-space-price"></div>

                <!-- bagian jumlah -->
                <div class="row mt-2">
                    <div class="col">
                        <h6 class="title-mini-product">Jumlah</h6>
                    </div>

                    <div class="col">
                        <p class="stok-null">stok habis</p>
                        <input type="number" name="" id="" placeholder="1" min="1" value="1">
                    </div>

                    <div class="col"></div> <!-- pemberi space di sisi kanan bagian harga -->
                </div>
                <div class="line-space-price"></div>

                <!-- bagian info produk -->
                <div class="row mt-2">
                    <div class="col">
                        <h6 class="title-mini-product">Info Produk</h6>
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: normal;">Berat</h6>
                                <h6>1kg</h6>
                            </div>
                            <div class="col">
                                <h6 style="font-weight: normal;">Asuransi</h6>
                                <h6>Ya</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col"></div> <!-- pemberi space di sisi kanan bagian harga -->
                </div>
                <div class="line-space-price"></div>

                <!-- bagian ukuran sepatu -->
                <div class="row mt-2">
                    <div class="col">
                        <h6 class="title-mini-product">ukuran</h6>
                    </div>

                    <!-- option for select length -->
                    <div class="col">
                        <select class="form-control" name="ukuran" id="ukuran">
                            <option selected>Pilih ukuran</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="5.5">5.5</option>
                            <option value="6">6</option>
                            <option value="6.5">6.5</option>
                            <option value="7">7</option>
                            <option value="7.5">7.5</option>

                        </select>
                    </div>

                    <div class="col"></div> <!-- pemberi space di sisi kanan bagian harga -->
                </div>

            </div>
        </div> 

        <!-- bagian deskripsi produk dan review konsumen-->
        <div class="row my-5 container">
            <!-- navigasi pengontrol pilihan (deskripsi atau ulasan) -->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-desc-tab" data-toggle="tab" href="#nav-desc" role="tab" aria-controls="nav-desc" aria-selected="true">Deskripsi</a>
                    <a class="nav-item nav-link" id="nav-review-tab" data-toggle="tab" href="#nav-review" role="tab" aria-controls="nav-review" aria-selected="false">Ulasan</a>
                </div>
            </nav>

            <!-- Isi dari navigasi deskripsi dan ulasan (review) -->
            <div class="tab-content" id="nav-tabContent">
                
                <!-- Isi deskripsi -->
                <div class="bg-light tab-pane fade show active p-4" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores, illum adipisci sunt facere quibusdam corrupti, beatae reprehenderit sapiente nobis non, 
                    perferendis laboriosam consequuntur quaerat explicabo? Obcaecati voluptas nam ex necessitatibus!
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores, illum adipisci sunt facere quibusdam corrupti, beatae reprehenderit sapiente nobis non, 
                    perferendis laboriosam consequuntur quaerat explicabo? Obcaecati voluptas nam ex necessitatibus!
                </div>
                
                <!-- isi ulasan (max 150 karakter untuk isi ulasan dan max ulasan yang ditampilkan 3 kolom) -->
                <div class="bg-light tab-pane fade p-4" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">

                    <!-- ulasan dari pengguna, terdapat nama, tanggal, isi ulasan -->
                    <div class="mt-2 p-3 bg-white">
                        <div class="container">
                            <div class="row">
                                <h6>Nama pengguna</h6>   
                            </div>
                            <div class="row"> 
                                <p>19/september/2020</p>
                            </div>
                            <div class="row">
                                <i>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                                    Praesentium unde cum eligendi quam nobis illum saepe. 
                                    Suscipit libero ab quaerat veniam ut nobis nostrum sapiente velit totam hic? Odit, culpa?
                                </i>
                            </div>
                            </div>
                    </div>
                    
                    <div class="row container mt-2">
                        <a href="#" class="btn" style="color: blue">Lihat lebih banyak ulasan</a>
                    </div>

                    <!-- Form membuat ulasan -->
                    <form action="">
                        <div class="row container">
                            <h6 class="ml-2 mt-5"><label for="exampleFormControlTextarea1">Masukan ulasan</label></h6>
                            <textarea class="form-control" id="ulasanInput" rows="3"></textarea>
                            <a href="#" class="btn btn-dark mt-3 ml-2">Kirim ulasan</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="row my-5 py-5"><i></i></div> <!-- Jarak antara desc/review dan Menu WBT  --> 
    </div>

    <!-- footer for wishlist, beli, and tambah trolly (Menu WBT)-->
    <div class="sub-foot pt-1 pb-2">
        <div class="container">
            <ul>
                <li class="ftright"><a class="btn btn-dark mr-1" href="#">Tambah Ke Trolly</a></li>
                <li class="ftright"><a class="btn mr-1 btn-beli" href="#"> Beli </a></li>
                <li class="ftright"><a class="btn mr-1 w-love" href="#"><i class="fa fa-heart" style="color: red;"
                            aria-hidden="true"></i></a></li>
                <!-- <li class="ftright"><a class="btn mr-2 w-love" href="#"><i class="fa fa-heart-o" style="color: red;" aria-hidden="true"></i></a></li> -->
                <li class="ftright mr-4">
                    <div class="row">
                        <div style="font-size: 12px">Harga</div>
                    </div>
                    <div class="row">
                        <h6 class="text-success" style="font-weight:bold;">Rp. 400.xxx</h6>
                    </div>
                </li>

            </ul>

        </div>
    </div>

    <?php include "static/footer.php"; ?>
</body>

</html>