<li class="header">
							<strong>FILTROS</strong>
						</li>
						<li class="active treeview" style="line-height: 2; padding: 5px">
							
								<form action="<?= base_url('admin/dashboard/filtro')  ?>" method="post">
									<div class="row">
										<div class="col-md-12" style="margin-bottom: 5px">
											<input type="text" name="titulo" class="form-control" placeholder="Título do TCC ">
										</div>
										<div class="col-md-12" style="margin-bottom: 5px">
											<select class="form-control" name="categoria" id="">
												<option value="">Categoria</option>
												<?php foreach ($categorias as $item) : ?>
													<option value="<?= $item->categoria ?>"><?= $item->categoria ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-md-12" style="margin-bottom: 5px">
											<input type="text" name="autor" class="form-control" placeholder="Autor">
										</div>
										<div class="col-md-12" style="margin-bottom: 5px">
											<input type="text" name="orientador" class="form-control" placeholder="orientador">
										</div>
										<div class="col-md-12" style="margin-bottom: 5px">
											<select class="form-control" name="fonte" id="">
												<option value="">Fonte</option>
												<?php foreach ($fontes as $item) : ?>
													<option value="<?= $item->fonte ?>"><?= $item->fonte ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-md-6" style="margin-bottom: 5px">
											<select class="form-control" name="de" id="">
												<option value="">A partir de</option>
												<?php foreach ($ano as $item) : ?>
													<option value="<?= $item->ano ?>"><?= $item->ano ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-md-6" style="margin-bottom: 5px">
											<select class="form-control" name="ate" id="">
												<option value="">Até</option>
												<?php foreach ($ano as $item) : ?>
													<option value="<?= $item->ano ?>"><?= $item->ano ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-md-12" style="margin-bottom: 5px">
											<input type="text" name="palavras_chave" class="form-control" placeholder="Palavras-chave">
										</div>
										<div class="col-md-12" style="margin-bottom: 5px">
											<button style="width: 100%" class="btn btn-primary pull-right" href="#"><i class="fa fa-filter"></i> <span>Filtrar</span></button>
										</div>
										
									</div>
								</form>	
							
						</li>