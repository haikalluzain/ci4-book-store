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
                <form class="needs-validation" novalidate="" method="post">
                    <!-- <input type="hidden" name="_method" value="put">
                    <?= csrf_field() ?> -->
                    <div class="form-group">
                        <!-- <label class="font-weight-bold">Career Obejct</label> -->
                        <textarea class="form-control" name="career_object" placeholder="Enter career object" readonly rows="10"><?= $data->career_object ?></textarea>
                    </div>
                    <div class="form-group">
                        <div>
                            <a href="<?= route_to('career-object-edit', $data->id) ?>" class="btn btn-info btn-block">Update</a>
                        </div>
                        <div class="mt-3">
                            <a href="<?= route_to('pdf') ?>" class="btn btn-primary btn-block">CV Preview</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>