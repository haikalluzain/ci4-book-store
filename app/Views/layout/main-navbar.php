<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand" href="/">Book Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <!-- <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li> -->
        <?php if (in_groups('administrator')) : ?>
          <li class="nav-item">
            <a class="btn btn-outline-dark" href="<?= route_to('dashboard') ?>">Go to Dashboard</a>
          </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav navbar-right">
        <?php if (logged_in()) : ?>
          <li class="nav-item">
            <a class="nav-link nav-link-lg" href="<?= route_to('orders') ?>"><i class="fas fa-list-alt"></i></a>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?= base_url() ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-2">
              <div class="d-sm-none d-lg-inline-block">
                <?= user()->fullname ?>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-item"><?= user()->email ?></div>
              <a href="<?= route_to('logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="btn btn-dark" href="<?= route_to('login') ?>">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>