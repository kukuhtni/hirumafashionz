<style type="text/css">
    .table1 {
        font-family: sans-serif;
        color: #444;
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #f2f5f7;
    }

    .table1 tr th {
        background: #FF4500;
        color: #fff;
        font-weight: 50%;
    }

    .table1,
    th,
    td {
        padding: 10px 20px;
        text-align: left;
    }

    .table1 tr:hover {
        background-color: #f5f5f5;
    }

    .table1 tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
<table class="table1">
    <thead>
        <tr>
            <th>NO</th>
            <th width="220">NAMA PELANGGAN</th>
            <th width="180">KODE TRANSAKSI</th>
            <th>TANGGAL TRANSAKSI</th>
            <th width="180">JUMLAH TOTAL</th>
            <th width="180">JUMLAH ITEM</th>
            <th width="180">STATUS BAYAR</th>
            <th width="400">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($header_transaksi as $header_transaksi) { ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $header_transaksi->nama_pelanggan ?>
                    <br>
                    <small>
                        No. Telephone/HP : <?php echo $header_transaksi->telephone ?>
                        <br>Email : <?php echo $header_transaksi->email ?>
                        <br>Alamat Kirim: <br><?php echo nl2br($header_transaksi->alamat) ?>
                    </small>
                </td>
                <td><?php echo $header_transaksi->kode_transaksi ?></td>
                <td><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                <td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                <td><?php echo $header_transaksi->total_item ?></td>
                <td><?php echo $header_transaksi->status_bayar ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?php echo base_url('admin/transaksi/detail/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail </a>
                        <a href="<?php echo base_url('admin/transaksi/cetak/' . $header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Cetak </a>
                        <!-- <a href="<?php echo base_url('admin/transaksi/status/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Update Status </a> -->
                    </div>

                    <div class="clearfix"> </div>
                    <br>

                    <div class="btn-group">
                        <a href="<?php echo base_url('admin/transaksi/pdf/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Unduh PDF </a>
                        <a href="<?php echo base_url('admin/transaksi/kirim/' . $header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Pengiriman </a>
                    </div>
                </td>

            </tr>
            <?php $i++;
        } ?>
    <tbody>
</table>