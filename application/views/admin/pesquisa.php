<?php $this->load->view('include/header')  ?>
<body class="hold-transition skin-blue-light sidebar-mini">
		<div class="wrapper">
			<?php $this->load->view('include/menu_superior')  ?>
			
			<!-- MENU LATERAL ESQUERDO -->
			<aside class="main-sidebar">
				<section class="sidebar">
					<div class="user-panel">
						<div class="text-center image">
							<img src="<?= base_url('avatar/'.$this->session->userdata('avatar')) ?>" class="img-circle img-70" alt="User Image">
						</div>
						<div class="info text-center">
							<p>
								<?= $this->session->userdata('nome')  ?>
							</p>
						</div>
					</div>
					<ul class="sidebar-menu">
						<li class="header">
							<strong>PUBLICAÇÕES RECOMENDADAS</strong>
						</li>
						<li class="active treeview">
							<ul class="treeview-menu">
								<li class="">
									<a href="#"><i class="fa fa-circle-o"></i> Apps Android</a>
								</li>
								<li class="">
									<a href="#"><i class="fa fa-circle-o"></i> Navegação em nuvem</a>
								</li>
								<li class="">
									<a href="#"><i class="fa fa-circle-o"></i> Robôs usam I.A.</a>
								</li>
								<li class="">
									<a href="#"><i class="fa fa-circle-o"></i> Desnvolvimento Mobile</a>
								</li>
								<li class="">
									<a href="#"><i class="fa fa-circle-o"></i> Banco de Dados</a>
								</li>
							</ul>
						</li>
						<?php $this->load->view('include/userrecomendado')  ?>
					</ul>
				</section>
			</aside>
			
			<div class="content-wrapper">
				<div class="row">
					
					<!-- CORPO -->
					<div class="col-sm-9">
						<section class="content" style="padding-right: 0px">
							<h3 style="margin-top: 10px"><i class="fa fa-users" ></i> Usuários</h3>
							<div class="box box-info">
								<div class="box-body chat">
									<?php foreach ($usuarios as $item): ?>
										<div class="item box_usuario">
											<img src="<?= base_url('avatar/'.$item->avatar)  ?>" alt="user image" class="online img-55px">
											<p class="message message-pesquisa">
												<a href="<?= base_url('admin/perfil/visualizar/'.$item->id_usuario)  ?>" style="font-size: 18px; width: 70%" class="name"> <?= $item->nome  ?></a>
												<?php if(in_array($item->id_usuario,$seguidos)):  ?>
													<span id="seg_<?= $item->id_usuario  ?>" onclick="seguir_deixardeseguir(<?= $this->session->userdata('id_usuario')?>,<?= $item->id_usuario?>)" style="margin-top: -20px" class="btn btn-primary pull-right"><i class="fa fa-check"></i> deixar de seguir</span>
												<?php else:  ?>
													<span id="seg_<?= $item->id_usuario  ?>" onclick="seguir_deixardeseguir(<?= $this->session->userdata('id_usuario')?>,<?= $item->id_usuario?>)" style="margin-top: -20px" class="btn btn-success pull-right"><i class="fa fa-user-plus"></i> seguir</span>
												<?php endif;  ?>
												<span class="name" style="font-size: 16px"><?= $item->profissao  ?></span>
												
											</p>
										</div>
										<hr class="hr_usuario">
									<?php endforeach; ?>
									<?php if(empty($usuarios)):  ?>
										<strong>Infelizmente não foram encontrados usuários com esse nome :(</strong>
									<?php endif;  ?>
								</div>
							</div>
						</section>
					</div>
					
					<!-- MENU LATERAL DIREITO -->
					<div class="col-sm-3"  style="padding-left: 0px">
						<?php $this->load->view('include/topdez')   ?>
					</div>
				</div>
			</div>
		</div>
<?php $this->load->view('include/footer')  ?>

<script>
	$('#menu_home').addClass('active');
</script>