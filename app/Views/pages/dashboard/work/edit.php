<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Updated Work
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
    <h2 class="section-title">Updated Work</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    <div class="container">
        <div class="card shadow">
            <form class="needs-validation" novalidate="" action="<?= route_to('work-update', $data->id) ?>" method="post">
                <input type="hidden" name="_method" value="put">
                <?= csrf_field() ?>
                <div class="card-header">
                    <h4>Updated Work Details <a href="<?= route_to('works') ?>" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Kembali</a></h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="font-weight-bold">Company Name</label>
                                <input type="text" class="form-control" name="company_name" placeholder="Enter Company Name" value="<?= $data->company_name ?>">
                                <div class="invalid-feedback">
                                    Please input company name
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label class="font-weight-bold">Position</label>
                                <input type="text" class="form-control" name="position" placeholder="Enter Position" value="<?= $data->position ?>">
                                <div class="invalid-feedback">
                                    Please input position
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="font-weight-bold">Work Year</label>
                                <input type="text" class="form-control" name="year" placeholder="Work Year" value="<?= $data->year ?>">
                                <div class="invalid-feedback">
                                    Please input work year
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <label class="font-weight-bold">Description</label>
                                <textarea class="summernote" name="description"><?= $data->description ?></textarea>
                                <div class="invalid-feedback">
                                    Please input work description
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