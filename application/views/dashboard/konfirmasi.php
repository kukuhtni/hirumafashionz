<meta name="viewport" content="width=device-width, initial-scale=1">
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
    select,
    input[type=file],
    input[type=text],
    input[type=password] {
        width: 75%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    select:focus,
    input[type=file]:focus,
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
        width: 20%;
        opacity: 0.9;
        position: relative;
        top: 10px;
        left: 250px;
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
        width: 20%;
        opacity: 0.9;
        position: relative;
        top: 10px;
        left: 270px;

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
<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <?php include('menu.php') ?>

                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

                <!-- Product -->


                <h1><?php echo $title ?></h1>
                <hr>


                <p>Berikut adalah detail riwayat belanja anda :</p>
                <?php
                //Kalau ada transaksi tampilkan tabelnya
                if ($header_transaksi) { ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="20%">KODE PRODUK</th>
                                <th> <?php echo $header_transaksi->kode_transaksi ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tanggal Transaksi</td>
                                <td> <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Total</td>
                                <td> IDR <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                            </tr>
                            <tr>
                                <td>Status Bayar</td>
                                <td> <?php echo $header_transaksi->status_bayar ?></td>
                            </tr>
                            <tr>
                                <td>Bukti Bayar</td>
                                <td> <?php if ($header_transaksi->bukti_bayar != "") { ?><img src="<?php echo base_url('assets/upload/image/' . $header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200">
                                    <?php } else {
                                        echo 'Belum ada bukti bayar';
                                    } ?>
                                </td>
                            </tr>
                        <tbody>
                    </table>

                    <?php
                    //Error Upload
                    if (isset($error)) {
                        echo '<p class="alert alert-warning">' . $error . '</p>';
                    }

                    //Notif Error
                    echo validation_errors('<p class="alert alert-warning">', '</p>');

                    //Form Open
                    echo form_open_multipart(base_url('dashboard/konfirmasi/' . $header_transaksi->kode_transaksi));

                    ?>

                    <form action="/action_page.php">
                        <div class="container">
                            <label for="nama"><b>Pembayaran Ke Rekening &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                            <select name="id_rekening" class="form-control">
                                <?php foreach ($rekening as $rekening) { ?>
                                    <option value="<?php echo $rekening->id_rekening ?>" <?php if ($header_transaksi->id_rekening == $rekening->id_rekening) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                        <?php echo $rekening->nama_bank ?> (No. Rekening:
                                        <?php echo $rekening->nomor_rekening ?> a.n <?php echo $rekening->nama_pemilik ?>
                                        )
                                    </option>
                                <?php } ?>
                            </select>
                            <label><b>Tanggal Bayar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                            <input type="text" name="tanggal_bayar" class="form-conrtol-lg" placeholder="dd-mm-yyyy" value="<?php if (isset($_POST['tanggal_bayar'])) {
                                                                                                                                echo set_value('tanggal_bayar');
                                                                                                                            } elseif ($header_transaksi->tanggal_bayar != "") {
                                                                                                                                echo $header_transaksi->tanggal_bayar;
                                                                                                                            } else {
                                                                                                                                echo date('d-m-Y');
                                                                                                                            } ?>"></td>
                            <br>
                            <label for="password"><b>Jumlah Pembayaran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                            <input type="number" name="jumlah_bayar" class="form-conrtol-lg" placeholder="Jumlah pembayaran anda" value="<?php if (isset($_POST['jumlah_bayar'])) {
                                                                                                                                                echo set_value('jumlah_bayar');
                                                                                                                                            } elseif ($header_transaksi->jumlah_bayar != "") {
                                                                                                                                                echo $header_transaksi->jumlah_bayar;
                                                                                                                                            } else {
                                                                                                                                                echo $header_transaksi->jumlah_transaksi;
                                                                                                                                            } ?>"></td>
                            <br>
                            <label><b>Dari Bank &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                            <input type="text" name="nama_bank" class="form-control" value="<?php echo $header_transaksi->nama_bank ?>" placeholder="Nama bank yang anda gunakan ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                            <small>Misal: BANK BCA</small>
                            <br>
                            <br>
                            <label><b>Dari Nomor Rekening &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                            <input type="text" name="rek_pembayaran" class="form-control" value="<?php echo $header_transaksi->rek_pembayaran ?>" placeholder="Nomor rekening pembayaran anda">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                            <small>Misal: 541514841851</small>
                            <br>
                            <br>
                            <label><b>Nama Pemilik Rekening &nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                            <input type="text" name="rek_pelanggan" class="form-control" value="<?php echo $header_transaksi->rek_pelanggan ?>" placeholder="Nama pemilik rekening">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                            <small>Misal: Kukuh </small>
                            <br>
                            <br>
                            <label><b>Upload Bukti Bayar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                            <input type="file" name="bukti_bayar" class="form-control" placeholder="Bukti pembayaran anda">
                            <br>
                            <button type="submit" class="registerbtn">SUBMIT</button>
                            <button type="reset" class="resetbtn">RESET</button>
                        </div>
                    </form>

                    <?php

                    //Form Close
                    echo form_close();

                    //Kalau gak ada tampilkan notif
                } else { ?>

                    <p class="alert alert-success">
                        <i class="fa fa-warning"></i> Belum ada data transaksi</p>
                    </p>
                <?php } ?>


            </div>
        </div>
</section>