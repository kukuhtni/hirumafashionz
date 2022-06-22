<?php
//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form Open
echo form_open(base_url('admin/user/tambah'), ' class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Lengkap</label>

    <div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="Tulis nama lengkap..." value="<?php echo set_value('nama') ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Email</label>
    <div class="col-md-5">
        <input type="email" name="email" class="form-control" placeholder="Tulis alamat email..." value="<?php echo set_value('email') ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Username</label>
    <div class="col-md-5">
        <input type="text" name="username" class="form-control" placeholder="Tulis username..." value="<?php echo set_value('username') ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Password</label>
    <div class="col-md-5">
        <input type="password" name="password" class="form-control" placeholder="Tulis password..." value="<?php echo set_value('password') ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Level Hak Akses</label>
    <div class="col-md-5">
        <select name="akses_level" class="form-control">
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>
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