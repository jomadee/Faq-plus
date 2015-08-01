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
	$dados = mysql_fetch_assoc(mysql_query('select * from '.$llTable.'_perguntas where id = "'.$_GET['id'].'" limit 1'));
	?>
	<div class="boxCenter">
		<form class="form" method="post" action="<?php echo $llPasta.'pergunta.php?ac=grava&id='.$_GET['id'];?>">
			<fieldset>
				<div>
					<label>Pergunta</label>
					<input type="text"  <?php $item = 'nome';  echo 'name="'.$item.'"'.(isset($dados[$item])?'value="'.htmlspecialchars($dados[$item]).'"': '') ?> />
				</div>
				
				<div>
					<label>Resposta</label>
					<textarea name="resposta"><?php echo $dados['resposta'];?></textarea>
				</div>
			</fieldset>
			
			<div class="botoes">
				<button type="submit">Gravar</button>
				<a href="<?php echo $backReal?>">Voltar</a>
			</div>
		</form>
	</div>
	
	<script type="text/javascript">		
		tinyMCE.init({
			// General options
			mode : "textareas",
			theme : "lliure",
			width: '100%',
			height: '200px',

			plugins : "safari,pagebreak,style,layer,advhr,advimage,advlink,iespell,inlinepopups,preview,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,nonbreaking,xhtmlxtras",

			// Theme options
			theme_advanced_buttons1 : "cut,copy,paste,|,formatselect,|,bold,italic,underline,strikethrough,|,bullist,numlist,|,forecolor,backcolor,|,link,|,code,removeformat,fullscreen",
			theme_advanced_buttons2 : "",
			
			theme_advanced_buttons3 : "",

			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_resizing : true,

			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",
			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234",
				
			}
		});
	</script>
	<?php	
	break;
	
	
case 'grava':
	require_once("../../etc/bdconf.php");
	require_once("../../includes/jf.funcoes.php"); 

	$id = $_GET['id'];

	$_POST['data_up'] = time();
	
	jf_update(PREFIXO.'faqplus_perguntas', $_POST, array('id' => $id));
		
	$_SESSION['aviso'] = array('Alteração realizada com sucesso!', 1);	

	header('location: ../../index.php?app=faqplus&p=pergunta&id='.$id);
	break;
	
case 'novaPgt':
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	require_once("../../etc/bdconf.php"); 
	require_once("../../includes/jf.funcoes.php"); 
	
	jf_insert(PREFIXO.'faqplus_perguntas', array('nome' => 'Nova pergunta', 'categoria' => $_GET['ctg'], 'data' => time()));
	break;
}
?>


