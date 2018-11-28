<?php $this->load->view('include/header')  ?>
	<body class="hold-transition skin-blue-light sidebar-mini">
		<div class="wrapper">
			<?php $this->load->view('include/menu_superior')  ?>
			<div class="content-wrapper" style="margin-left: 0px">

				

				<div class="row">
					<div class="col-sm-3" style="padding-right: 0px">
					</div>
					<div class="col-sm-6" style="padding-left: 0px">
						<section class="content">
								<div class="box box-success" >
									<div class="box-body chat" id="chat-box">
										<div class="item" style="margin-bottom: -10px">
											<form action="<?= base_url('admin/publicacao/salvar') ?>" onsubmit="return validar_cadastro()" method="post">
												
												<div class="form-group has-feedback">
													<label class="label-perfil">* Título:</label>
													<input type="text" id="titulo" name="titulo" class="form-control input-perfil" placeholder="Ex: Estudo de Caso de implantação de ERP">
												</div>
												<div class="form-group has-feedback">
													<label class="label-perfil">* Autor:</label>
													<input type="text" id="autor" name="autor" class="form-control input-perfil" placeholder="Ex: José da Silva">
												</div>
												<div class="form-group has-feedback">
													<label class="label-perfil">* Orientador:</label>
													<input type="text" id="orientador" name="orientador" class="form-control input-perfil" placeholder="Ex: Carlos Antônio">
												</div>
												<div class="form-group has-feedback">
													<label class="label-perfil">* Link:</label>
													<input type="text" id="link" name="link" class="form-control input-perfil" placeholder="Ex: sitedetcc.com/tcc/1...">
												</div>
												<div class="form-group has-feedback">
													<label class="label-perfil">* Resumo:</label>
													<textarea id="resumo" class="form-control" rows="10" name="resumo" class="textarea" placeholder="Resumo da publicação..."></textarea>
												</div>
												<div class="form-group has-feedback">
													<label class="label-perfil">* Palavras-chave:</label>
													<input type="text" id="palavras_chave" name="palavras_chave" class="form-control input-perfil" placeholder="Ex: tecnologia, aplicativos...">
												</div>
												<div class="form-group has-feedback">
													<label class="label-perfil">* Categoria:</label>
													<select class="form-control" name="categoria" id="categoria">
														<option value="">Selecione...</option>
														<?php foreach ($categorias as $item) : ?>
															<option value="<?= $item->categoria ?>"><?= $item->categoria ?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<div class="form-group has-feedback">
													<label class="label-perfil">* Ano:</label>
													<select class="form-control" name="ano" id="ano">
														<option value="">Selecione...</option>
														<?php foreach ($ano as $item) : ?>
															<option value="<?= $item->ano ?>"><?= $item->ano ?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<div class="form-group has-feedback">
													<label class="label-perfil">* Fonte:</label>
													<select class="form-control" name="fonte" id="fonte">
														<option value="">Selecione...</option>
														<?php foreach ($fontes as $item) : ?>
															<option value="<?= $item->fonte ?>"><?= $item->fonte ?></option>
														<?php endforeach; ?>
													</select>
												</div>
												

												<div class="row">
													<div class="col-xs-12" id="form_footer">
														<button type="submit" class="btn btn-primary btn-block btn-flat">
															Publicar
														</button>
													</div>
													<input type="hidden" name="nome-img" id="nome-img"/>
													<tbody id="body-quantidade">
														<tr class="text-center"></tr>
													</tbody>
												</div>
											</form>
										</div>
									</div>
									<div class="box-footer clearfix">
									</div>
								</div>
						</section>
					</div>
					<div class="col-sm-3" style="padding-left: 0px">
					</div>
				</div>
			</div>
<?php $this->load->view('include/footer')  ?>
<script>
	$('#menu_pub').addClass('active');
</script>