<?php $this->load->view('include/header')  ?>
<body class="hold-transition skin-blue-light sidebar-mini">
		<div class="wrapper">
			<?php $this->load->view('include/menu_superior')  ?>
			
			<div class="content-wrapper" style="margin-left: 0px">

			<?php $this->load->view('include/info_perfil')  ?>

			<section class="content">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs pull-right">
								<li>
									<a href="#revenue-chart" data-toggle="tab">Explorar novas</a>
								</li>
								<li class="active">
									<a href="#sales-chart" data-toggle="tab">Minhas áreas de interesse</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane" id="revenue-chart" style="position: relative; height: 300px;overflow: auto;">
									<table class="table nao_adicionadas">
										
										<?php foreach ($areas_nao_adicionadas as $item) : ?>
											<tr>
												<td><?= $item->descricao  ?></td>
												<td>
												<button id="element_<?= $item->id_interesse  ?>" type="button" onclick="adicionar(<?= $item->id_interesse ?>,'<?= $item->descricao ?>')" class="pull-right btn btn-primary btn-xs">
													<i class="fa fa-plus"></i> Adicionar
												</button></td>
											</tr>
											<?php endforeach;  ?>
										
									</table>
								</div>
								<div class="tab-pane active" id="sales-chart" style="position: relative; height: 300px; overflow: auto;">
									<table class="table adicionadas">
										<tr>
											<?php foreach ($areas_adicionadas as $item) : ?>
											<tr>
												<td><?= $item->descricao  ?></td>
												<td>
													<button id="element_<?= $item->id_interesse  ?>" type="button" onclick="remover(<?= $item->id_interesse ?>,'<?= $item->descricao ?>')" class="pull-right btn btn-success btn-xs">
														<i class="fa fa-check"></i> Adicionado
													</button>
												</td>
											</tr>
											<?php endforeach;  ?>
										</tr>
										
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</section>
		</div>
<?php $this->load->view('include/footer')  ?>

<script>
	$('#menu_area').addClass('active');
	
	function remover (id_interesse,nome) {
	  $.ajax({
	    type: "POST",
	    dataType: "JSON",
	    url: "<?php echo base_url('admin/area_interesse/remover') ?>",
	    data: {"id_interesse" : id_interesse},	 
	    success: function(data)
	    {	
	    	if(data == true){
	    		$('.nao_adicionadas').append("<tr>"
												+"<td>"+nome+"</td>"
												+"<td>"
												+"<button onclick=\"adicionar(" +id_interesse +",'"+ nome+"')\" type='button' class='pull-right btn btn-primary btn-xs'>"
													+"<i class='fa fa-plus'></i> Adicionar"
												+"</button></td>"
											+"</tr>");
	    		$('#element_'+id_interesse).parent().parent().remove();
	    	}
    	}
	  });
	 }
	  function adicionar (id_interesse,nome) {
	  $.ajax({
	    type: "POST",
	    dataType: "JSON",
	    url: "<?php echo base_url('admin/area_interesse/adicionar') ?>",
	    data: {"id_interesse" : id_interesse},	 
	    success: function(data)
	    {	
	    	if(data == true){
	    		$('.adicionadas').append("<tr>"
											+"<td>"+nome+"</td>"
											+"<td>"
											+"<button onclick=\"remover(" +id_interesse +",'"+ nome+"')\" type='button' class='pull-right btn btn-success btn-xs'>"
												+"<i class='fa fa-check'></i> Adicionado"
											+"</button></td>"
										+"</tr>");
	    		$('#element_'+id_interesse).parent().parent().remove();
	    	}
    	}
	  });
}
</script>