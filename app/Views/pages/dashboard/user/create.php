<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Create User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
  <h2 class="section-title">Create a User</h2>
  <p class="section-lead">This page is just an example for you to create your own page.</p>

  <div class="container">
  <div class="card shadow">
    <form class="needs-validation" novalidate="" action="<?= route_to('user-create') ?>" method="post">
      <?= csrf_field() ?>
      <div class="card-header">
        <h4>User Form <a href="<?= route_to('users') ?>" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Kembali</a></h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label class="col-12 col-md-3 col-form-label text-md-right">Name</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="fullname" required="">
            <div class="invalid-feedback">
              Silahkan isi nama user
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-3 col-form-label text-md-right">Role</label>
          <div class="col-sm-12 col-md-7">
            <select name="role" class="form-control">
              <?php foreach($roles as $role): ?>
                <option value="<?= $role->name ?>"><?= $role->description ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-3 col-form-label text-md-right">Email</label>
          <div class="col-sm-12 col-md-7">
            <input type="email" class="form-control" name="email" required="">
            <div class="invalid-feedback">
              Silahkan isi email user
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-3 col-form-label text-md-right">Passowrd</label>
          <div class="col-sm-12 col-md-7">
            <input type="password" class="form-control" name="password" required="">
            <div class="invalid-feedback">
              Silahkan isi passowrd user
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-center">
        <button class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  </div>
</div>
<?= $this->endSection() ?>