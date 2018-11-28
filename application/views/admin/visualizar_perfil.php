<?php $this->load->view('include/header')  ?>
	<body class="hold-transition skin-blue-light sidebar-mini">
		<div class="wrapper">
			<?php $this->load->view('include/menu_superior')  ?>
			<div class="content-wrapper" style="margin-left: 0px">

				<!-- TOPO DA PÁGINA -->
				<div class="row">
					<div class="col-sm-12">
						<section class="content" style="min-height: 110px;">
							<div class="box box-widget widget-user" style="height: 70px">
								<div class="widget-user-header bg-aqua-active" style="height: 90px;">
									<h3 class="widget-user-username" style="margin-left:25%;" ><?= $usuario->nome ?> 
										<?php if(in_array($usuario->id_usuario,$seguidos)):  ?>
											<span id="seg_<?= $usuario->id_usuario  ?>" onclick="seguir_deixardeseguir(<?= $this->session->userdata('id_usuario')?>,<?= $usuario->id_usuario?>)" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> deixar de seguir</span>
										<?php else:  ?>
											<span id="seg_<?= $usuario->id_usuario  ?>" onclick="seguir_deixardeseguir(<?= $this->session->userdata('id_usuario')?>,<?= $usuario->id_usuario?>)" class="btn btn-success btn-xs"><i class="fa fa-user-plus"></i> seguir</span>
										<?php endif;  ?>	
									</h3>
									<h5 class="widget-user-desc" style="margin-left:25%;"><?= $usuario->profissao ?></h5>
								</div>
								<div class="widget-user-image" style="left:20%; top:30%">
									<img class="img-circle" src="<?= base_url('avatar/'.$usuario->avatar) ?>" alt="User Avatar">
								</div>
							</div>
						</section>
					</div>
				</div>
				<!-- TOPO DA PÁGINA -->

				<div class="row">
					<div class="col-sm-3" style="padding-right: 0px">

						<section class="content">
							<div class="box box-info">

								<div class="box-body" style="padding: 0px;">
									<ul class="sidebar-menu">
										<li class="header">
											<strong>Áreas de Interesse</strong>
										</li>
										<li class="active treeview">
											<ul class="treeview-menu">
												<?php foreach ($interesses as $item) : ?>
													<li class="">
														<a ><?= $item->descricao ?></a>
													</li>
												<?php endforeach;  ?>
												
											</ul>
										</li>

									</ul>
								</div>

							</div>

						</section>

					</div>
					<div class="col-sm-6" style="padding-left: 0px">
						<section class="content">
							<?php if(empty($publicacoes)): ?>
								<div class="box box-danger" >
									<div class="box-body chat" id="chat-box">
										<div class="item">
											<strong>Este usuário ainda não fez publicações :(</strong>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<?php foreach ($publicacoes as $item): ?>
								<div class="box box-success" >
									<div class="box-body chat" id="chat-box">
										<div class="item" style="margin-bottom: -10px">
											<img src="<?= base_url('avatar/'.$item->avatar)  ?>" alt="user image" class="online">
	
											<p class="message">
												<a href="#" class="name"> <?= $item->nome  ?> </a>
												<a href="#" class="name"> <small class="text-muted pull-left"><i class="fa fa-clock-o"></i> <?= data_sql_para_dia_e_mes($item->data) ?> as <?= $item->hora ?></small> </a>
												<br>
											</p>
											<hr style="margin-top: 0px; margin-bottom: 0px">
											<h3><?= $item->titulo ?></h3>
											<a href="<?= $item->titulo ?>" style="font-style: italic;"><?= $item->link ?></a>
											<p><?= $item->descricao ?></p>
										</div>
									</div>
									<div class="box-footer clearfix">
										<?php if(in_array($item->id_publicacao,$gostei)):  ?>
											<a class="btn btn-primary" id="gost_<?= $item->id_publicacao  ?>" onclick="gostar_deixardegostar(<?= $this->session->userdata('id_usuario')?>,<?= $item->id_publicacao?>)"><i class="fa fa-thumbs-o-up"></i> <span>Gostei</span></a>
										<?php else:  ?>
											<a class="btn btn-default" id="gost_<?= $item->id_publicacao  ?>" onclick="gostar_deixardegostar(<?= $this->session->userdata('id_usuario')?>,<?= $item->id_publicacao?>)" style="color: #3c8dbc;border-color: #367fa9;"><i class="fa fa-thumbs-o-up"></i> <span>Gostei</span></a>
										<?php endif;  ?>
									</div>
								</div>
							<?php endforeach;  ?>
						</section>
					</div>
					<div class="col-sm-3" style="padding-left: 0px">
						<section class="content">
							<div class="box box-info">
								<div class="box-body" style="padding: 0px;">
									<ul class="sidebar-menu">
										<li class="header">
											<strong>Seguidos</strong>
										</li>
										<li class="active treeview">
											<ul class="treeview-menu">
												<?php foreach ($seguidos_list as $item) : ?>
													<li style="margin-bottom: 5px">
														<img src="<?= base_url('avatar/'.$item->avatar)  ?>" style="width: 25px;height: 25px;border-radius: 50%;">
														<a href="<?= base_url('admin/perfil/visualizar/'.$item->id_usuario)  ?>" style="display: inline"><?= $item->nome ?></a>
														<!--span id="seg_m_<?= $item->id_usuario  ?>" onclick="seguir_deixardeseguir(<?= $this->session->userdata('id_usuario')?>,<?= $item->id_usuario?>)" class="btn btn-primary btn-xs pull-right"><i class="fa fa-check"></i></span-->
													</li>
												<?php endforeach;  ?>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
<?php $this->load->view('include/footer')  ?>
