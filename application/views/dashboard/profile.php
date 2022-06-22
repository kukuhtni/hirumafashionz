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
    input[type=text],
    input[type=password] {
        width: 50%;
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
        width: 20%;
        opacity: 0.9;
        position: relative;
        top: 10px;
        left: 190px;
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



                <?php
                //Notifikasi
                if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                }
                //Displlay Eror
                echo validation_errors('<div class="alert alert-warning">', '</div>');

                echo form_open(base_url('dashboard/profile'), 'class="leaave-comment"'); ?>

                <form action="/action_page.php">
                    <div class="container">
                        <label for="nama"><b>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                        <input type="text" placeholder="Tuliskan nama lengkap anda..." name="nama_pelanggan" value="<?php echo $pelanggan->nama_pelanggan ?>" required>
                        <br>
                        <label for="email"><b>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                        <input type="text" placeholder="Tuliskan email anda..." name="email" value="<?php echo $pelanggan->email ?>" readonly>
                        <br>
                        <label for="password"><b>Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                        <input type="password" placeholder="Tuliskan password baru anda..." name="password" value="<?php echo set_value('password') ?>">
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="text-danger">Ketik minimal 6 karakter untuk mengganti password baru atau biarkan kosong</span>
                        <br>
                        <br>
                        <label for="telephone"><b>Nomor Telephone/HP &nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                        <input type="text" placeholder="Tuliskan nomor telephone/hp anda..." name="telephone" value="<?php echo $pelanggan->telephone ?>" required>
                        <br>
                        <label for="alamat"><b>Alamat Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                        <input type='text' placeholder="Tuliskan alamat lengkap anda..." name="alamat" value="<?php echo $pelanggan->alamat ?>" required>
                        <br>
                        <button type="submit" class="registerbtn">UPDATE PROFIL</button>
                        <button type="reset" class="resetbtn">RESET</button>
                    </div>

                    <div class="container signin">
                        <p>Sudah memiliki akun? <a href="<?php echo base_url('masuk') ?>">Login disini</a>.</p>
                    </div>
                </form>
                <?php echo form_close(); ?>

            </div>
        </div>
</section>