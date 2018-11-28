<header class="main-header">
				<a href="<?= base_url('admin/dashboard')  ?>" class="logo"> <span class="logo-lg"><b>TCC Network</b></span> </a>
				<nav class="navbar navbar-static-top">
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?= base_url('avatar/'.$this->session->userdata('avatar')) ?>" class="user-image" alt="User Image"> <span class="hidden-xs"><?= $this->session->userdata('nome')  ?></span> </a>
								<ul class="dropdown-menu">
									<li class="user-header">
										<img src="<?= base_url('avatar/'.$this->session->userdata('avatar')) ?>" class="img-circle" alt="User Image">
										<p>
											<?= $this->session->userdata('nome')  ?> - <?= $this->session->userdata('profissao')  ?>
										</p>
									</li>
									<li class="user-footer">
										<!-- <div class="pull-left">
											<a href="<?= base_url('admin/perfil')  ?>" class="btn btn-default btn-flat">Perfil</a>
										</div> -->
										<div class="pull-right">
											<a href="<?= base_url('login/sair')  ?>" class="btn btn-default btn-flat">Sair</a>
										</div>
									</li>
								</ul>
							</li>
							
						</ul>
					</div>
					<!-- <div class="pull-left">
						<form class="navbar-form navbar-left" role="search" action="<?= base_url('admin/pesquisa') ?>" method="post">
							<div class="input-group">
								<input type="text" class="form-control" name="pesquisa" id="navbar-search-input" placeholder="Pesquisar outros usuários...">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-info btn-flat">
										<i class="fa fa-search"></i>
									</button> </span>
							</div>
						</form>
					</div> -->
					<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li id="menu_home">
								<a href="<?= base_url('admin/dashboard')  ?>">Home <span class="sr-only">(current)</span></a>
							</li>
							<li id="menu_perfil">
								<a href="<?= base_url('admin/perfil')  ?>">Favoritos</a>
							</li>
							<li id="menu_pub">
								<a href="<?= base_url('admin/pub')  ?>">Nova Publicação</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>