
<footer class="footer footer-static footer-light navbar-border">
  <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
  </p>
</footer>
<script src="<?= base_url();?>assets/backend/vendors/js/vendors.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/vendors/js/charts/morris.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/vendors/js/extensions/unslider-min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/js/core/app-menu.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/js/core/app.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/js/scripts/customizer.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>

<script src="<?= base_url();?>assets/backend/vendors/js/extensions/toastr.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/js/scripts/extensions/toastr.min.js" type="text/javascript"></script>

<script src="<?= base_url();?>assets/backend/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript"></script>

<script src="<?= base_url();?>assets/backend/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/backend/js/scripts/forms/switch.min.js" type="text/javascript"></script>

<script src="<?= base_url();?>assets/backend/vendors/js/ui/prism.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets/backend/js/jquery.js');?>" type="text/javascript"></script>

<script type="text/javascript">
	jQuery(function(){
		const $btnSubmit = $("#submit");	
		;
		$btnSubmit.click(function(){
			var nik = $("#nik").val();
			var nama = $("#nama").val();
			var prodi = "adpend";
			var kode = $("#kode").val();
			var gender = $("#gender").val();
			jQuery.ajax({
				type : 'POST',
				url : '<?php echo str_replace("adpend/","",base_url())?>/tambah-dosen-json',
				data : {nik:nik,nama:nama,prodi:prodi,kode:kode,gender:gender},
				success:function(data){
					console.log(data);		
				},error:function(data){
					console.log('error');
				} 
			});

			
		});



	});
</script>

</body>
</html>
