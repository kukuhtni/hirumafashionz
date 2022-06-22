<style type="text/css">
    .table1 {
        font-family: sans-serif;
        color: #444;
        border-collapse: collapse;
        width: 120%;
        border: 1px solid #f2f5f7;
    }

    .table1 tr th {
        background: #35A9DB;
        color: #fff;
        font-weight: 50%;
    }

    .table1,
    th,
    td {
        padding: -10px 50px;
        text-align: left;
    }

    .table1 tr:hover {
        background-color: #f5f5f5;
    }

    .table1 tr:nth-child(even) {
        background-color: #f2f2f2;
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
                                <td> <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                            </tr>
                            <tr>
                                <td>Status Bayar</td>
                                <td> <?php echo $header_transaksi->status_bayar ?></td>
                            </tr>
                        <tbody>
                    </table>

                    <table class="table1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KODE PRODUK</th>
                                <th>NAMA PRODUK</th>
                                <th>JUMLAH PRODUK</th>
                                <th>HARGA PRODUK</th>
                                <th>SUB TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($transaksi as $transaksi) { ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $transaksi->kode_produk ?></td>
                                    <td><?php echo $transaksi->nama_produk ?></td>
                                    <td><?php echo number_format($transaksi->jumlah) ?></td>
                                    <td><?php echo number_format($transaksi->harga) ?></td>
                                    <td><?php echo number_format($transaksi->total_harga) ?></td>


                                </tr>
                                <?php $i++;
                            } ?>
                        <tbody>
                    </table>

                <?php
                    //Kalau gak ada tampilkan notif
                } else { ?>

                    <p class="alert alert-success">
                        <i class="fa fa-warning"></i> Belum ada data transaksi</p>
                    </p>
                <?php } ?>


            </div>
        </div>
</section>