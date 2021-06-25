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
            <tr class="w3-dark-grey">
            <th>Name</th>
            <th>Email</th>
            <th class="w3-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['users'] as $user): ?>
                <tr>
                    <td><?=$user->first_name . " " . $user->last_name?></td>
                    <td><?=$user->email?></td>
                    <td class="w3-center">
                        <i class="fa fa-pencil w3-text-blue w3-large w3-margin-right" aria-hidden="true"></i>
                        <i class="fa fa-trash w3-text-red w3-large" aria-hidden="true"></i>
                    </td>
                </tr>
            <?php endforeach;?>

        </tbody>

    </table>
  </div>

</div>
