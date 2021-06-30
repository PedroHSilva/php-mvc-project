<?php include "user_form.php" ?>

<div class="w3-container">

    <div class="w3-container w3-section">
        <span class="w3-left w3-xlarge">Users</span>
        <div class="w3-right">
            <button class="w3-button w3-blue w3-hover-blue-grey" onclick="w3_open('modal-add-user')">Adiconar</button>
        </div>
    </div>
    <div class="w3-responsive">
        <table class="w3-table-all w3-hoverable">
        <thead>
            <tr class="w3-teal">
            <th>Name</th>
            <th>Email</th>
            <th class="w3-center w3-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['users'] as $user): ?>
                <tr>
                    <td><?=$user->first_name . " " . $user->last_name?></td>
                    <td><?=$user->email?></td>
                    <td class="w3-center">
                        <a href="<?=url('admin/userUpdate/'.$user->id)?>" class="w3-text-blue w3-hover-blue w3-text-hover-white w3-padding"><i class="fa fa-pencil"></i></a>
                        <a href="<?=url('admin/userDelete/'.$user->id)?>" class="w3-text-red w3-hover-red w3-text-hover-white w3-padding"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach;?>

        </tbody>

    </table>
  </div>

</div>
