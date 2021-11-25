<script>
  
    function pruebaDivAPdf(nameSurvey) {
      var pdf = new jsPDF('p', 'pt', 'letter');
      pdf.addHTML($('#carouselExampleIndicators')[0], function () {
          pdf.save(nameSurvey);
      });
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <!-- jQuery -->
    <script src="<?=base_url('assets/vendors/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?=base_url('assets/vendors/nprogress/nprogress.js');?>"></script>
    <!-- Chart.js -->
    <script src="<?=base_url('assets/vendors/Chart.js/dist/Chart.min.js');?>"></script>
    <!-- gauge.js -->
    <script src="<?=base_url('assets/vendors/gauge.js/dist/gauge.min.js');?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?=base_url('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js');?>"></script>
    <!-- iCheck -->
    <script src="<?=base_url('assets/vendors/iCheck/icheck.min.js');?>"></script>
    <!-- Skycons -->
    <script src="<?=base_url('assets/vendors/skycons/skycons.js');?>"></script>
    <!-- Flot -->
    <script src="<?=base_url('assets/vendors/Flot/jquery.flot.js');?>"></script>
    <script src="<?=base_url('assets/vendors/Flot/jquery.flot.pie.js');?>"></script>
    <script src="<?=base_url('assets/vendors/Flot/jquery.flot.time.js');?>"></script>
    <script src="<?=base_url('assets/vendors/Flot/jquery.flot.stack.js');?>"></script>
    <script src="<?=base_url('assets/vendors/Flot/jquery.flot.resize.js');?>"></script>
    <!-- Flot plugins -->
    <script src="<?=base_url('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js');?>"></script>
    <script src="<?=base_url('assets/vendors/flot-spline/js/jquery.flot.spline.min.js');?>"></script>
    <script src="<?=base_url('assets/vendors/flot.curvedlines/curvedLines.js');?>"></script>
    <!-- DateJS -->
    <script src="<?=base_url('assets/vendors/DateJS/build/date.js');?>"></script>
    <!-- JQVMap -->
    <script src="<?=base_url('assets/vendors/jqvmap/dist/jquery.vmap.js');?>"></script>
    <script src="<?=base_url('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js');?>"></script>
    <script src="<?=base_url('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js');?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?=base_url('assets/vendors/moment/min/moment.min.js');?>"></script>
    <script src="<?=base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url('assets/build/js/custom.min.js');?>"></script>
	
    <script src="https://kit.fontawesome.com/2855b6d308.js" crossorigin="anonymous"></script>        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php if( isset($script) ): ?>
      <script type="text/javascript" src="<?= base_url('assets/js/'.$script.'.js')?>"></script>
    <?php endif; ?>

  </body>
</html>
