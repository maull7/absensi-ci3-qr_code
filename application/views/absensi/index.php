<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-9">
            <form action="<?= base_url('absensi/generate'); ?>" method="POST">
                <div class="form-group">
                    <label for="formGroupExampleInput">masukan nomer absen</label>
                    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Absen siswa" name="absen" id="Absen">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">masukan nama siswa</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama siswa" name="nama" id="Nama">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">masukan kelas siswa</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Kelas siswa" name="kelas" id="Kelas">
                </div>


                <button type="submit" class="btn btn-success">GENERATE</button>
            </form>
        </div>
    </div>






</div>

</div>