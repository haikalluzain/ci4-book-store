<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
Create Book
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
  <h2 class="section-title">Create a Book</h2>
  <p class="section-lead">This page is just an example for you to create your own page.</p>

  <div class="container">
    <div class="card shadow">
      <form class="needs-validation" novalidate="" action="<?= route_to('book-create') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="card-header">
          <h4>Book Form <a href="/dashboard/books" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Kembali</a></h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" required>
                <div class="invalid-feedback">
                  Please input the title
                </div>
              </div>
              <div class="form-group">
                <label>Genre</label>
                <select class="form-control selectric" name="genre" required>
                  <?php foreach ($genres as $genre) : ?>
                    <option value="<?= $genre->id ?>"><?= $genre->display_name ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  Please select the genre
                </div>
              </div>
              <div class="form-group">
                <label>Author</label>
                <select class="form-control selectric" name="author" required>
                  <?php foreach ($authors as $author) : ?>
                    <option value="<?= $author->id ?>"><?= $author->name ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  Please select the author
                </div>
              </div>
              <div class="form-group">
                <label>Publisher</label>
                <select class="form-control selectric" name="publisher" required>
                  <?php foreach ($publishers as $publisher) : ?>
                    <option value="<?= $publisher->id ?>"><?= $publisher->name ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  Please select the publisher
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Price</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      Rp
                    </div>
                  </div>
                  <input type="text" name="price" class="form-control currency" required>
                </div>
                <div class="invalid-feedback">
                  Please input the price
                </div>
              </div>
              <div class="form-group">
                <label>Total Pages</label>
                <input type="number" class="form-control" name="total_pages" required>
                <div class="invalid-feedback">
                  Please input the total pages
                </div>
              </div>
              <div class="form-group">
                <label>Stock</label>
                <input type="number" class="form-control" name="quantity" required placeholder="10">
                <div class="invalid-feedback">
                  Please input the stock
                </div>
              </div>
              <div class="form-group">
                <label for="">Release Date</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-calendar"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control datepicker" name="release_date" required>
                </div>
                <div class="invalid-feedback">
                  Please input the release date
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Description</label>
                <textarea class="summernote-simple" name="description" required></textarea>
                <div class="invalid-feedback">
                  Please input the description
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Book Cover</label>
                <input type="file" class="dropify" data-max-file-size="3M" data-allowed-file-extensions="jpg png jpeg" id="customFile" name="cover" required>
                <div class="invalid-feedback">
                  Please input the title
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
            <button class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>