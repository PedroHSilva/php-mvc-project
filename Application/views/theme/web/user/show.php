<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= $data['user']->id ?></td>
              <td><?= $data['user']->first_name ?></td>
              <td><?= $data['user']->email ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
