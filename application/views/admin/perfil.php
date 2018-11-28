<?php $this->load->view('include/header')  ?>
<body class="hold-transition skin-blue-light sidebar-mini">
		<div class="wrapper">
			<?php $this->load->view('include/menu_superior')  ?>
			
			<!-- MENU LATERAL ESQUERDO -->
			<aside class="main-sidebar">
				<section class="sidebar">
					
					<ul class="sidebar-menu">
						<?php $this->load->view('include/userrecomendado')  ?>
					</ul>
				</section>
			</aside>
			
			<div class="content-wrapper">
				<div class="row">
					
					<!-- CORPO -->
					<div class="col-sm-11">
						<section class="content" style="padding-right: 0px">
							<!-- <div class="box box-info">
								<div class="box-header">
									
									<h3 class="box-title">Faça aqui sua publicação</h3>
								</div>
								<form action="<?= base_url('admin/publicacao/publicar') ?>" onsubmit="return validar_publicacao()" method="post">
								<div class="box-body">
										<div class="">
											<input style="border-bottom: solid 0px;font-size: 20px; font-weight: bold" type="text" class="form-control" id="titulo" name="titulo" placeholder="Título da publicação">
										</div>
										<div class="">
											<input style="border-bottom: solid 0px;border-top: solid 0px; font-style: italic;" type="text" class="form-control" id="link" name="link" placeholder="link">
										</div>
										<div>
											<textarea id="descricao" name="descricao" class="textarea" placeholder="Descrição da publicação..." style="width: 100%; height: 80px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; border-top: solid 0px; padding: 10px;"></textarea>
										</div>
									
								</div>
								<div class="box-footer clearfix">
									<button type="submit" class="pull-right btn btn-primary" id="sendEmail">
										Publicar
									</button>
								</div>
								</form>
							</div> -->
							<?php foreach ($publicacoes as $item) : ?>
								<div class="box box-success">
									<div class="box-body chat" id="chat-box">
										<div class="item" style="margin-bottom: -10px">
											<!-- <img src="<?= base_url('avatar/'.$item->avatar)  ?>" alt="user image" class="online">
											<p class="message">
												<a href="<?= $item->id_usuario != $this->session->userdata('id_usuario') ? base_url('admin/perfil/visualizar/'.$item->id_usuario) : base_url('admin/perfil') ?>" class="name"> <?= $item->nome  ?> </a>
												<?php if($item->id_usuario != $this->session->userdata('id_usuario')): ?>
												<span id="seg_<?= $item->id_usuario  ?>" onclick="seguir_deixardeseguir(<?= $this->session->userdata('id_usuario')?>,<?= $item->id_usuario?>)" style="margin-top: -15px" class="btn btn-primary btn-xs pull-right seg_<?= $item->id_usuario  ?>"><i class="fa fa-check"></i> deixar de seguir</span>
												<?php endif;  ?>
												<a href="#" class="name"> <small class="text-muted pull-left"><i class="fa fa-clock-o"></i> <?= data_sql_para_dia_e_mes($item->data)?> as <?= $item->hora  ?></small> </a>
												<br>
											</p>
											<hr style="margin-top: 0px; margin-bottom: 0px"> -->
											<h3><?=  $item->titulo ?></h3>
											<h5><span  style="font-style:italic"><?=  $item->autor ?> (<?=  $item->orientador ?>)</span> - <?=  $item->ano ?> - <a href="<?= $item->link  ?>"><?= $item->link  ?></a> ( <?=  $item->fonte ?> )</h5>
											
											<p>
												<?= $item->resumo  ?>
											</p>
											<hr>
											<div>
											<strong>Categoria: </strong><span><?=  $item->categoria ?></span><br>
											<strong>Palavras-chave: </strong><span><?=  $item->palavras_chave ?></span>
											</div>
										</div>
									</div>
									<div class="box-footer clearfix ">

										<?php if(in_array($item->id_publicacao,$gostei)):  ?>
											<a class="btn btn-primary pull-left" id="gost_<?= $item->id_publicacao  ?>" onclick="gostar_deixardegostar(<?= $this->session->userdata('id_usuario')?>,<?= $item->id_publicacao?>)"><i class="fa fa-star"></i> <span>Desfavoritar</span></a>
										<?php else:  ?>
											<a class="btn btn-default pull-left" id="gost_<?= $item->id_publicacao  ?>" onclick="gostar_deixardegostar(<?= $this->session->userdata('id_usuario')?>,<?= $item->id_publicacao?>)" style="color: #3c8dbc;border-color: #367fa9;"><i class="fa fa-star"></i> <span>Favoritar</span></a>
										<?php endif;  ?>

										<a class="btn btn-primary pull-right" href="#"><i class="fa fa-download"></i> <span>Download</span></a>
									</div>
								</div>
							<?php endforeach;  ?>
							
						</section>
					</div>
					
					<!-- MENU LATERAL DIREITO
					<div class="col-sm-3"  style="padding-left: 0px">
						<?php $this->load->view('include/topdez')   ?>
					</div> -->
				</div>
			</div>
		</div>
<?php $this->load->view('include/footer')  ?>
<script src="<?= base_url('assets/js/validar_form.js') ?>"></script>
<script>
	$('#menu_perfil').addClass('active');
</script>