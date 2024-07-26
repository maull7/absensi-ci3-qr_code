<div class="container-fluid">

    <!-- Page Heading -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        TAMBAH MENU BARU
    </button>
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('pesan'); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">MENU</th>
                <th scope="col">ACTION</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($menu as $m) : ?>
                <tr>
                    <th scope="row">
                        <?= $i; ?>
                    </th>
                    <td><?= $m['menu']; ?></td>
                    <td>
                        <a href="<?= base_url('menu/edit/') ?><?= $m['id']; ?>"><i class="text-success p-2 m-2 bi bi-pencil-square"></i></a>
                        <a href="<?= base_url('menu/hapus/') ?><?= $m['id']; ?>"><i class="text-danger p-2 m-2 bi bi-trash3-fill"></i></a>
                    </td>
                    <?php $i++ ?>
                <?php endforeach; ?>


                </tr>
        </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah menu baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('menu/insert'); ?>" method="post">
                        <div class="form-group">
                            <label for="formGroupExampleInput">MENU NAME</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tambah menu baru" name="menu" id="menu">
                            <?= form_error('menu'); ?>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>




</div>

</div>