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

                <p class="alert alert-success">Registrasi Telah Dilakukan <a href="<?php echo base_url('masuk') ?>" class="btn btn-info btn-sm">Login Disini</a>
                    .Anda juga bisa melakukan checkout <a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-warning btn-sm"><i class="fa fa-shopping-cart"></i>Checkout</a></p>
            </div>


        </div>
</section>