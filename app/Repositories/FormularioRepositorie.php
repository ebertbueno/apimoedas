<?php
namespace App\Repositories;
use App\Models\CamposDoSistema;
use App\Models\contract;
use App\Repositories\Tratamentos;
use App\Repositories\ConsultasRepositore;
use DB;

class FormularioRepositorie{ 

	static function formulario($data){

		$label = 					( !empty($data['label']) ? $data['label'] : '' );
		$label_botao_direita = 		( !empty($data['label_botao_direita']) ? $data['label_botao_direita'] : '' );
		$formulario = 				( !empty($data['formulario']) ? $data['formulario'] : 4 );
		$tipo = 					( !empty($data['tipo']) ? $data['tipo'] : 'text' );
		$required = 				( !empty($data['required']) ? 'required="required"' : '' );
		$required_label = 			( !empty($data['required']) ? '<small>(*) </small>' : '' );
		$valor_inicial = 			( !empty($data['valor_inicial']) ? $data['valor_inicial'] : Null );
		$readonly = 				( !empty($data['readonly']) ? 'readonly="readonly"' : '' );
		$disabled = 				( !empty($data['disabled']) ? ' disabled="disabled"' : '' );
		$placeholder = 				( !empty($data['placeholder']) ? $data['placeholder'] : $label );
		$minlength = 				( !empty($data['minlength']) ? 'minlength="'.$data['minlength'].'"' : '' );
		$maxlength = 				( !empty($data['maxlength']) ? 'maxlength="'.$data['maxlength'].'"' : '' );
		$rowsTextarea = 			( !empty($data['rows']) ? $data['rows'] : '5' );
		$min = 						( !empty($data['min']) ? $data['min'] : 0 );
		$max = 						( !empty($data['max']) ? $data['max'] : 1 );
		$tabela_relacional = 		( !empty($data['tabela_relacional']) ? $data['tabela_relacional'] : '' );
		$chave_tabela_relacional = 	( !empty($data['chave_tabela_relacional']) ? $data['chave_tabela_relacional'] : 'filhos' );
		$nome_no_banco_de_dados = 	( !empty($data['nome_no_banco_de_dados']) ? $data['nome_no_banco_de_dados'] : 'id' );
		$mascara = 					( !empty($data['mascara']) ? $data['mascara'] : '' );
		$multiple = 				( !empty($data['multiple']) ? 'multiple="multiple"' : '' );
		$dados_aux = 				( !empty($data['dados_aux']) ? $data['dados_aux'] : '' );
		$style = 					( !empty($data['style']) ? $data['style']: '');
		$cssAdicionalInput = 		( !empty($data['cssAdicionalInput']) ? $data['cssAdicionalInput']: 'form-control');
		$campoLivre = 				( !empty($data['campoLivre']) ? $data['campoLivre']: Null);
		$checked = 					( !empty($data['checked']) ? ' checked="checked"' : Null);
		$icone = 					( !empty($data['icone']) ? $data['icone'] : Null);  // passar um array com tipo e arquivo, tipo: icone, imagem, letra


		$editor = 					'summernote';
		$editor = 					( !empty($data['editor']) ? 'ckeditor' : 'summernote');



		$tamanhoCheio =				( !empty($data['tamanhoCheio']) ? 1 : 0);
		$confirmacao =				( !empty($data['confirmacao']) ? $data['confirmacao'] : 0);
		$msg_base =					( !empty($data['msg_base']) ? '<small>'.trataTraducoes($data['msg_base']).'</small>' : Null);

		$tamDiv   = 				( !empty($data['tamDiv']) ? $data['tamDiv'] : 10);
		$tamLabel = 				( !empty($data['tamLabel']) ? $data['tamLabel'] : 2);
		$javascript = 				( !empty($data['javascript']) ? $data['javascript'] : 'teste()');
		$implemetacao_js = 			( !empty($data['implementacao_js']) ? $data['implementacao_js'] : '');


		switch ($tipo) {
			case 'select':
			case 'select_multiple':
				$option = '<option value="">...</option>';
				foreach( ConsultasRepositore::ConsultasRepositore($tabela_relacional) as $dado ){
					$selecionado = ( $valor_inicial === $dado['value'] ? 'selected="selected"' : Null );
					$option .= '<option style="font-family: monospace;" '.$selecionado.' value="'.$dado['value'].'">';

					$option .= $dado['label_1'];
					$option .= ( isset($dado['label_2']) ? ' | ' .  $dado['label_2'] : '' );
					$option .= ( isset($dado['label_3']) ? ' | ' .  $dado['label_3'] : '' );

					$option .= '</option>';
				}

				$retorno = '<div class="form-group row">';
				if( !empty($label) ){
					$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				}
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				$retorno .= $label_botao_direita;
				
				if( !empty($icone) ){
				$retorno .= '<div class="input-group m-b">';
				$retorno .= '<div class="input-group-prepend">';
				$retorno .= '<span class="input-group-addon">';
				switch ($icone['tipo']) {
					case 'imagem':
						$retorno .= '<img src="'.$icone['arquivo'].'" style="height: 15px !important;">';
						break;

					case 'letra':
						$retorno .= '<span style="font-weight: bold">'.$icone['arquivo'].'</span>';
						break;
					
					default:
						$retorno .= '<i class="'.$icone['arquivo'].'"></i>';
						break;
				}
				$retorno .= '</span></div>';
				}

				$retorno .= '<select onchange='.$javascript.' '.$campoLivre.' '.$disabled.' style="'.$style.'" '.( $tipo === 'select_multiple' ? 'multiple' : ''  ).' '.$required.' name="'.$nome_no_banco_de_dados.''.( $tipo === 'select_multiple' ? '[]' : ''  ).'" id="'.$nome_no_banco_de_dados.'" class="form-control js-example-basic-single '.$cssAdicionalInput.'" style="width:10px !important;">';
				$retorno .= $option;
				$retorno .= '</select>';
				$retorno .= $implemetacao_js;

				$retorno .= '<script type="text/javascript">';
				$retorno .= 'function gerarEspaco(qtd) {';
				$retorno .= "var str = '';";
				$retorno .= "for (var i = 0; i < qtd; i++) str += '&nbsp;'";
				$retorno .= 'return str;';
				$retorno .= '}';
				$retorno .= "var options = [].slice.call(document.querySelectorAll('option'));";
				$retorno .= 'var partes = options.map(function(option) {';
				$retorno .= 'return option.innerHTML.split(' | ');';
				$retorno .= '});';
				$retorno .= 'var maximos = options[0].innerHTML.split(' | ').map(function(str, i) {';
				$retorno .= 'var max = 0;';
				$retorno .= 'partes.forEach(function(parte) {';
				$retorno .= 'if (parte[i].length > max) max = parte[i].length;';
				$retorno .= '})';
				$retorno .= 'return max;';
				$retorno .= '});';
				$retorno .= 'options.forEach(function(option, i) {';
				$retorno .= 'var html = partes[i].map(function(parte, j) {';
				$retorno .= 'var emFalta = maximos[j] - parte.length;';
				$retorno .= 'var novosEspacos = gerarEspaco(emFalta)';
				$retorno .= 'return parte + novosEspacos;';
				$retorno .= '}).join(' | ');';
				$retorno .= 'option.innerHTML = html;';
				$retorno .= '});';
				$retorno .= 'console.log(maximos);';
				$retorno .= '</script>';

				if( !empty($icone) ){
				$retorno .= '</div>';
				}

				$retorno .= $msg_base;
				$retorno .= '</div></div>';
				break;



			case 'select2':
				$option = '';
				foreach( ConsultasRepositore::ConsultasRepositore($tabela_relacional) as $dado ){
					$selecionado = ( $valor_inicial === $dado['value'] ? 'selected="selected"' : Null );
					$option .= '<option '.$selecionado.' value="'.$dado['value'].'" autocomplete="off">';
					$option .= $dado['label_1'];
					$option .= ( isset($dado['label_2']) ? ' - ' . $dado['label_2'] : Null );
					$option .= ( isset($dado['label_3']) ? ' - ' . $dado['label_3'] : Null );
					$option .= '</option>';
				}

				$retorno = '<div class="form-group row">';
				if( !empty($label) ){
					$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				}
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				$retorno .= $label_botao_direita;
				$retorno .= '<select autocomplete="off" name="'.$nome_no_banco_de_dados.'[]" id="'.$nome_no_banco_de_dados.' data-placeholder="'.trataTraducoes($placeholder).'" class="'.$nome_no_banco_de_dados.'" '.$multiple.' style="width:350px;" tabindex="4">';
				$retorno .= '<option value=""></option>';
				$retorno .= $option;
				$retorno .= '</select>';
				$retorno .= $msg_base;
				$retorno .= "<script>$('.".$nome_no_banco_de_dados."').chosen({width: '100%'});</script>";
				$retorno .= '</div>';
				$retorno .= '</div>';
				break;



			case 'select_acesso_rapido':
				$valor_relacional = MenuSistema::MenuSistema();
				$option = '';
				foreach($valor_relacional as $dado ){
					$option .= '<optgroup label="'.trataTraducoes($dado['menu']).'">';
					foreach($dado[$chave_tabela_relacional] as $filhos ){
						$option .= '<option value="'.$filhos['id'].'">'.trataTraducoes($filhos['menu']).'</option>';
					}
					$option .= '</optgroup>';
				}

				$retorno = '<div class="form-group col-sm-'.$formulario.'">
					'.trataTraducoes($label).'
					'.$label_botao_direita.'
				<select '.$campoLivre.' '.$disabled.' style="width: 100%" '.( $tipo === 'select_multiple' ? 'multiple' : ''  ).' '.$required.' name="'.$nome_no_banco_de_dados.''.( $tipo === 'select_multiple' ? '[]' : ''  ).'" id="'.$nome_no_banco_de_dados.'" class="js-example-basic-single '.$cssAdicionalInput.'" style="width:10px !important;"><option value=""></option>'.$option.'</select>'.$msg_base.'</div>';
				break;



			case 'radio_image':

				$option = '';
				foreach( ConsultasRepositore::ConsultasRepositore($tabela_relacional) as $dado ){
					$selecionado = ( $valor_inicial === $dado['value'] ? 'selected="selected"' : 'vazio' );
					$option .= '<option '.$selecionado.' value="'.$dado['value'].'">'.$dado['label_1'].( isset($dado['label_2']) ? ' - ' . $dado['label_2'] : '' ).'</option>';
				}

				$retorno = '<div class="form-group col-sm-'.$formulario.'">
					'.trataTraducoes($label).'
					'.$label_botao_direita.'
				<select '.$campoLivre.' '.$disabled.' style="width: 100%" '.( $tipo === 'select_multiple' ? 'multiple' : ''  ).' '.$required.' name="'.$nome_no_banco_de_dados.''.( $tipo === 'select_multiple' ? '[]' : ''  ).'" id="'.$nome_no_banco_de_dados.'" class="js-example-basic-single '.$cssAdicionalInput.'" style="width:10px !important;"><option value=""></option>'.$option.'</select>'.$msg_base.'</div>';
				break;



			case 'optgroup':

				$option = '';
				$valor_relacional = ConsultasRepositore::ConsultasRepositore($tabela_relacional);
				foreach($valor_relacional  as $dado ){
					$option .= '<optgroup label="'.$dado['label_1'].'">';
					foreach($dado[$chave_tabela_relacional] as $filhos ){
						$selecionado = ( $valor_inicial === $filhos['value'] ? 'selected="selected"' : 'vazio' );
						$option .= '<option '.$selecionado.' value="'.$filhos['value'].'">'.$filhos['label_1'].( isset($filhos['label_2']) ? ' - ' . $filhos['label_2'] : '' ).'</option>';
					}
					$option .= '</optgroup>';
				}

				$retorno = '<div class="form-group col-sm-'.$formulario.'">
					'.trataTraducoes($label).'
					'.$label_botao_direita.'
				<select '.$campoLivre.' '.$disabled.' style="width: 100%" '.( $tipo === 'select_multiple' ? 'multiple' : ''  ).' '.$required.' name="'.$nome_no_banco_de_dados.''.( $tipo === 'select_multiple' ? '[]' : ''  ).'" id="'.$nome_no_banco_de_dados.'" class="js-example-basic-single '.$cssAdicionalInput.'" style="width:10px !important;"><option value=""></option>'.$option.'</select>'.$msg_base.'</div>';
				break;



			case 'textarea':
				$retorno = '<div class="form-group row">';
				if( !empty($label) ){
					$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				}
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				if( $editor ){
					$retorno .= '<textarea name="'.$nome_no_banco_de_dados.'" id="'.$nome_no_banco_de_dados.'" class="'.$editor.'">'.$valor_inicial.'</textarea>';
				} else {
					$retorno .= '<textarea '.$campoLivre.' style="width: 100% !important" '.$required.' style="'.$style.'" name="'.$nome_no_banco_de_dados.'" class="'.$editor.' form-control" data-sample-short rows="'.$rowsTextarea.'">'.$valor_inicial.'</textarea>';
				}
				$retorno .= $msg_base;

				$retorno .= "
					<script>
						CKEDITOR.replace( '".$nome_no_banco_de_dados."', {
						language: 'pt-br',
						toolbar:[['Cut','Copy','Paste','-','Undo','Redo','RemoveFormat','-','Link','Unlink','-','Table','HorizontalRule','-','Format','Bold','Italic','Underline','-','Superscript','-',['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],'-','NumberedList','BulletedList','-','Outdent','Indent']],
						});
					</script>
				";

				$retorno .= '</div>';
				$retorno .= '</div>';
			break;

			case 'search':

				$option = '';
				foreach( ConsultasRepositore::ConsultasRepositore($tabela_relacional) as $dado ){
					$selecionado = ( $valor_inicial === $dado['value'] ? 'selected="selected"' : '' );
					$option .= '<option '.$selecionado.' value="'.$dado['value'].'|'.$dado['label_1'].'" class="form-control">'.$dado['label_1'].'</option>';
				}

				$retorno = '<div class="form-group col-sm-'.$formulario.'">
					
						'.trataTraducoes($label).'
						'.$label_botao_direita.'

					<input '.$campoLivre.' autocomplete="off" '.$required.' '.$readonly.' value="'.$valor_inicial.'" '.$minlength.' '.$maxlength.' name="'.$nome_no_banco_de_dados.'" id="'.$nome_no_banco_de_dados.'" type="search" class="'.$mascara.' '.$cssAdicionalInput.'" value="'.$data['value'].'" list="busca_'.$nome_no_banco_de_dados.'">
					'.$msg_base.'
					<datalist id="busca_'.$nome_no_banco_de_dados.'">
					<option class="form-control" value="">Digite aqui</option>
					'.$option.'
					</datalist>
					'.$msg_base.'
					</div>';
				break;



			case 'password':
				$retorno = '<div class="form-group row">
							<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes('Senha').'</label>
							<div class="col-sm-'.$tamDiv.'">
							<input '.$campoLivre.' autocomplete="off" '.$required.' '.$readonly.' '.$minlength.' '.$maxlength.' name="'.$nome_no_banco_de_dados.'" type="password" id="senha" onkeyup="javascript:verifica()" class="'.$cssAdicionalInput.'" value="">
							</div>
							</div>';

				if( $confirmacao === 0 ){
				$retorno .= '<div class="form-group row">
							<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes('Confirme sua senha').'</label>
							<div class="col-sm-'.$tamDiv.'">
							<input '.$campoLivre.' autocomplete="off" '.$required.' '.$readonly.' '.$minlength.' '.$maxlength.' name="re-'.$nome_no_banco_de_dados.'" type="password" id="senha" onkeyup="javascript:verifica()" class="'.$cssAdicionalInput.'" value="">
							</div>
							</div>';

				$retorno .= '<div class="form-group row">
							<label class="col-sm-'.$tamLabel.' col-form-label"></label>
							<div class="col-sm-'.$tamDiv.'">
							<script src="'.url('assets/backend/js/jquery.complexify.js').'"></script>
							<script type="text/javascript">$(function () {$("#'.$nome_no_banco_de_dados.'").complexify({}, function (valid, complexity) {});});
							</script>
							<script>
								$(function (){
							  $("#senha").keyup(function (e){
							      var senha = $(this).val();        
							      if(senha == ""){
							        $("#senhaBarra").hide();
							      }else{
							        var fSenha = forcaSenha(senha);
							        var texto = "";
							        $("#senhaForca").css("width", fSenha+"%");
							        $("#senhaForca").removeClass();
							        $("#senhaForca").addClass("progress-bar");
							        if(fSenha <= 40){
							            texto = "'.trataTraducoes('Senha fraca').'";
							            $("#senhaForca").addClass("progress-bar-danger");
							        }
							        
							        if(fSenha > 40 && fSenha <= 70){
							            texto = "'.trataTraducoes('Senha média').'";
							        }
							        
							        if(fSenha > 70 && fSenha <= 90){
							            texto = "'.trataTraducoes('Senha boa').'";
							            $("#senhaForca").addClass("progress-bar-success");
							        }
							        
							        if(fSenha > 90){
							            texto = "'.trataTraducoes('Senha muito boa').'";
							            $("#senhaForca").addClass("progress-bar-success");
							        }
							        
							        $("#senhaForca").text(texto);
							        
							        $("#senhaBarra").show();
							      }
							    });
							});
							    
							function forcaSenha(senha){
							    var forca = 0;
							    
							    var regLetrasMa     = /[A-Z]/;
							    var regLetrasMi     = /[a-z]/;
							    var regNumero       = /[0-9]/;
							    var regEspecial     = /[!@#$%&*?]/;
							    
							    var tam         = false;
							    var tamM        = false;
							    var letrasMa    = false;
							    var letrasMi    = false;
							    var numero      = false;
							    var especial    = false;

							//    console.clear();
							//	  console.log("senha: "+senha);

							    if(senha.length >= 6) tam = true;
							    if(senha.length >= 10) tamM = true;
							    if(regLetrasMa.exec(senha)) letrasMa = true;
							    if(regLetrasMi.exec(senha)) letrasMi = true;
							    if(regNumero.exec(senha)) numero = true;
							    if(regEspecial.exec(senha)) especial = true;
							    
							    if(tam) forca += 10;
							    if(tamM) forca += 10;
							    if(letrasMa) forca += 10;
							    if(letrasMi) forca += 10;
							    if(letrasMa && letrasMi) forca += 20;
							    if(numero) forca += 20;
							    if(especial) forca += 20;
							        
							//    console.log("força: "+forca);
							    
							    return forca;
							}
							</script>
							<div style="height: 20px !important; background-color: #f8f8f8 !important; width:100%; margin:auto; border-radius: 50px;">
							<barraProgresso id="senhaBarra" class="progress" style="display: none; border-radius: 50px;">
							<barraProgresso id="senhaForca" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%; border-radius: 50px;"></barraProgresso>
							</barraProgresso>
							</div>
							</div>
							</div>
							';
				}
				break;
	


			case 'checkbox':
				// $option = '';
				// foreach( ConsultasRepositore::ConsultasRepositore($tabela_relacional) as $dado ){
				// 	$selecionado = ( $valor_inicial === $dado['value'] ? 'selected="selected"' : 'vazio' );
				// 	$option .= '<option '.$selecionado.' value="'.$dado['value'].'">'.trataTraducoes($dado['label_1']).( isset($dado['label_2']) ? ' - ' . trataTraducoes($dado['label_2']) : '' ).'</option>';
				// }

				$retorno = '<div class="form-group col-sm-'.$formulario.'">
					'.trataTraducoes($label).'
					'.$label_botao_direita.'
				<input '.$campoLivre.' type="checkbox" name="'.$nome_no_banco_de_dados.'[]" id="'.$nome_no_banco_de_dados.'[]" value="'.$valor_inicial.'" '.( !empty($data['checked']) ? ' checked="checked"' : '' ).' class=" '.$cssAdicionalInput.'" />
				</div>';
				break;
			

			
			case 'hidden':
				$retorno = '<input '.$campoLivre.' type="hidden" value="'.$valor_inicial.'" name="'.$nome_no_banco_de_dados.'">';
				break;
			

			
			case 'vazio':
				$retorno = '<div class="form-group col-sm-'.$formulario.'">'.trataTraducoes($label).'</div>';
				break;
			

			
			case 'labelComTexto':
				$retorno = '
					<div class="form-group col-sm-'.$formulario.'">
					'.trataTraducoes($label).'
					'.$label_botao_direita.'
					<div class="col-sm-12 '.$cssAdicionalInput.'">
					'.$valor_inicial.'
					</div>
					</div>';
				$retorno = '<div class="form-group row">';
				if( !empty($label) ){
					$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				}
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				$retorno .= trataTraducoes($valor_inicial);
				$retorno .= trataTraducoes($msg_base);
				$retorno .= '</div>';
				$retorno .= '</div>';
				break;
			

			
			case 'exibeImagem':
				$retorno = '
					<div class="form-group col-sm-'.$formulario.'"> '.trataTraducoes($label).' '.$label_botao_direita.'
						<div class="col-sm-12 '.$cssAdicionalInput.'">
							'.( is_array($valor_inicial) ? $valor_inicial[1] : $valor_inicial ).' <img src="'.( is_array($valor_inicial) ? $valor_inicial[0] : $valor_inicial ).'" style="height: 150px;" />
						</div>
					</div>';
				// $retorno = '<div class="form-group row">';
				// $retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				// $retorno .= '<div class="col-sm-'.$tamDiv.'">';
				// $retorno .= trataTraducoes($valor_inicial);
				// $retorno .= trataTraducoes($msg_base);
				// $retorno .= '</div>';
				// $retorno .= '</div>';
				break;
			

			
			case 'upload_com_previa':
				$retorno = '<div class="form-group col-sm-'.$formulario.'" style="text-align: center !important">
					'.trataTraducoes($label).'
					'.$label_botao_direita.'
				<input '.$campoLivre.' '.$required.' value="'.$valor_inicial.'" name="'.$nome_no_banco_de_dados.'" id="'.$nome_no_banco_de_dados.'" type="file" class="'.$cssAdicionalInput.'">'.$msg_base.'
				<img src="'.url("sem_imagem.png").'" style="margin-top: 65px; max-height: 250px;">
				<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.js"></script>
				<script type="text/javascript" src="/js/previa_imagem_upload.js"></script>
				</div>';
				break;
			
			// default:
			// 	$retorno = '
			// 		<div class="form-group row">
			// 			<label class="col-sm-'.$tamLabel.' col-form-label">campo 1</label>
			// 			<div class="col-sm-'.$tamDiv.'">
			// 				<input type="text" class="form-control">
			// 			</div>
			// 		</div>
			// 	';
			// break;


			case 'switch':
				$retorno = '';

				if( $tamanhoCheio === 1 ){
				$retorno .= '<div class="form-group row">';
				if( !empty($label) ){
					$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				}
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				}

				$retorno .= '<div class="form-group col-sm-'.$formulario.'">';

				if( $tamanhoCheio === 0 ){
				$retorno .= trataTraducoes($label);
				}

				$retorno .= $label_botao_direita;
				$retorno .= '<style>.onoffswitch-inner:before { content: "'.trataTraducoes('S').'";}.onoffswitch-inner:after {content: "'.trataTraducoes('N').'";}</style>';
				$retorno .= '<div class="onoffswitch">';
				$retorno .= '<input '.$checked.' type="checkbox" class="onoffswitch-checkbox" id="'.$nome_no_banco_de_dados.$valor_inicial.'" name="'.$nome_no_banco_de_dados.'[]" value="'.$valor_inicial.'">';
				if( !empty($label) ){
					$retorno .= '<label class="onoffswitch-label" for="'.$nome_no_banco_de_dados.$valor_inicial.'">';
				}
				$retorno .= '<span class="onoffswitch-inner"></span>';
				$retorno .= '<span class="onoffswitch-switch"></span>';
				$retorno .= '</label>';
				$retorno .= '</div>';

				$retorno .= '</div>';
				if( $tamanhoCheio === 1 ){
				$retorno .= '</div>';
				$retorno .= '</div>';
				}
				break;



			case 'numberAdicionaRemove':

				$retorno = '<div class="form-group row">';
				if( !empty($label) ){
					$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				}
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				$retorno .= '<div class="row">';
				$retorno .= '<div class="col-sm-'.$tamLabel.'">';
				$retorno .= '<a onclick="menos()" class="btn btn-white btn-block"><i class="fa fa-minus"></i></a>';
				$retorno .= '</div>';
				$retorno .= '<div class="col-sm-8">';
				$retorno .= '<input autocomplete="off" placeholder="'.trataTraducoes($placeholder).'" min="'.$min.'" id="'.$nome_no_banco_de_dados.'" name="'.$nome_no_banco_de_dados.'" type="number" class="'.$mascara.' '.$cssAdicionalInput.'" style="width: 100% !important; text-align: center !important; '.$style.'" required="required">';
				$retorno .= '</div>';
				$retorno .= '<div class="col-sm-'.$tamLabel.'">';
				$retorno .= '<a onclick="mais()" class="btn btn-white btn-block"><i class="fa fa-plus"></i></a>';
				$retorno .= '</div>';
				$retorno .= '</div>';
				$retorno .= '<script type="text/javascript">';
				$retorno .= 'function mais(){';
				$retorno .= 'var atual = document.getElementById("qdade").value;';
				$retorno .= 'var novo = atual - (-1);';
				$retorno .= 'document.getElementById("qdade").value = novo;';
				$retorno .= '}';
				$retorno .= 'function menos(){';
				$retorno .= 'var atual = document.getElementById("qdade").value;';
				$retorno .= 'if(atual > 1) {';
				$retorno .= 'var novo = atual - 1;';
				$retorno .= 'document.getElementById("qdade").value = novo;';
				$retorno .= '}';
				$retorno .= '}';
				$retorno .= '</script>';
				$retorno .= '</div>';
				$retorno .= '</div>';
				break;



			default:
				$retorno = '<div class="form-group row">';
				if( !empty($label) ){
					$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				}
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				
				if( !empty($icone) ){
				$retorno .= '<div class="input-group m-b">';
				$retorno .= '<div class="input-group-prepend">';
				$retorno .= '<span class="input-group-addon">';
				switch ($icone['tipo']) {
					case 'imagem':
						$retorno .= '<img src="'.$icone['arquivo'].'" style="height: 15px !important;">';
						break;

					case 'letra':
						$retorno .= '<span style="font-weight: bold">'.$icone['arquivo'].'</span>';
						break;
					
					default:
						$retorno .= '<i class="'.$icone['arquivo'].'"></i>';
						break;
				}
				$retorno .= '</span></div>';
				}

				$retorno .= '<input '.$campoLivre.' autocomplete="off" '.$required.' '.$readonly.' value="'.$valor_inicial.'" '.$minlength.' '.$maxlength.' '.$multiple.'  name="'.$nome_no_banco_de_dados.''.( !empty($multiple) ? '[]' : Null ).'" id="'.$nome_no_banco_de_dados.'" type="'.$tipo.'" class="'.$mascara.' '.$cssAdicionalInput.' form-control" min="'.$min.'" max="'.$max.'" style="'.$style.'" />';

				if( !empty($icone) ){
				$retorno .= '</div>';
				}

				$retorno .= $msg_base;
				$retorno .= '</div>';
				$retorno .= '</div>';
			break;
		}

		return $retorno;
	}



































	static function camposParaContrato($tipo){
		switch ($tipo) {
			case 'loja_veiculos_usados':
				$data = "
						<div class='nav-tabs-custom' style='background-color: #fff'>
							<ul class='nav nav-tabs'>
								<li class='active'><a href='#formatacoes' data-toggle='tab' aria-expanded='false'>".trataTraducoes('Formatações')."</a></li>
								<li class=''><a href='#comprador' data-toggle='tab' aria-expanded='false'>".trataTraducoes('Comprador')."</a></li>
								<li class=''><a href='#vendedor' data-toggle='tab' aria-expanded='false'>".trataTraducoes('Vendedor')."</a></li>
								<li class=''><a href='#veiculos' data-toggle='tab' aria-expanded='false'>".trataTraducoes('Veículos')."</a></li>
								<li class=''><a href='#campos_extras' data-toggle='tab' aria-expanded='false'>".trataTraducoes('Campos extras')."</a></li>
								<li class='active pull-right' style='font-weight: bold; padding: 9px;'>".trataTraducoes('Tags para contrato')."</li>
							</ul>
							<div class='tab-content'>
								<div class='tab-pane active' id='formatacoes'>
									<div class='col-sm-6'>
										<div class='col-sm-12'>".trataTraducoes('Necessitam estar no começo e no final do texto ou frase')."</div>
										<div class='col-sm-12'>&nbsp;</div>
										<div class='col-sm-4'>||negrito||</div>
										<div class='col-sm-4'>||alinha_centro||</div>
										<div class='col-sm-4'>||alinha_direita||</div>
									</div>
								</div>
								<div class='tab-pane' id='comprador'>
									<div class='col-sm-12'>".trataTraducoes('Substitua o campo abaico onde precisará ser inserido os dados').". <br />".trataTraducoes('Ex: No seu contrato, onde terá "Nome do comprador" você deverá substituir por')." ''||comprador_name||'' ".trataTraducoes('Sem aspas')."</div>
									<div class='col-sm-12'>&nbsp;</div>
									<div class='col-sm-4'>||comprador_name||</div>
									<div class='col-sm-4'>||comprador_email||</div>
									<div class='col-sm-4'>||comprador_cpf_cnpj||</div>
									<div class='col-sm-4'>||comprador_rg_ie||</div>
									<div class='col-sm-4'>||comprador_nascimento_fundacao||</div>
									<div class='col-sm-4'>||comprador_cep||</div>
									<div class='col-sm-4'>||comprador_logradouro||</div>
									<div class='col-sm-4'>||comprador_numero||</div>
									<div class='col-sm-4'>||comprador_complemento||</div>
									<div class='col-sm-4'>||comprador_bairro||</div>
									<div class='col-sm-4'>||comprador_cidade||</div>
									<div class='col-sm-4'>||comprador_estado||</div>
									<div class='col-sm-4'>||comprador_fone_1||</div>
									<div class='col-sm-4'>||comprador_fone_2||</div>
									<div class='col-sm-4'>||comprador_fone_3||</div>
									<div class='col-sm-4'>||comprador_fone_4||</div>
								</div>
								<div class='tab-pane' id='vendedor'>
									<div class='col-sm-12'>".trataTraducoes('Substitua o campo abaico onde precisará ser inserido os dados')." <br />".trataTraducoes('Ex: No seu contrato, onde terá "Nome do seu cliente" você deverá substituir por')." ''||comprador_name||'' ".trataTraducoes('Sem aspas')."</div>
									<div class='col-sm-12'>&nbsp;</div>
									<div class='col-sm-4'>||vendedor_name||</div>
									<div class='col-sm-4'>||vendedor_email||</div>
									<div class='col-sm-4'>||vendedor_cpf_cnpj||</div>
									<div class='col-sm-4'>||vendedor_rg_ie||</div>
									<div class='col-sm-4'>||vendedor_nascimento_fundacao||</div>
									<div class='col-sm-4'>||vendedor_cep||</div>
									<div class='col-sm-4'>||vendedor_logradouro||</div>
									<div class='col-sm-4'>||vendedor_numero||</div>
									<div class='col-sm-4'>||vendedor_complemento||</div>
									<div class='col-sm-4'>||vendedor_bairro||</div>
									<div class='col-sm-4'>||vendedor_cidade||</div>
									<div class='col-sm-4'>||vendedor_estado||</div>
									<div class='col-sm-4'>||vendedor_fone_1||</div>
									<div class='col-sm-4'>||vendedor_fone_2||</div>
									<div class='col-sm-4'>||vendedor_fone_3||</div>
									<div class='col-sm-4'>||vendedor_fone_4||</div>
								</div>
								<div class='tab-pane' id='veiculos'>
									<div class='col-sm-12'>".trataTraducoes('Substitua o campo abaico onde precisará ser inserido os dados')." <br />".trataTraducoes('ex_no_seu_contrato_onde_tera_a_placa_ABC1234_voce_devera_substituir_por')." ''||veiculos_placa||'' ".trataTraducoes('Sem aspas')."</div>
									<div class='col-sm-12'>&nbsp;</div>
									<div class='col-sm-4'>||veiculos_tipo||</div>
									<div class='col-sm-4'>||veiculos_nome||</div>
									<div class='col-sm-4'>||veiculos_ano_fabricacao||</div>
									<div class='col-sm-4'>||veiculos_ano_carro||</div>
									<div class='col-sm-4'>||veiculos_cambio||</div>
									<div class='col-sm-4'>||veiculos_km||</div>
									<div class='col-sm-4'>||veiculos_placa||</div>
									<div class='col-sm-4'>||veiculos_cor||</div>
									<div class='col-sm-4'>||veiculos_carroceria||</div>
									<div class='col-sm-4'>||veiculos_portas||</div>
									<div class='col-sm-4'>||veiculos_motor||</div>
									<div class='col-sm-4'>||veiculos_cilindros||</div>
									<div class='col-sm-4'>||veiculos_combustivel||</div>
									<div class='col-sm-4'>||veiculos_chassi||</div>
									<div class='col-sm-4'>||veiculos_renavam||</div>
									<div class='col-sm-4'>||veiculos_montadora||</div>
									<div class='col-sm-4'>||veiculos_modelo||</div>
									<div class='col-sm-4'>||veiculos_versao||</div>
									<div class='col-sm-4'>||veiculos_valor||</div>
									<div class='col-sm-4'>||veiculos_valor_extenso||</div>
								</div>
								<div class='tab-pane' id='veiculos_troca'>
									<div class='col-sm-12'>".trataTraducoes('Substitua o campo abaico onde precisará ser inserido os dados')." <br />".trataTraducoes('ex_no_seu_contrato_onde_tera_a_placa_ABC1234_voce_devera_substituir_por')." ''||veiculos_placa||'' ".trataTraducoes('Sem aspas')."</div>
									<div class='col-sm-12'>&nbsp;</div>
									<div class='col-sm-4'>||veiculos_troca_tipo||</div>
									<div class='col-sm-4'>||veiculos_troca_nome||</div>
									<div class='col-sm-4'>||veiculos_troca_ano_fabricacao||</div>
									<div class='col-sm-4'>||veiculos_troca_ano_carro||</div>
									<div class='col-sm-4'>||veiculos_troca_cambio||</div>
									<div class='col-sm-4'>||veiculos_troca_km||</div>
									<div class='col-sm-4'>||veiculos_troca_placa||</div>
									<div class='col-sm-4'>||veiculos_troca_cor||</div>
									<div class='col-sm-4'>||veiculos_troca_carroceria||</div>
									<div class='col-sm-4'>||veiculos_troca_portas||</div>
									<div class='col-sm-4'>||veiculos_troca_motor||</div>
									<div class='col-sm-4'>||veiculos_troca_cilindros||</div>
									<div class='col-sm-4'>||veiculos_troca_combustivel||</div>
									<div class='col-sm-4'>||veiculos_troca_chassi||</div>
									<div class='col-sm-4'>||veiculos_troca_renavam||</div>
									<div class='col-sm-4'>||veiculos_troca_montadora||</div>
									<div class='col-sm-4'>||veiculos_troca_modelo||</div>
									<div class='col-sm-4'>||veiculos_troca_versao||</div>
									<div class='col-sm-4'>||veiculos_troca_valor||</div>
									<div class='col-sm-4'>||veiculos_troca_valor_extenso||</div>
								</div>
								<div class='tab-pane' id='campos_extras'>
									<div class='col-sm-12'>".trataTraducoes('Substitua o campo abaico onde precisará ser inserido os dados')." <br />".trataTraducoes('Ex: No seu contrato, onde terá o "valor" você deverá substituir por')." ''||pagamento_valor||'' ".trataTraducoes('Sem aspas')."</div>
									<div class='col-sm-12'>&nbsp;</div>
									<div class='col-sm-4'>||pagamento_valor||</div>
									<div class='col-sm-4'>||pagamento_valor_extenso||</div>
									<div class='col-sm-4'>||contrato_dia||</div>
									<div class='col-sm-4'>||contrato_mes||</div>
									<div class='col-sm-4'>||contrato_ano||</div>
									<div class='col-sm-4'>||checklist_saida||</div>
									<div class='col-sm-4'>||checklist_documentacao||</div>
								</div>
							</div>
						</div>";
				break;
			
			case 'recibo_geral':
				$data = "
						<div class='nav-tabs-custom' style='background-color: #fff'>
							<ul class='nav nav-tabs'>
								<li class='active'><a href='#formatacoes' data-toggle='tab' aria-expanded='false'>".trataTraducoes('Formatações')."</a></li>
								<li class=''><a href='#cliente' data-toggle='tab' aria-expanded='false'>".trataTraducoes('Cliente')."</a></li>
								<li class='active pull-right' style='font-weight: bold; padding: 9px;'>".trataTraducoes('Tags para recibo')."</li>
							</ul>
							<div class='tab-content'>
								<div class='tab-pane active' id='formatacoes'>
									<div class='col-sm-6'>
										<div class='col-sm-12'>".trataTraducoes('Necessitam estar no começo e no final do texto ou frase')."</div>
										<div class='col-sm-12'>&nbsp;</div>
										<div class='col-sm-4'>||negrito||</div>
										<div class='col-sm-4'>||alinha_centro||</div>
										<div class='col-sm-4'>||alinha_direita||</div>
									</div>
								</div>
								<div class='tab-pane' id='cliente'>
									<div class='col-sm-12'>".trataTraducoes('Substitua o campo abaico onde precisará ser inserido os dados')." <br />".trataTraducoes('Ex: no seu contrato onde terá o "nome do seu cliente" você deverá substituir por')." ''||cliente_name||'' ".trataTraducoes('Sem aspas')."</div>

									<div class='col-sm-12'>&nbsp;</div>
									<div class='col-sm-4'>||cliente_name||</div>
									<div class='col-sm-4'>||cliente_email||</div>
									<div class='col-sm-4'>||cliente_cpf_cnpj||</div>
									<div class='col-sm-4'>||cliente_rg_ie||</div>
									<div class='col-sm-4'>||cliente_nascimento_fundacao||</div>
									<div class='col-sm-4'>||cliente_cep||</div>
									<div class='col-sm-4'>||cliente_logradouro||</div>
									<div class='col-sm-4'>||cliente_numero||</div>
									<div class='col-sm-4'>||cliente_complemento||</div>
									<div class='col-sm-4'>||cliente_bairro||</div>
									<div class='col-sm-4'>||cliente_cidade||</div>
									<div class='col-sm-4'>||cliente_estado||</div>
									<div class='col-sm-4'>||cliente_fone_1||</div>
									<div class='col-sm-4'>||cliente_fone_2||</div>
									<div class='col-sm-4'>||cliente_fone_3||</div>
									<div class='col-sm-4'>||cliente_fone_4||</div>
								</div>
							</div>
						</div>";
				break;
			
			default:
				$data = '';
				break;
		}
		return $data;
	}
};