<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Book List
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
  <h2 class="section-title">Book</h2>
  <p class="section-lead">This page is just an example for you to create your own page.</p>
  <div class="card shadow">
    <div class="card-header">
      <h4>Book List</h4>
      <div class="card-header-action">
        <a href="<?= route_to('book-new') ?>" class="btn btn-primary">Add More <i class="fas fa-plus"></i></a>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive table-invoice">
        <table class="table table-striped">
          <thead>
            <tr>
              <th><i class="fas fa-th"></i></th>
              <th>Cover</th>
              <th>Title</th>
              <th>Author</th>
              <th>Total Page</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php if (count($data) > 0) : ?>
              <?php foreach ($data as $key => $field) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><img class="py-2" src="<?= base_url() . '/img/books/' . $field->cover ?>" width="100" alt=""></td>
                  <td class="font-weight-600"><?= $field->title ?></td>
                  <td><?= $field->author ?></td>
                  <td><?= $field->total_pages ?></td>
                  <td class="text-primary font-weight-bold"><?= number_to_currency($field->price, 'IDR') ?></td>
                  <td>
                    <a href="<?= route_to('book-edit', $field->id) ?>" class="btn btn-icon btn-info"><i class="fas fa-pen"></i></a>
                    <a href="<?= route_to('book-delete', $field->id) ?>" class="btn btn-icon btn-danger delete-btn"><i class="far fa-trash-alt"></i></a>
                  </td>
                </tr>

              <?php endforeach; ?>

            <?php else : ?>

              <tr class="text-center">
                <td colspan="7" class="text-danger font-weight-bold">No data found</td>
              </tr>

            <?php endif; ?>


          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>