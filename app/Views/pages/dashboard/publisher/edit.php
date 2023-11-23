<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Edit Publisher
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
  <h2 class="section-title">Edit a Publisher</h2>
  <p class="section-lead">This page is just an example for you to create your own page.</p>

  <div class="container">
    <div class="card shadow">
      <form class="needs-validation" novalidate="" action="<?= route_to('publisher-update', $data->id) ?>" method="post">
        <input type="hidden" name="_method" value="put">
        <?= csrf_field() ?>
        <div class="card-header">
          <h4>Publisher Form <a href="<?= route_to('publishers') ?>" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Kembali</a></h4>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Name</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" name="name" required="" value="<?= $data->name ?>">
              <div class="invalid-feedback">
                Silahkan isi nama penerbit
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Email</label>
            <div class="col-sm-12 col-md-7">
              <input type="email" class="form-control" name="email" required="" value="<?= $data->email ?>">
              <div class="invalid-feedback">
                Silahkan isi email penerbit
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Phone</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" name="phone" required="" value="<?= $data->phone ?>">
              <div class="invalid-feedback">
                Silahkan isi telepon penerbit
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Address</label>
            <div class="col-sm-12 col-md-7">
              <textarea name="address" required class="form-control"><?= $data->address ?></textarea>
              <div class="invalid-feedback">
                Silahkan isi alamat penerbit
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