<?php
$routes = explode('/', uri_string());
if (count($routes) > 1) {
  $route = $routes[1];
} else {
  $route = $routes[0];
}
?>

<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="dashboard-ecommerce.html">Book Store</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="dashboard-ecommerce.html">IV</a>
    </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Page</li>
        <li class="<?= $route == 'dashboard' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to("dashboard") ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        <li><a class="nav-link" href="<?= route_to("home") ?>"><i class="fas fa-home"></i> <span>Homepage</span></a></li>
        <li class="menu-header">Content</li>

        <li class="<?= $route == 'users' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('users') ?>"><i class="fas fa-user"></i> <span>User</span></a></li>
        <li class="<?= $route == 'sales' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('sales') ?>"><i class="fas fa-shopping-cart"></i> <span>Sale</span></a></li>
        <li class="<?= $route == 'books' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('books') ?>"><i class="fas fa-book"></i> <span>Book</span></a></li>
        <li class="<?= $route == 'genres' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('genres') ?>"><i class="fas fa-heart"></i> <span>Genre</span></a></li>
        <li class="<?= $route == 'authors' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('authors') ?>"><i class="fas fa-address-card"></i> <span>Author</span></a></li>
        <li class="<?= $route == 'publishers' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('publishers') ?>"><i class="fas fa-building"></i> <span>Publisher</span></a></li>
        <!-- <li class="<?= $route == 'cv-builder' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('cv') ?>"><i class="far fa-file-pdf"></i> <span>CV Builder</span></a></li> -->
      </ul>
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="#" class="btn bg-white btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Contact Developer
      </a>
    </div>        
  </aside>
</div>