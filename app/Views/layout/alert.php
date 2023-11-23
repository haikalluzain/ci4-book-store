<form action="" method="POST" id="delete-form">

  <?= csrf_field() ?>
  <input type="hidden" name="_method" value="delete">
</form>

<form action="" method="POST" id="fix-form">
  <?= csrf_field() ?>
  <input type="hidden" name="_method" value="delete">
</form>

<form action="" id="confirm-form"></form>

<script>
  $(document).ready(function() {
    $('.delete-btn').on('click', function(e) {
      e.preventDefault();
      var href = $(this).attr('href');
      swal({
          title: "Hapus data ?",
          text: "Data yang di hapus tidak dapat di kembalikan!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $('#delete-form').attr('action', href).submit();
          }
        });
    });

    $('.confirm-btn').on('click', function(e) {
      e.preventDefault();
      var href = $(this).attr('href');
      var title = $(this).attr('title');
      var content = $(this).attr('content');
      swal({
          title: title,
          text: content,
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((next) => {
          if (next) {
            $('#confirm-form').attr('action', href).submit();
          }
        });
    });
  });
</script>
<?php if (session()->getFlashdata('message')) : ?>
  <script>
    iziToast.success({
      title: 'Success',
      message: "<?= session()->getFlashdata('message') ?>",
      position: "topRight",
    });
  </script>
<?php elseif (session()->getFlashdata('error')) : ?>
  <script>
    iziToast.error({
      title: 'Whoops!',
      message: "<?= session()->getFlashdata('error') ?>",
      position: "topRight",
    });
  </script>
<?php endif; ?>

<!-- @if($errors->any())
@foreach($errors->all() as $error)
<script>

iziToast.error({
    title: 'Whoops!',
    message: "{{ $error }}",
    position : "topRight",
});

</script>
@endforeach
@endif -->