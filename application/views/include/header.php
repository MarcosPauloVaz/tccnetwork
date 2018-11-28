<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>TCC Network</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="<?= base_url('assets/admin/bootstrap/css/bootstrap.min.css') ?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
		<!-- Ionicons -->
		<link rel="stylesheet" href="<?= base_url('assets/js/ionicons.min.css') ?>">
		<!-- Multiselect -->
		<link href="<?= base_url('assets/admin/bootstrap/css/bootstrap.multiselect.min.css') ?>" rel="stylesheet" type="text/css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?= base_url('assets/admin/dist/css/AdminLTE.min.css') ?>">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="<?= base_url('assets/admin/dist/css/skins/_all-skins.min.css') ?>">

		<link rel="stylesheet" href="<?= base_url('assets/admin/custom.css') ?>">

		<!-- jQuery 2.2.3 -->
		<script src="<?= base_url('assets/admin/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="<?= base_url('assets/js/jquery-ui.min.js') ?>"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- Bootstrap 3.3.6 -->
		<script src="<?= base_url('assets/admin/bootstrap/js/bootstrap.min.js') ?>"></script>
		
		<!-- AdminLTE App -->
		<script src="<?= base_url('assets/admin/dist/js/app.min.js') ?>"></script>
		<!-- Multiselect -->
		<script src="<?= base_url('assets/admin/bootstrap/js/bootstrap.multiselect.min.js') ?>"></script>
	</head>
	<script type="text/javascript">
	function processar($texto){ if($texto !== undefined){$('#processar > div > strong').text($texto.toUpperCase());}$('#processar').fadeIn('fast');}
	function base_url($url){if($url === undefined) return '<?php echo base_url() ?>'; else return '<?php echo base_url() ?>' + $url;}
	
	function seguir_deixardeseguir(id_seguidor,id_seguido){
		console.log('opa')
		$.ajax({
		    type: "POST",
		    dataType: "JSON",
		    url: "<?php echo base_url('admin/usuario/seguir_deixardeseguir') ?>",
		    data: {"id_seguidor" : id_seguidor, "id_seguido" : id_seguido},	 
		    success: function(data)
		    {	
		    	if(data == 'seguir'){
		    		$('#seg_'+id_seguido).removeClass('btn-success');
		    		$('#seg_'+id_seguido).html('<i class="fa fa-check"></i> deixar de seguir');
		    		$('#seg_'+id_seguido).addClass('btn-primary');
		    		//botoes menores
		    		$('#seg_m_'+id_seguido).removeClass('btn-success');
		    		$('#seg_m_'+id_seguido).html('<i class="fa fa-check"></i>');
		    		$('#seg_m_'+id_seguido).addClass('btn-primary');
		    		
		    		$('.seg_'+id_seguido).removeClass('btn-success');
		    		$('.seg_'+id_seguido).html('<i class="fa fa-check"></i> deixar de seguir');
		    		$('.seg_'+id_seguido).addClass('btn-primary');
		    		//botoes menores
		    		$('.seg_m_'+id_seguido).removeClass('btn-success');
		    		$('.seg_m_'+id_seguido).html('<i class="fa fa-check"></i>');
		    		$('.seg_m_'+id_seguido).addClass('btn-primary');
		    	}else if(data == 'deixar_seguir'){
		    		$('#seg_'+id_seguido).removeClass('btn-primary');
		    		$('#seg_'+id_seguido).html('<i class="fa fa-user-plus"></i> seguir');
		    		$('#seg_'+id_seguido).addClass('btn-success');
		    		//botoes menores
		    		$('#seg_m_'+id_seguido).removeClass('btn-primary');
		    		$('#seg_m_'+id_seguido).html('<i class="fa fa-user-plus"></i>');
		    		$('#seg_m_'+id_seguido).addClass('btn-success');
		    		
		    		$('.seg_'+id_seguido).removeClass('btn-primary');
		    		$('.seg_'+id_seguido).html('<i class="fa fa-user-plus"></i> seguir');
		    		$('.seg_'+id_seguido).addClass('btn-success');
		    		//botoes menores
		    		$('.seg_m_'+id_seguido).removeClass('btn-primary');
		    		$('.seg_m_'+id_seguido).html('<i class="fa fa-user-plus"></i>');
		    		$('.seg_m_'+id_seguido).addClass('btn-success');
		    	}
	    	}
	  	});
	  }
	  	function gostar_deixardegostar(id_usuario,id_publicacao){
		$.ajax({
		    type: "POST",
		    dataType: "JSON",
		    url: "<?php echo base_url('admin/publicacao/gostar_deixardegostar') ?>",
		    data: {"id_usuario" : id_usuario, "id_publicacao" : id_publicacao},	 
		    success: function(data)
		    {	
		    	if(data == 'gostar'){
		    		$('#gost_'+id_publicacao).removeClass('btn-default');
		    		$('#gost_'+id_publicacao).addClass('btn-primary');
		    		$('#gost_'+id_publicacao).attr('style','');
		    	}else if(data == 'deixar_gostar'){
		    		$('#gost_'+id_publicacao).removeClass('btn-primary');
		    		$('#gost_'+id_publicacao).addClass('btn-default');
		    		$('#gost_'+id_publicacao).attr('style','color: #3c8dbc;border-color: #367fa9;');
		    	}
	    	}
	  	});
	}
	
	</script>