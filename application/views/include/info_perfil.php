<!-- TOPO DA PÁGINA -->
<div class="row">
	<div class="col-sm-12">
		<section class="content" style="min-height: 110px;">
			<div class="box box-widget widget-user" style="height: 70px">
				<div class="widget-user-header bg-aqua-active" style="height: 90px;">
					<h3 class="widget-user-username" style="margin-left:25%;" ><?= $this->session->userdata('nome')  ?> </h3>
					<h5 class="widget-user-desc" style="margin-left:25%;"><?= $this->session->userdata('profissao')  ?></h5>
				</div>
				<div class="widget-user-image" style="left:20%; top:30%">
					<img class="img-circle" src="<?= base_url('avatar/'.$this->session->userdata('avatar')) ?>" alt="User Avatar">
				</div>
			</div>
		</section>
	</div>
</div>
<!-- TOPO DA PÁGINA -->