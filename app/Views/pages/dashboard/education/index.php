<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Education List
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
    <h2 class="section-title">Education</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>

    <div class="container">
        <div class="card shadow">
            <div class="card-header">
            <h4>Your Education Summaries</h4>
            <div class="card-header-action">
                <a href="<?= route_to('education-new') ?>" class="btn btn-primary">Add More <i class="fas fa-plus"></i></a>
            </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Degree</th>
                            <th scope="col">Institue</th>
                            <th scope="col">Year</th>
                            <th scope="col">Actons</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (count($data) > 0) : ?>
                            <?php foreach ($data as $key => $field) : ?>

                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td class="font-weight-600"><?= $field->degree ?></td>
                                    <td><?= $field->institute ?></td>
                                    <td><?= $field->year ?></td>
                                    <td>
                                        <a href="<?= route_to('education-edit', $field->id) ?>" class="btn btn-icon btn-info"><i class="fas fa-pen"></i></a>
                                        <a href="<?= route_to('education-delete', $field->id) ?>" class="btn btn-icon btn-danger delete-btn"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr class="text-center">
                                <td colspan="6" class="text-danger font-weight-bold">No data found</td>
                            </tr>

                        <?php endif; ?>


                    </tbody>
                </table>
                <a href="<?= $work ? route_to('works') : route_to('work-new') ?>" class="btn btn-block btn-success">Next</a>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-3 align-self-center">
                <h5 class="text-info">This is a Demo Resume.</h5>
                <img src="{{asset('images/cv.jpg')}}" alt="" class="img-fluid">
            </div> -->
</div>
<?= $this->endSection() ?>