<?= $this->include('layout/main-header')  ?>
<div id="app">
<?= $this->include('layout/main-navbar')  ?>

<div class="container">
<?= $this->renderSection('content')  ?>
</div>

<?= $this->include('layout/footer')  ?>
</div>