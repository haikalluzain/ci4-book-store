<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Updated Education
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
    <h2 class="section-title">Updated Education</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    <div class="container">
        <div class="card shadow">
            <form class="needs-validation" novalidate="" action="<?= route_to('education-update', $data->id) ?>" method="post">
                <input type="hidden" name="_method" value="put">
                <?= csrf_field() ?>
                <div class="card-header">
                    <h4>Updated Educational Details <a href="<?= route_to('educations') ?>" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Kembali</a></h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="font-weight-bold">Degree</label>
                                <input type="text" class="form-control" name="degree" placeholder="Enter Degree" value="<?= $data->degree ?>">
                                <div class="invalid-feedback">
                                    Please input degree
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label class="font-weight-bold">Institute Name</label>
                                <input type="text" class="form-control" name="institute" placeholder="Enter Institute Name" value="<?= $data->institute ?>">
                                <div class="invalid-feedback">
                                    Please input institute
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="font-weight-bold">Graduation Year</label>
                                <input type="text" class="form-control" name="year" placeholder="Graduate Year" value="<?= $data->year ?>">
                                <div class="invalid-feedback">
                                    Please input graduation year
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>