<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
<?= $book->title ?>
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
              <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Book</a></li>
              <li class="breadcrumb-item"><a href="<?= route_to('main-book-detail', $book->slug) ?>"><?= $book->title ?></a></li>
              <li class="breadcrumb-item active">Checkout</li>
            </ol>
          </nav>
        </div>
      </div>
      <form action="<?= route_to('create-checkout') ?>" method="post">
        <?= csrf_field() ?>
        <!-- Hidden fields -->
        <input type="hidden" name="book_id" value="<?= $book->id ?>">
        <input type="hidden" name="qty" value="<?= $qty ?>">
        <input type="hidden" name="shipping_fee" value="<?= $shipping_fee ?>">
        <div class="row">
          <div class="col-lg-12 col-xl-6">
            <h4 class="mb-3">Alamat Pengiriman</h4>
            <div class="form-group">
              <label>Nama Penerima</label>
              <input type="text" class="form-control" name="recipient">
            </div>
            <div class="form-group">
              <label>No. Telp</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-phone"></i>
                  </div>
                </div>
                <input type="number" class="form-control phone-number" name="phone">
              </div>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="address" class="form-control"></textarea>
            </div>
          </div>
          <div class="col-lg-12 col-xl-6">
            <div class="text-right mt-1">
              <h4 class="mb-4">Detail Order</h4>
              <img class="mb-3 shadow-lg" style="max-width: 100px;" src="<?= base_url() . '/img/books/' . $book->cover ?>" />
              <h6 class="fw-bolder"><?= $book->title ?></h6>
              <div class="fs-5 mt-4">
                <div class="row">
                  <div class="col">
                    <address class="mb-0">
                      <span>Harga Buku</span>
                      <p class="font-weight-bold mb-0"><?= number_to_currency($book->price, 'IDR') ?></p>
                    </address>
                    <address class="mb-0 py-1">
                      <span class="font-weight-bold">
                        Jumlah: <?= $qty ?>
                      </span>
                    </address>
                    <address class="mb-0">
                      <span>Biaya pengiriman</span>
                      <p class="font-weight-bold mb-0"><?= number_to_currency($shipping_fee, 'IDR') ?></p>
                    </address>
                  </div>
                </div>
              </div>

              <div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <address>
                      <h5>Total:</h5>
                    </address>
                  </div>
                  <div class="col-md-6">
                    <address>
                      <h5 class="text-primary"><?= number_to_currency($book->price * $qty + $shipping_fee, 'IDR') ?></h5>
                    </address>
                  </div>
                  <div class="col-12 mt-4">
                    <div class="text-right">
                      <button type="submit" class="btn btn-dark">Proses Pembelian</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<?= $this->endSection() ?>