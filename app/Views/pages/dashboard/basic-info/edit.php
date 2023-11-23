<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
CV Builder
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-body">
  <h2 class="section-title">CV</h2>
  <p class="section-lead">This page is just an example for you to create your own page.</p>

  <div class="container">
    <div class="card shadow">
      <div class="card-header">
        <h5>Tell us about yourself</h5>
      </div>
      <div class="card-body">
        <form class="needs-validation" novalidate="" action="<?= route_to('cv-basic-update', $data->id) ?>" method="post">
          <input type="hidden" name="_method" value="put">
          <?= csrf_field() ?>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label class="font-weight-bold">Frist Name : </label>
                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="<?= $data->first_name ?>">
                <!-- @error('first_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror -->
              </div>
              <div class="col-md-6">
                <label class="font-weight-bold">Last Name : </label>
                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="<?= $data->last_name ?>">
                <!-- @error('last_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror -->
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label class="font-weight-bold">Profession : </label>
                <input type="text" class="form-control" name="profession" placeholder="Enter Your profession" value="<?= $data->profession ?>">
                <!-- @error('profession')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror -->
              </div>
              <div class="col-md-6">
                <label class="font-weight-bold">Email : </label>
                <input type="email" class="form-control" name="email" placeholder="Enter Your Email" value="<?= $data->email ?>">
                <!-- @error('email')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror -->
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label class="font-weight-bold">Phone : </label>
                <input type="text" class="form-control" name="phone" placeholder="Enter Your Phone Number" value="<?= $data->phone ?>">
              </div>
              <div class="col-md-6">
                <label class="font-weight-bold">Website : </label>
                <input type="text" class="form-control" name="website" placeholder="Enter Your Website" value="<?= $data->website ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row ">
              <div class="col-md-6">
                <label class="font-weight-bold">City : </label>
                <input type="text" class="form-control" name="city" placeholder="Enter Your City" value="<?= $data->city ?>">
              </div>
              <div class="col-md-6">
                <label class="font-weight-bold">Country : </label>
                <input type="text" class="form-control" name="country" placeholder="Enter Your Country" value="<?= $data->country ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row ">
              <div class="col-md-6">
                <!-- <a href="{{route('main_index')}}" class="btn btn-info">Back</a> -->
              </div>
              <div class="col-md-6 text-right">
                <input type="submit" class="btn btn-success" value="Continue">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- <div class="col-md-3 align-self-center">
      <h5 class="text-info">This is a Demo Resume.</h5>
      <img src="{{asset('images/cv.jpg')}}" alt="" class="img-fluid">
    </div> -->


</div>
<?= $this->endSection() ?>