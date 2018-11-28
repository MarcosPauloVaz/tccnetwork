<div id="processar">
	<div><strong>CARREGANDO...</strong><br/><br/> 
	<i class="fa fa-refresh fa-spin fa-4x"></i>
	</div>
</div>

<!-- MODAL DE CORTE DE IMG -->
<div class="modal fade" id="modal-cortar" data-backdrop="static" >
	<div class="modal-dialog" style="max-height: 600px">
		<div class="modal-content">

			<?= form_open_multipart('usuario/recebe_imagem', array('id' => 'form-recebe-imagem')) ?>
			<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <b><h4 class="modal-title text-success">Escolha uma foto:</h4></b>
		      </div>
			<div class="modal-body">

				<div class="row">
					<div class="col-xs-12">
						<input type="file" name="foto" id="input-avatar" accept="image/*;capture=camera" class="form-control input-sm">
					</div>
				</div>

				<div class="row">
					<div class="text-center" style="padding: 5px">
						<div class="cropper-example-1 text-center" id="body-foto">
							<img id="img-avar" name="foto" style="width: 100%">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 text-center" id="load-foto" style="display: none">
						<span class="fa fa-refresh fa-spin" style="font-size: 20px"></span>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12" id="error-foto">

					</div>
				</div>

			</div>

			<div class="modal-footer" id="modal-footer-img" style="display: none">

				<input type="hidden" name="x" id="crop-x" value="100" />
				<input type="hidden" name="y" id="crop-y" value="100" />
				<input type="hidden" name="height" id="crop-height" value="100" />
				<input type="hidden" name="width" id="crop-width" value="100" />
				<input type="hidden" id="foto_antiga"  name="foto_antiga" >
				<input type="hidden" id="id_conteudo"  name="id_conteudo" >
				
				<button type="submit" id="bt_cortar" class="btn btn-success pull-right">
					<span class="fa fa-scissors"></span> Cortar
				</button>

				<?= form_close() ?>

				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">
					<span class="fa  fa-remove"></span> Fechar
				</button>

			</div>
		</div>
	</div>
</div>

<link href="<?= base_url('assets/css/cropper.css') ?>" rel="stylesheet" type="text/css">
<script src="<?= base_url('assets/js/cropper.js') ?>"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function()
{
	/**
	 * Corte de foto
	 *  
	 */
		
		$avatar = $('.cropper-example-1 > img').cropper(
		{
			aspectRatio : 1 / 1,
			movable : true,
			zoomable : false,
			rotatable : false,
			scalable : true,
			modal: true,
			minContainerHeight: 300,
			maxHeight: 300,
			crop : function(e)
			{
				$('#crop-x').val(Math.round(e.x));
				$('#crop-y').val(Math.round(e.y));
				$('#crop-height').val(Math.round(e.height));
				$('#crop-width').val(Math.round(e.width));
			}
		});
		
		
	$('#input-avatar').change(function($event)
	{
		$('#error-foto').hide();
		if (this.files && this.files[0])
		{
			var reader = new FileReader();
			
			$('#load-foto').show();
			reader.onload = function(e)
			{
				
				$avatar.cropper('replace', e.target.result);
				$('#load-foto').hide();
				$('#modal-footer-img').show();
				$('#body-foto').show();
			};

			reader.readAsDataURL(this.files[0]);
		}
		setTimeout(function(){
			$($avatar).cropper('crop');
		},500)
	});

	
	
	$('#form-recebe-imagem').submit(function(e)
	{
		processar('Estamos carregando a sua foto...');
		
		$.ajax(
		{
			url : $('#form-recebe-imagem').attr("action"),
			type : 'POST',
			data : new FormData(this),
			cache : false,
			contentType : false,
			processData : false,
			success : function($result)
			{
				var $json = JSON.parse($result);

				$('#processar').hide();

				if ($json.status == 'erro') {
					var $msg = $json.mensagem;

					if (!($msg == '')) {
						$('#error-foto').html('<p class="text-danger">Aconteceu algum erro:<strong><br/> ' + $msg + '</strong></p>');
						$('#error-foto').show();
					}
				} else {

					$('#nome-img').val($json.url_img);

					$('#img_id').attr('src', base_url('tmp/') + $json.url_img);

					$('#modal-cortar').modal('hide');

				}

			},
			error : function(data)
			{
				console.log("error");
				console.log(data);
			}
		});

		e.preventDefault();
	});
	/**
	 * FIM Corte de foto
	 *  
	 */
});

function processar($texto){ if($texto !== undefined){$('#processar > div > strong').text($texto.toUpperCase());}$('#processar').show();}
</script>


