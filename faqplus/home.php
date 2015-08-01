<?php
/**
*
* FAQ plus -  lliure 6.x
*
* @Versão 3.0
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @Entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br
* @Licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

switch(isset($_GET['ac']) ? $_GET['ac'] : 'home'){
case 'home':
	$permicao = null;

	if(isset($_GET['ctg'])){
		$categoria = mysql_fetch_assoc(mysql_query('select * from '.$llTable.'_categorias where id = "'.$_GET['ctg'].'" limit 1'));
	
		$permicao = explode('>', $categoria['permissoes']);
		$permicao = $permicao[0];
	}

	?>
	<div class="boxCenter900 boxPadrao">
		<?php
		if(isset($categoria)){
			echo '<h2>'.$categoria['nome'].'</h2>';
			?>
			<div class="menu">
				<h2>Opções</h2>			
				<ul>
					<?php					
					if($permicao == "0") {
						echo '<li><a href="'.$llPasta.'home.php?ac=novaCtg'.(isset($_GET['ctg']) ? '&ctg='.$_GET['ctg'] : '').'" class="novaCtg"> <img src="'.$plgIcones.'folder.png" alt="" /> Criar categoria</a></li>';
					} elseif($permicao == 1) {
						echo '<li><a href="'.$llPasta.'pergunta.php?ac=novaPgt&ctg='.$_GET['ctg'].'" class="novaCtg"> <img src="'.$plgIcones.'spechbubble_sq_line.png" alt="" /> Criar pergunta</a></li>';
					}
					
					if(isset($_GET['ctg']) && ll_tsecuryt())
						echo '<li><a href="'.$llHome.'&ac=configura&ctg='.$_GET['ctg'].'"> <img src="'.$plgIcones.'cog.png" alt="" /> Configurações</a></li>';
					?>
				</ul>			
			</div>
			<?php
		} else {
			echo app_bar_add(array('href' => $llPasta.'home.php?ac=novaCtg', 'img' => $plgIcones.'folder.png', 'title' => 'Criar grupo', 'attr' => "class='novaCtg'"));
		}
		?>
		
		<div class="alinhador <?php echo (!isset($categoria) ? 'inicial' : '') ?>">
			<?php
			if($permicao == 1){
				$navegador = new navigi();	
				$navegador->tabela = $llTable.'_perguntas';
				$navegador->query = 'select * from '.$navegador->tabela.' where categoria = "'.$_GET['ctg'].'"';
				$navegador->pasta = $llPasta;
				$navegador->exibicao = 'lista';
				$navegador->delete = true;
				$navegador->rename = true;
				$navegador->config = array(
						'link' => $llHome.'&p=pergunta&id=',
						'ico' => 'img/folder.png'
						);
				$navegador->monta();
			} else {
				$navegador = new navigi();	
				$navegador->tabela = $llTable.'_categorias';
				$navegador->query = 'select * from '.$navegador->tabela . ' where '.(isset($_GET['ctg']) ? 'categoria = "'.$_GET['ctg'].'"' : 'categoria is null');
				$navegador->pasta = $llPasta;
				$navegador->exibicao = !isset($categoria) ? 'icones' : 'lista';
				$navegador->delete = true;
				$navegador->rename = true;
				$navegador->config = array(
						'link' => $llHome.'&ctg=',
						'ico' => 'img/folder.png'
						);
				$navegador->monta();	
			}
			?>
		</div>
	</div>
	
	<script type="text/javascript">
		$('.novaCtg').click(function(){
			ll_load($(this).attr('href'), function(){
				navigi_start();
			});
			
			return false;
		});
		
		$('.novaPgt').click(function(){
			ll_load($(this).attr('href'), function(){
				navigi_start();
			});
			
			return false;
		});
	</script>
	
	<?php	
	break;
	

	
case 'novaCtg':
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	require_once("../../etc/bdconf.php"); 
	require_once("../../includes/jf.funcoes.php");
	
	if(isset($_GET['ctg'])){
		$dados['categoria'] = $_GET['ctg'];
		
		$categoria = mysql_fetch_assoc(mysql_query('select * from '.PREFIXO.'faqplus_categorias where id = "'.$_GET['ctg'].'" limit 1'));
		$permissoes = explode('>', $categoria['permissoes']);
		array_shift($permissoes);
		
		if(!empty($permissoes))
			$dados['permissoes'] = implode('>', $permissoes);
	}
	
	$dados['nome'] = 'Nova categoria';
	
	jf_insert(PREFIXO.'faqplus_categorias', $dados);
	
	break;
	
	
case 'configura':
	$dados = mysql_fetch_assoc(mysql_query('select * from '.$llTable.'_categorias where id = "'.$_GET['ctg'].'" limit 1'));
	?>
	<div class="boxCenter">
		<form class="form" method="post" action="<?php echo $llPasta.'home.php?ac=configura_grava&ctg='.$_GET['ctg'];?>">
			<fieldset>
				<div>
					<label>Nome</label>
					<input type="text"  <?php $item = 'nome';  echo 'name="'.$item.'" value="'.htmlspecialchars($dados[$item]).'"'; ?> />
				</div>
				
				<div>
					<label>Permissões</label>
					<input type="text"  <?php $item = 'permissoes';  echo 'name="'.$item.'" value="'.htmlspecialchars($dados[$item]).'"'; ?> />
					<span class="ex">Use <strong>1</strong> para categoria terminal, e <strong>0</strong> para categoria container. Para definir uma hierarquia separe por <strong>></strong></span>
				</div>
			</fieldset>
			
			<div class="botoes">
				<button type="submit">Gravar</button>
				<a href="<?php echo $backReal?>">Voltar</a>
			</div>
		</form>
	</div>

	<?php
	break;

case 'configura_grava':
	require_once("../../etc/bdconf.php");
	require_once("../../includes/jf.funcoes.php"); 

	$id = $_GET['ctg'];
	
	jf_update(PREFIXO.'faqplus_categorias', $_POST, array('id' => $id));
		
	$_SESSION['aviso'] = array('Alteração realizada com sucesso!', 1);	

	header('location: ../../index.php?app=faqplus&ac=configura&ctg='.$id);
	break;

}
?>
