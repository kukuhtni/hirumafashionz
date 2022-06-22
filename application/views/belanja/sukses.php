<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="pos-relative">
            <div class="bgwhite">

                <h1><?php echo $title ?></h1>
                <div class="clearfix"></div>
                <br><br>

                <?php if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                } ?>

                <p class="alert alert-success">
                    Silahkan Cek Email Anda Dan Lakukan Pembayaran Anda Maksimal 1X24 Jam. Apabila Telah Dibayarkan Maka Barang Yang Sudah Anda Beli Akan Kami Proses</p>
            </div>


        </div>
</section>