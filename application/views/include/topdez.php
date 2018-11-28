<div class="box box-info" style="border-top: solid 0px">
	<div class="box-body" style="padding: 0px;">
		<ul class="sidebar-menu">
			<li class="header">
				<strong>
				<center>
					TOP 10
				</center></strong>
			</li>
			<li class="active treeview">
				<ul class="treeview-menu">
					<?php foreach ($top_dez as $pub): ?>
						<li class="">
							<a href="<?= base_url('admin/publicacao/visualizar/'.$pub->id_publicacao.'/'.$pub->id_usuario)  ?>" title="<?= $pub->titulo ?>" <?= $pub->seguido ? 'style="font-weight: bold"' : ''  ?> ><?= strlen($pub->titulo) > 28 ? substr($pub->titulo, 0, 25).'...' : $pub->titulo  ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</li>

		</ul>
	</div>
</div>