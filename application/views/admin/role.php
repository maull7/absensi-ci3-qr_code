<div class="container-fluid">

    <!-- Button trigger modal -->

    <!-- Button trigger modal -->
    <?= $this->session->flashdata('pesan'); ?>


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ROLE</th>
                <th scope="col">ACTION</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($role as $r) : ?>
                <tr>
                    <th scope="row">
                        <?= $i; ?>
                    </th>
                    <td><?= $r['role']; ?></td>
                    <td>
                        <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>">akses</a>
                        <a href="<?= base_url('menu/hapus/') ?><?= $r['id']; ?>">hapus</a>
                        <a href="<?= base_url('menu/edit/') ?><?= $r['id']; ?>">edit</a>

                    </td>
                    <?php $i++ ?>
                <?php endforeach; ?>


                </tr>
        </tbody>
    </table>







</div>

</div>