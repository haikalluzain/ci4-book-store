<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Updated Certificate
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
    <h2 class="section-title">Updated Certificate</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    <div class="container">
        <div class="card shadow">
            <form class="needs-validation" novalidate="" action="<?= route_to('certificate-update', $data->id) ?>" method="post">
                <input type="hidden" name="_method" value="put">
                <?= csrf_field() ?>
                <div class="card-header">
                    <h4>Updated Certificate Details <a href="<?= route_to('certificates') ?>" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Kembali</a></h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <div class="row">
                            <div class="col-md-5">
                                <label class="font-weight-bold">Certificate Name</label>
                                <input type="text" class="form-control" name="certificate_name" placeholder="Enter Certificate Name" value="<?= $data->certificate_name ?>">
                                <div class="invalid-feedback">
                                    Please input certificate name
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label class="font-weight-bold">Organization</label>
                                <input type="text" class="form-control" name="organization" placeholder="Enter Organization" value="<?= $data->organization ?>">
                                <div class="invalid-feedback">
                                    Please input organization
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="font-weight-bold">Certification Year</label>
                                <input type="text" class="form-control" name="year" placeholder="Certification Year" value="<?= $data->year ?>">
                                <div class="invalid-feedback">
                                    Please input certification year
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