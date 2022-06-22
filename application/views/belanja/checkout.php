<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: black;
    }

    * {
        box-sizing: border-box;
    }

    /* Add padding to containers */
    .container {
        padding: 16px;
        background-color: white;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .registerbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 48%;
        opacity: 0.9;
        float: right;
    }

    .registerbtn:hover {
        opacity: 1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        background-color: #f1f1f1;
        text-align: center;
    }

    .resetbtn {
        background-color: rgb(251, 140, 1);
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 48%;
        opacity: 0.9;

    }

    .resetbtn:hover {
        opacity: 1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        background-color: #f1f1f1;
        text-align: center;
    }
</style>

<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(http://localhost/hirumafashionz/assets/template/images/header-cart.jpg);">
    <h2 class="l-text2 t-center" style="width : bold;">
        <h1><?php echo $title ?>
    </h2>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">

                <?php if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                } ?>

                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1">GAMBAR</th>
                        <th class="column-2">PRODUK</th>
                        <th class="column-3">HARGA</th>
                        <th class="column-4 p-l-70">JUMLAH</th>
                        <th class="column-5" width="15%">SUB TOTAL</th>
                        <th class="column-6" width="20%">ACTION</th>
                    </tr>
                    <?php


                    //Looping Data Keranjang Belanja
                    foreach ($keranjang as $keranjang) {
                        //ambil data produk
                        $id_produk  = $keranjang['id'];
                        $produk     = $this->m_produk->detail($id_produk);
                        //Form Update Kerangjang
                        echo form_open(base_url('belanja/update_cart/' . $keranjang['rowid']));


                        ?>
                        <tr class="table-row">
                            <td class="column-1">
                                <div class="cart-img-product b-rad-4 o-f-hidden">
                                    <img src="<?php echo base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
                                </div>
                            </td>
                            <td class="column-2"><?php echo $keranjang['name'] ?></td>
                            <td class="column-3">IDR<?php echo number_format($keranjang['price'], '0', ',', '.') ?></td>
                            <td class="column-4">
                                <div class="flex-w bo5 of-hidden w-size17">
                                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                    </button>

                                    <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

                                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="column-5">IDR
                                <?php
                                $sub_total = $keranjang['price'] * $keranjang['qty'];
                                echo number_format($sub_total, '0', ',', '.');

                                ?>
                            </td>
                            <td>
                                <button type="submit" name="update" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i> Update
                                </button>
                                <a href="<?php echo base_url('belanja/hapus/' . $keranjang['rowid']) ?>" class="btn btn-danger btn-sm">
                                    <i class="fa fa-times"></i> Hapus
                                </a>

                            </td>
                        </tr>
                        <?php
                        //Echo form close
                        echo form_close();
                    } //End Looping


                    ?>
                    <tr class="table-row bg-warning text-strong" style="font-weight: bold; ">
                        <td colspan="4" class="column-1">TOTAL BELANJA</td>
                        <td colspan="2" class="column-2">IDR <?php echo number_format($this->cart->total(), '0', ',', '.') ?> </td>
                    </tr>


                </table>
                <!-- Button -->
                <br>
                <?php echo form_open(base_url('belanja/checkout'));
                $kode_transaksi = date('dmY') . strtoupper(random_string('alnum', 8));
                ?>
                <!-- <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>" -->

                <form action="/action_page.php">
                    <div class="container">
                        <!-- <center>
                            <h1><?php echo $title ?></h1>
                        </center>
                        <br> -->

                        <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
                        <input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>">
                        <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">

                        <label for=" nama"><b>Kode Transaksi</b></label>
                        <input type="text" name="kode_transaksi" value="<?php echo $kode_transaksi ?>" readonly required>

                        <label for="nama"><b>Nama Penerima</b></label>
                        <input type="text" placeholder="Tuliskan nama lengkap penerima..." name="nama_pelanggan" value="<?php echo $pelanggan->nama_pelanggan ?>" required>

                        <label for="email"><b>Email Penerima Barang</b></label>
                        <input type="text" placeholder="Tuliskan email penerima..." name="email" value="<?php echo $pelanggan->email ?>" required>

                        <label for="telephone"><b>Nomor Telephone/HP Penerima</b></label>
                        <input type="text" placeholder="Tuliskan nomor telephone/hp anda..." name="telephone" value="<?php echo $pelanggan->telephone ?>" required>

                        <label for="alamat"><b>Alamat Pengiriman</b></label>
                        <input type='text' placeholder="Tuliskan alamat pengiriman anda..." name="alamat" value="<?php echo $pelanggan->alamat ?>" required>
                        <button type="submit" class="registerbtn">CHECKOUT SEKARANG</button>
                        <button type="reset" class="resetbtn">RESET</button>
                    </div>

                    <!-- <div class="container signin">
                        <p>Sudah memiliki akun? <a href="<?php echo base_url('masuk') ?>">Login disini</a>.</p>
                    </div> -->
                </form>

                <?php echo form_close(); ?>


                <!-- <p class="pull-right">
                    <a href="<?php echo base_url('belanja/hapus') ?>" class="btn btn-danger btn-lg">
                        <i class="fa fa-trash-o"></i> Bersihkan Keranjang Belanja
                    </a>

                    <a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-success btn-lg">
                        <i class="fa fa-shopping-cart"></i> Checkout
                    </a>
                </p> -->
            </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">
            </div>

            <div class="size10 trans-0-4 m-t-10 m-b-10">

            </div>
        </div>

    </div>
</section>