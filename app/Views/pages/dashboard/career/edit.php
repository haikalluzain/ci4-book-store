<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Career Object
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
    <h2 class="section-title">Career Object</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4>Your Professional Summary</h4>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate="" action="<?= route_to('career-object-update', $data->id) ?>" method="post">
                    <input type="hidden" name="_method" value="put">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <!-- <label class="font-weight-bold">Career Obejct</label> -->
                        <textarea class="form-control" name="career_object" placeholder="Enter career object"><?= $data->career_object ?></textarea>
                        <div class="invalid-feedback">
                            Please input career object
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>