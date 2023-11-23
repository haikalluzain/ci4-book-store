<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Edit User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
  <h2 class="section-title">Edit a User</h2>
  <p class="section-lead">This page is just an example for you to create your own page.</p>

  <div class="container">
  <div class="card shadow">
    <form class="needs-validation" novalidate="" action="<?= route_to('user-update', $data->id) ?>" method="post">
      <input type="hidden" name="_method" value="put">
      <?= csrf_field() ?>
      <div class="card-header">
        <h4>User Form <a href="<?= route_to('users') ?>" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Kembali</a></h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label class="col-12 col-md-3 col-form-label text-md-right">Name</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="fullname" required="" value="<?= $data->fullname ?>">
            <div class="invalid-feedback">
              Silahkan isi nama user
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-3 col-form-label text-md-right">Email</label>
          <div class="col-sm-12 col-md-7">
            <input type="email" class="form-control" name="email" required="" value="<?= $data->email ?>">
            <div class="invalid-feedback">
              Silahkan isi email user
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-3 col-form-label text-md-right">Status</label>
          <div class="col-sm-12 col-md-7">
            <select name="active" class="form-control" id="">
              <option value="1" <?= $data->active ? 'selected' : '' ?>>Active</option>
              <option value="0" <?= !$data->active ? 'selected' : '' ?>>Inactive</option>
            </select>
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