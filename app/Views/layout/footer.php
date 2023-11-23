  <!-- General JS Scripts -->
  <script src="/assets/modules/jquery.min.js"></script>
  <script src="/assets/modules/popper.js"></script>
  <script src="/assets/modules/tooltip.js"></script>
  <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="/assets/modules/moment.min.js"></script>

  <!-- JS Libraies -->
  <script src="/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="/assets/modules/izitoast/js/iziToast.min.js"></script>
  <script src="/assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="/assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="/assets/modules/summernote/summernote-bs4.js"></script>
  <script src="/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="/assets/modules/dropify/js/dropify.min.js"></script>

  <script src="/assets/js/stisla.js"></script>
  

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="/assets/js/scripts.js"></script>
  <script src="/assets/js/custom.js"></script>
  <script src="/assets/js/page/forms-advanced-forms.js"></script>
  <script>
    $(document).ready(function(){
        $('.coba').on('click',function(e){
            e.preventDefault();
            var title = $(this).attr('title');
            console.log(title);
        })
    })
  </script>

<?= $this->include('layout/alert')  ?>
</body>
</html>