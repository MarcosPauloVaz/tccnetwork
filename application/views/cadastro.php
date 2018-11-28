<?php $this->load->view('include/header')  ?>
	
<body class="hold-transition register-page">
			<div class="register-box">
				<div class="register-logo">
					<a><b>TCC Network</b></a>
				</div>
				<div class="box box-widget widget-user-2" >
					<div class="widget-user-header bg-light-blue">
						<h3 style="margin-left: 0px" class="widget-user-username text-center">Cadastre-se</h3>
					</div>
					
					<div class="register-box-body">
						
						<form action="<?= base_url('usuario/salvar') ?>" onsubmit="return validar_cadastro()" method="post">
							<div id="img-control" class="form-group">
							<label class="label-perfil">* Avatar:</label>
							<div style="width: 100%; text-align: center">
								<a style="cursor: pointer" onclick ="alterar_foto()" alt="Inserir Avatar" title="Inserir Avatar">
									<img style="width: 140px; height: 140px" class="img-circle" id="img_id" src="<?= base_url('assets/img/avatar.png') ?>" alt="User Avatar">
									<i class="fa fa-camera" style="position: absolute;left: 170px;top: 202px;font-size: 20px;"></i>
								</a>
							</div>
							<hr>
							</div>
							
							<div class="form-group has-feedback">
								<label class="label-perfil">* Nome:</label>
								<input type="text" id="nome" name="nome" class="form-control input-perfil" placeholder="Ex: Carlos Drummond">
								<span class="glyphicon glyphicon-user form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<label class="label-perfil">* Email:</label>
								<input type="email" id="email" name="email" class="form-control input-perfil" placeholder="Ex: jose@email.com">
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							</div>

							<div class="form-group input-perfil">
								<label class="label-perfil">* Profissão:</label>
								<select id="profissao" name="profissao" class="form-control input-perfil">
									<option value="">Selecione</option>
									<option value="Analista de Sistemas">Analista de Sistemas</option>
									<option value="Arquiteto de Software">Arquiteto de Software</option>
									<option value="Engenheiro de Software">Engenheiro de Software</option>
									<option value="Tester">Tester</option>
									<option value="Scrum Master">Scrum Master</option>
									<option value="Gerente de Projetos">Gerente de Projetos</option>
								</select>
							</div>

							<div class="form-group">
								<label class="label-perfil">* Interesses:</label>
									<?= form_dropdown('interesse', $interesses, '', 'class="form-control" multiple="multiple" id="interesse"'); ?>
								</select>
							</div>

							<div class="form-group has-feedback">
								<label class="label-perfil">* Senha:</label>
								<input type="password" name="senha" id="senha" class="form-control input-perfil" placeholder="******">
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<label class="label-perfil">* Confirmar senha:</label>
								<input type="password" id="confirmar_senha" class="form-control input-perfil" placeholder="******">
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>
							<div class="row">
								<div class="col-xs-12" id="form_footer">
									<button type="submit" class="btn btn-primary btn-block btn-flat">
										Cadastrar
									</button>
								</div>
								<input type="hidden" name="nome-img" id="nome-img"/>
								<tbody id="body-quantidade">
									<tr class="text-center"></tr>
								</tbody>
							</div>
						</form>
						<br>
						<a href="<?= base_url('login') ?>" class="text-center">Já tem uma conta? Faça login aqui!</a>
					</div>
				</div>
			</div>
			<?php $this->load->view('include/foto')  ?>
		</body>
<script src="<?= base_url('assets/js/validar_form.js') ?>"></script>
<script>
	$(document).ready(function() {
		$('#interesse').multiselect({
			buttonClass : 'btn btn-perfil',
			enableFiltering : true,
			enableCaseInsensitiveFiltering : true,
			filterPlaceholder : 'Procurar',
			dropRight : true,
			nonSelectedText : "Selecione os interesses...",
			allSelectedText : "Todos interesses selecionados",
			numberDisplayed : 8,
			maxHeight : 400,
			buttonWidth : '100%',
			dropRight : true,
			onChange: function(element, checked) {
		       	var $interesse = element.context.innerText;
		        var $id_interesse   = element.val();
		        
		        if(checked)
		        {
		        	 $('#form_footer').append('<input type="hidden" id="interesse_'+$id_interesse+'" name="interesses[]" value="'+ $id_interesse  +'" />');
		        	 $html = '<tr id="'+ $id_interesse +'">'
		    			+'<td class="text-center"  ><h6 class="margin-0" style="">'
		    			+ $interesse
		    			+ '<input type="hidden"  name="interesses[]" value="'+ $id_interesse  +'" />'
		    			+'</h6></td>'
		        		+'</tr>';
		
					$("#body-quantidade tr:last").after($html).fadeIn('slow');
		        }
		        else
		        {
		        	$('#interesse_' +$id_interesse).remove();
		        }
		    }
		});
	});
	
	</script> 	
	<script>
		function alterar_foto() {
			$('#modal-footer-img').hide();
			$('#input-avatar').val('');
			$('#body-foto').hide();
			$('#modal-cortar').modal('show');
			/*$('#id_avatar').val('logo');
			 $event.preventDefault();*/
		}

	</script>
</html>