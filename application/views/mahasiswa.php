<div class="content-wrapper">
    <section class="content">
        <h1>Data Mahasiswa
            <!-- <small>Control Panel</small> -->
        </h1>
        <?php echo $this->session->flashdata('message'); ?>
        <?php
        // $batas = 5;
        // $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        // $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : ;
        // $previous = $halaman - 1;
        // $next = $halaman + 1;
        // $data = mysqli_query($koneksi, "select * from tb_mahasiswa LIMIT, $halaman_awal, $batas");
        // $no = $halaman_awal+1;
        ?>
        <nav class="navbar navbar-default">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data Mahasiswa </button>
            <a class="btn btn-danger" href="<?php echo base_url('mahasiswa/print') ?>"><i class="fa fa-print"> Print </i></a>
            <div class="dropdown d-inline">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i fa fa-download> Export</i>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?php echo base_url('mahasiswa/pdf1') ?>">PDF</a></li>
                    <li><a href="<?php echo base_url('mahasiswa/exportExcel') ?>">EXCEL</a></li>
                </ul>
            </div>
            <!-- <div>
                <a class="btn btn-info" href="<?php echo base_url('mahasiswa/tampil_grafik') ?>"><i class="fa fa-chart-area"> Grafik </i></a>
            </div> -->
            <div class="navbar-form">
                <?php echo form_open('mahasiswa/search') ?>
                <input type="text" name="keyword" class="form" placeholder="Search">
                <button type="submit" class="btn btn-success"> Cari </button>
                <?php echo form_close() ?>
            </div>
        </nav>
        <table id="example3" class="table">
            <tr>
                <th>NO</th>
                <th>NAMA MAHASISWA</th>
                <th>NIM</th>
                <th>TANGGAL LAHIR</th>
                <th>JURUSAN</th>
                <th colspan="2">AKSI</th>
            </tr>
            <?php
            $no = 1;
            foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $mhs->nama ?></td>
                    <td><?php echo $mhs->nim++ ?></td>
                    <td><?php echo $mhs->tgl_lahir++ ?></td>
                    <td><?php echo $mhs->jurusan++ ?></td>
                    <td><?php echo anchor(
                            'mahasiswa/detail/' . $mhs->id,
                            '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>'
                        ) ?>
                    </td>
                    <td onclick="javascript: return confirm('Anda Yakin Hapus?')">
                        <?php echo anchor('mahasiswa/hapus/' . $mhs->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                    </td>
                    <td>
                        <?php echo anchor('mahasiswa/edit/' . $mhs->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination" style="justify-content:center;">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="mahasiswa">2</a></li>
                <li class="page-item"><a class="page-link" href="mahasiswa">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA MAHASISWA</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('mahasiswa/tambah_aksi') ?>
                    <!-- <form method="post" action="<?php echo base_url() . 'mahasiswa/tambah_aksi' ?>"> -->
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" name="tgl_lahir" class="form-control datepicker">
                    </div>
                    <!-- <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" name="tgl_lahir" class="form-control">
                        </div> -->
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" name="no_telp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Upload Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>