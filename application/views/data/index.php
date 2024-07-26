<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ABSEN</th>
                <th scope="col">NAMA</th>
                <th scope="col">KELAS</th>
                <th scope="col">WAKTU</th>
                <th scope="col">KETERANGAN</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($siswa as $sw) : ?>
                <tr>
                    <th scope="row">
                        <?= $i; ?>
                    </th>
                    <td><?= $sw['absen']; ?></td>
                    <td><?= $sw['nama']; ?></td>
                    <td><?= $sw['kelas']; ?></td>
                    <td><?= $sw['waktu']; ?></td>
                    <td><?= $sw['keterangan']; ?></td>
                    <?php $i++ ?>
                <?php endforeach; ?>


                </tr>
        </tbody>
    </table>



</div>

</div>