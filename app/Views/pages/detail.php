<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
<?= $book->title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
  <div class="main-content">
    <div class="container px-4 px-lg-5 mt-5">
      <div class="row mb-4">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white pl-0">
              <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Book</a></li>
              <li class="breadcrumb-item active"><?= $book->title ?></li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-lg-12 col-xl-6">
          <img class="mb-5 mb-md-0 shadow-lg" style="max-width: 450px;" src="<?= base_url() . '/img/books/' . $book->cover ?>" />
        </div>
        <div class="col-lg-12 col-xl-6">
          <div class="mb-1"><?= $book->author ?></div>
          <h2 class="fw-bolder"><?= $book->title ?></h2>
          <div class="fs-5 mb-5 mt-4">
            <div class="row">
              <div class="col">
                <span class="h5 font-weight-bold text-primary">
                  <?= number_to_currency($book->price, 'IDR') ?>
                </span>
              </div>
              <div class="col">
                <div class="d-flex">
                  <form action="<?= route_to('checkout', $book->slug) ?>" method="get">
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <input type="number" class="form-control" name="qty" min="1" max="<?= $book->quantity ?>" value="1" aria-label="" <?= $book->quantity < 1 ? 'disabled' : '' ?>>
                        <div class="input-group-append">
                          <button class="btn btn-dark" type="submit" <?= $book->quantity < 1 ? 'disabled' : '' ?>>Beli sekarang</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <?php if ($book->quantity < 1) : ?>
                <div class="col-12">
                  <div class="alert alert-warning mb-0">Stok tidak tersedia</div>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <p class="text-dark" style="line-height: 1.5;">
            <?= $book->description ?>
          </p>

          <div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <address>
                  <strong>Jumlah Halaman</strong>
                  <p><?= $book->total_pages ?></p>
                </address>
              </div>
              <div class="col-md-6">
                <address>
                  <strong>Penerbit</strong>
                  <p><?= $book->publisher ?></p>
                </address>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <address>
                  <strong>Tanggal Terbit</strong>
                  <p><?= $book->release_date ?></p>
                </address>
              </div>
              <div class="col-md-6">
                <address>
                  <strong>Stok</strong>
                  <p class="<?= $book->quantity < 1 ? 'text-danger' : '' ?>">
                    <?= $book->quantity < 1 ? 'Out of stock' : $book->quantity ?>
                  </p>
                </address>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <address>
                  <strong>Genre</strong>
                  <p><?= $book->genre ?></p>
                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?= $this->endSection() ?>