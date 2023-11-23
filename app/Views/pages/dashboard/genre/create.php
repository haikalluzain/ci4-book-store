<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Create Genre
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
  <h2 class="section-title">Create a Genre</h2>
  <p class="section-lead">This page is just an example for you to create your own page.</p>

  <div class="container">
  <div class="card shadow">
    <form class="needs-validation" novalidate="" action="<?= route_to('genre-create') ?>" method="post">
      <?= csrf_field() ?>
      <div class="card-header">
        <h4>Genre Form <a href="<?= route_to('genres') ?>" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Kembali</a></h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label class="col-12 col-md-3 col-form-label text-md-right">Name</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="name" required="">
            <div class="invalid-feedback">
              Silahkan isi nama genre
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