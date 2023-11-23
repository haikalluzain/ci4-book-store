<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
CV Builder
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
  <h2 class="section-title">CV</h2>
  <p class="section-lead">This page is just an example for you to create your own page.</p>

  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <iframe align="center" frameborder="0" id="pdf-preview" src="<?= base_url() . '/dashboard/cv/pdf' ?>" title="CV preview"></iframe>
      </div>
      <div class="col-md-5">
        <div class="card shadow">
          <div class="card-header">
            <h5>Manage Your CV</h5>
          </div>
          <div class="card-body">
            <div>
              <a href="<?= route_to('pdf') ?>" class="btn btn-primary btn-block">CV Preview</a>
            </div>
            <div class="mt-4">
              <a href="<?= route_to('export-excel') ?>" class="btn btn-success btn-block">Export Excel</a>
            </div>
            <div class="mt-4">
              <a href="<?= route_to('cv-basic-info') ?>" class="btn btn-info btn-block">Update</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<?= $this->endSection() ?>