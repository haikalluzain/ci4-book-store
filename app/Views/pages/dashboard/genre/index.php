<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Genre List
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
  <h2 class="section-title">Genre</h2>
  <p class="section-lead">This page is just an example for you to create your own page.</p>
  <div class="card shadow">
    <div class="card-header">
      <h4>Genre List</h4>
      <div class="card-header-action">
        <a href="<?= route_to('genre-new') ?>" class="btn btn-primary">Add More <i class="fas fa-plus"></i></a>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive table-invoice">
        <table class="table table-striped">
          <thead>
            <tr>
              <th><i class="fas fa-th"></i></th>
              <th>Display Name</th>
              <th>Name</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php if (count($data) > 0) : ?>
              <?php foreach ($data as $key => $field) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td class="font-weight-600"><?= $field->display_name ?></td>
                  <td class="font-weight-600"><?= $field->name ?></td>
                  <td><?= $field->updated_at ?></td>
                  <td>
                    <a href="<?= route_to('genre-edit', $field->id) ?>" class="btn btn-icon btn-info"><i class="fas fa-pen"></i></a>
                    <a href="<?= route_to('genre-delete', $field->id) ?>" class="btn btn-icon btn-danger delete-btn"><i class="far fa-trash-alt"></i></a>
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
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>