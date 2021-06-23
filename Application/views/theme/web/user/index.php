<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
        <?= flash(); ?>
        <h2><?= $data['title'] ?></h2>
        <a href="<?=url("auth/logout")?>">sair</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
          
            <?php foreach ($data['users'] as $user) { ?>
            <tr>
              <td><?= $user->id ?></td>
              <td><?= $user->first_name ?></td>
              <td><?= $user->email ?></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
