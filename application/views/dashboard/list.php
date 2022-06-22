<style type="text/css">
    .table1 {
        font-family: sans-serif;
        color: #444;
        border-collapse: collapse;
        width: 100%;
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
        padding: 10px 20px;
        text-align: center;
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


                <div class="alert alert-success">
                    <h1>Selamat Datang<i>&nbsp;<strong><?php echo $this->session->userdata('nama_pelanggan'); ?></strong></i></h1>
                </div>

                <?php
                //Kalau ada transaksi tampilkan tabelnya
                if ($header_transaksi) { ?>
                    <table class="table1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KODE TRANSAKSI</th>
                                <th>TANGGAL TRANSAKSI</th>
                                <th>JUMLAH TOTAL</th>
                                <th>JUMLAH ITEM</th>
                                <th>STATUS BAYAR</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($header_transaksi as $header_transaksi) { ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $header_transaksi->kode_transaksi ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                                    <td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                                    <td><?php echo $header_transaksi->total_item ?></td>
                                    <td><?php echo $header_transaksi->status_bayar ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url('dashboard/detail/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail </a>&nbsp;&nbsp;&nbsp;
                                            <a href="<?php echo base_url('dashboard/konfirmasi/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Konfirmasi Bayar </a>
                                        </div>
                                    </td>

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