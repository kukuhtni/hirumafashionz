<?php
//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form Open
echo form_open(base_url('admin/kategori/edit/' . $kategori->id_kategori), ' class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Kategori</label>

    <div class="col-md-5">
        <input type="text" name="nama_kategori" class="form-control" placeholder="Tulis nama kategori..." value="<?php echo $kategori->nama_kategori ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Urutan</label>
    <div class="col-md-5">
        <input type="number" name="urutan" class="form-control" placeholder="Tulis urutan kategori..." value="<?php echo $kategori->urutan ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label"></label>
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