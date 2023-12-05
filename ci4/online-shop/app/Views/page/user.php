<?= $this->extend('template/template1'); ?>
<?= $this->section('content'); ?>
<div class="user-pages">
  <div class="user-profiles">
    <img src="<?= $user['photo'] ?>" alt="" srcset="" class="img-user">
    <h4><?= $user['name'] ?></h4>
    <h4><?= $user['email'] ?></h4>
  </div>
  <div class="users-menus">
    <ul>
      <li><button class="btn btn-primary btn-menus" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"> <i class="bi bi-person-circle"></i> Detail Accout</button></li>
      <li><button class="btn btn-primary btn-menus" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="bi bi-key"></i> Reset Password</button></li>
      <li><a href="/logout"><i class="bi bi-door-open"></i> Log Out</a></li>

    </ul>
  </div>
</div>
<!-- reset password modal -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Reset Your Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/update_user" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">New password</label>
            <input type="password" class="form-control" max="4" maxlength="8" name="newpw">
          </div>
          <button type="submit" class="btn btn-primary">Update Your passsword!</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>



<!-- profiles accoutn -->
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Details Your Accout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/update_user" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">No.phone</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="addres">
          </div>
          <button type="submit" class="btn btn-primary">Update Your profiles!</button>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>