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
                <form class="needs-validation" novalidate="" action="<?= route_to('career-object-create') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <textarea class="form-control" name="career_object" placeholder="Enter summary"></textarea>
                        <div class="invalid-feedback">
                            Please input company name
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