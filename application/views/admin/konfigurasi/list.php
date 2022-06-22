<?php

//Notifikasi
if ($this->session->flashdata('sukses')) {

    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>

<?php
//Error Upload
if (isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}
//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form Open
echo form_open_multipart(base_url('admin/konfigurasi'), ' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
    <label class="col-md-3 control-label">Nama Website</label>

    <div class="col-md-8">
        <input type="text" name="namaweb" class="form-control" placeholder="Tulis nama website..." value="<?php echo $konfigurasi->namaweb ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Tagline/Moto</label>
    <div class="col-md-8">
        <input type="text" name="tagline" class="form-control" placeholder="Tulis tagline/moto..." value="<?php echo $konfigurasi->tagline ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Email</label>
    <div class="col-md-8">
        <input type="email" name="email" class="form-control" placeholder="Tulis email..." value="<?php echo $konfigurasi->email ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Website</label>
    <div class="col-md-8">
        <input type="text" name="website" class="form-control" placeholder="Tulis website..." value="<?php echo $konfigurasi->website ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Alamat Facebook</label>
    <div class="col-md-8">
        <input type="text" name="facebook" class="form-control" placeholder="Tulis alamat facebook..." value="<?php echo $konfigurasi->facebook ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Alamat Instagram</label>
    <div class="col-md-8">
        <input type="text" name="instagram" class="form-control" placeholder="Tulis alamat instagram..." value="<?php echo $konfigurasi->instagram ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Nomor Telephone/HP</label>
    <div class="col-md-8">
        <input type="text" name="telephone" class="form-control" placeholder="Tulis nomor telephone/hp..." value="<?php echo $konfigurasi->telephone ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Alamat Kantor</label>
    <div class="col-md-9">
        <textarea name="alamat" class="form-control" placeholder="Tulis alamat kantor..."><?php echo $konfigurasi->alamat ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Keyword (Untuk SEO Google)</label>
    <div class="col-md-9">
        <textarea name="keyword" class="form-control" placeholder="Tulis Keyword (Untuk SEO Google)..."><?php echo $konfigurasi->keyword ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Metatext</label>
    <div class="col-md-9">
        <textarea name="metatext" class="form-control" placeholder="Tulis Metatext..."><?php echo $konfigurasi->metatext ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Deskripsi Website</label>
    <div class="col-md-9">
        <textarea name="deskripsi" class="form-control" placeholder="Tulis deskripsi website..."><?php echo $konfigurasi->deskripsi ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Nomor Rekening Pembayaran</label>
    <div class="col-md-9">
        <textarea name="rek_pembayaran" class="form-control" placeholder="Tulis nomor rekening pembayaran..."><?php echo $konfigurasi->rek_pembayaran ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" type="submit" name="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
        <button class="btn btn-info btn-lg" type="reset" name="reset">
            <i class="fa fa-times"></i> Reset
        </button>
    </div>
</div>



<?php echo form_close(); ?>