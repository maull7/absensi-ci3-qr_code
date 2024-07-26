<?php


$result = $this->db->get_where('user_menu', ['id' => $submenu['menu_id']])->row_array();


?>


<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <form action="" method="POST">
                <div class="form-group">
                    <input type="hidden" value="<?= $submenu['sub_id']; ?>" name="sub_id">
                    <label for="formGroupExampleInput">Add for menu</label>
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="<?= $submenu['menu_id']; ?>"><?= $result['menu']; ?></option>
                        <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('menu_id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="edit title" name="title" id="title" value=" <?= $submenu['title']; ?>">
                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">url</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Add new menu" name="url" id="url" value=" <?= $submenu['url']; ?>">
                    <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">ICONS</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Add new menu" name="icon" id="icon" value=" <?= $submenu['icon']; ?>" ?>
                    <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-success">EDIT</button>
            </form>
        </div>
    </div>

</div>