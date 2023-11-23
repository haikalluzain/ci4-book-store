<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Sale List
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
  <h2 class="section-title">Sale</h2>
  <p class="section-lead">This page is just an example for you to create your own page.</p>
  <div class="card shadow">
    <div class="card-header">
      <h4>Sale List</h4>
      <!-- <div class="card-header-action">
        <a href="<?= route_to('book-new') ?>" class="btn btn-primary">Add More <i class="fas fa-plus"></i></a>
      </div> -->
    </div>
    <div class="card-body p-0">
      <div class="table-responsive table-invoice">
        <table class="table table-striped">
          <thead>
            <tr>
              <th><i class="fas fa-th"></i></th>
              <th>Invoice Number</th>
              <th>Book</th>
              <th>Buyer</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th>Status</th>
              <th>Updated at</th>
            </tr>
          </thead>
          <tbody>

            <?php if (count($data) > 0) : ?>
              <?php foreach ($data as $key => $field) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $field->invoice_number ?></td>
                  <td><?= $field->book ?></td>
                  <td class="font-weight-600"><?= $field->buyer_email ?></td>
                  <td><?= $field->qty ?></td>
                  <td class="text-primary font-weight-bold"><?= number_to_currency($field->total_price, 'IDR') ?></td>
                  <td>
                    <?php if ($field->status == 'PENDING' || $field->status == 'ON_THE_WAY') : ?>
                      <span class="badge badge-warning"><?= $field->status ?></span>
                    <?php elseif ($field->status == 'PAID') : ?>
                      <span class="badge badge-success"><?= $field->status ?></span>
                    <?php else: ?>
                      <span class="badge badge-primary"><?= $field->status ?></span>
                    <?php endif; ?>
                  </td>
                  <td><?= $field->updated_at ?></td>
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