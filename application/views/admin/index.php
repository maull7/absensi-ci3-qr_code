<?php
$role = $this->db->get_where('role', ['id' => $user['role_id']])->row_array();
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Page Heading -->
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
        <div class="card-header text-dark"><?= $role['role']; ?></div>
        <div class="card-body">
            <h5 class="card-title">Hallo anda sebagai <?= $role['role']; ?> <br> <?= $user['nama']; ?></h5>
            <p class="card-text"><?= $user['email']; ?></p>
        </div>
    </div>




</div>

</div>