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
    <!-- NProgress -->
    <script src="<?=base_url('assets/vendors/nprogress/nprogress.js');?>"></script>
    
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
