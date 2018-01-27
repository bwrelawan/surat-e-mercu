<div class="footer">
	<div class="container-fluid">
		<div class="row">

			<p class="text-center"> 
		Copyright &copy; <?php echo date("Y"); ?> Aslab Fasilkom <br>
		Fakultas Ilmu Komputer <br>
		Universitas Mercu Buana</p>
			</div>
		</div>
	</div>
</div>


<script src="<?php echo base_url('assets/plugins/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/dist/js/bootstrap.min.js')?>" ></script>
<script>
	 $('.btn-add').click(function(){

	 	var x=
    $( ".form-test" ).append( "" );
  });

</script>
<script>
  // Event handler for text input
  $('#kodenim').on('input', function() {
    //TODO Getiing option based on input value and setting it as selected
    $('#prodi option:contains(' + this.value + ')').eq(0).prop('selected', true);
  });

  // Event handler for select
  $('#prodi').change(function() {
      // Updating text input based on selected value
      $('#kodenim').val($('option:selected', this).val());
    });

  function no(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
  }

</script>

<!-- sckrip coba -->
<script>
  $('.form-tambahan').hide();
  $('#anggota').change(function(){

    
    $('.form-tambahan').hide();
    var total=$(this).val();

    for (var x = total; x <= 5; x++) {
      // $('.ft'+i).show();
      $('#nim'+x).removeAttr('maxLength');
      $('#nim'+x).removeAttr('minlength');
      $('#nim'+x).removeAttr('required');
      $('#nama'+x).removeAttr('required');
    }
    

    for (var i = 1; i <= total; i++) {
      $('.ft'+i).show();
       $('#nim'+i).prop({
          'required': true,
          'maxLength':8,
          'minLength':8,
      });
      $('#nama'+i).prop('required', true);
    }


  });
</script>
</body>
</html>