<?= $this->extend('layout/main') ?>

<!-- @section('title','Dashboard') -->

<?= $this->section('content') ?>
<div>
  <div class="main-content">
    <header class="py-5" style="background: linear-gradient( rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4) ), url('img/background/lib-bg.jpg'); background-position: center">

      <div class="px-5">
        <div class="text-center text-white">
          <h2 class="display-4 fw-bolder">Tambah Wawasan Mu Dengan Membaca</h1>
        </div>
      </div>

    </header>
    <div class="mt-5">
      <h2 className="main-title">Rekomendasi untuk mu</h2>
      <div class="row mt-3">
        <?php if (count($books)) : ?>
          <?php foreach ($books as $book) : ?>
            <div class="col-12 col-md-6 col-lg-6 col-xl-3">
              <a href="<?= route_to('main-book-detail', $book->slug) ?>" style="text-decoration: none;" class="text-dark">
              <div class="card shadow-lg">
                <div class="text-center"><img class="card-img-top" src="<?= base_url() . '/img/books/' . $book->cover ?>"></div>
                <div class="card-body">
                  <h6 class="card-title mb-1"><?= $book->title ?></h6>
                  <p class="card-text"><?= $book->author ?></p>
                  <h6 class="text-primary"><?= number_to_currency($book->price, 'IDR') ?></h6>
                  <!-- <a href="<?= route_to('main-book-detail', $book->slug) ?>" class="btn btn-primary">Detail</a> -->
                </div>
              </div>
              </a>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>