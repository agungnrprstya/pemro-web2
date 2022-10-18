<div class="content-wrapper">
    <section class="content">
        <?php foreach ($mahasiswa as $mhs) { ?>
            <!-- <form action="<?php echo base_url() . 'mahasiswa/update'; ?>" method="post"> -->
            <?php echo form_open_multipart('mahasiswa/update') ?>
            <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $mhs->id ?>">
                <input type="text" name="nama" class="form-control" value="<?php echo $mhs->nama ?>">
            </div>
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" value="<?php echo $mhs->nim ?>">
            </div>
            <div class=" form-group">
                <label>Tanggal Lahir</label>
                <input type="text" name="tgl_lahir" class="form-control datepicker" value="<?php echo $mhs->tgl_lahir ?>">
            </div>
            <div class=" form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control" value="<?php echo $mhs->jurusan ?>">
            </div>
            <div class=" form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $mhs->alamat ?>">
            </div>
            <div class=" form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $mhs->email ?>">
            </div>
            <div class=" form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_telp" class="form-control" value="<?php echo $mhs->no_telp ?>">
            </div>
            <div class="form-group">
                <label>Upload Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            <!-- </form> -->
            <?php echo form_close(); ?>
        <?php } ?>
</div>