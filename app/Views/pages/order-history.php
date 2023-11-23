<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
Order History
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
  <div class="main-content">
    <div class="container px-4 px-lg-5 mt-5">
      <div class="row">
        <div class="col-12 pl-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Riwayat Pemesanan</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <h3 class="mb-3">Riwayat Pemesanan</h3>
          <div class="table-responsive table-invoice">
        <table class="table table-striped">
          <thead>
            <tr>
              <th><i class="fas fa-th"></i></th>
              <th>Invoice Number</th>
              <th>Book</th>
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
                  <td class="font-weight-600"><a href="<?= route_to('main-book-detail', $field->book_slug) ?>"><?= $field->book ?></a></td>
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
  </div>
</div>
</div>

<?= $this->endSection() ?>