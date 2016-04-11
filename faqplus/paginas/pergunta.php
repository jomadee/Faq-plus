<?php
/**
 *
 * FAQ plus -  lliure 8.x
 *
 * @Versão 4.0
 * @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
 * @Entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br
 * @Licença http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

switch(isset($_GET['ac']) ? $_GET['ac'] : 'home'){
case 'home':
	$dados = mysql_fetch_assoc(mysql_query('select * from '.$llTable.'_perguntas where id = "'.$_GET['id'].'" limit 1')); ?>

	<div class="boxCenter">
		<form class="form" method="post" action="<?php echo $_ll['app']['onserver']. '&p=pergunta&ac=grava&id='. $dados['id'];?>">
			<fieldset>
				<div>
					<label>Pergunta</label>
					<input type="text"  <?php $item = 'nome';  echo 'name="'.$item.'"'.(isset($dados[$item])?'value="'. $dados[$item] .'"': '') ?> />
				</div>
				
				<div>
					<label>Resposta</label>
					<textarea name="resposta"><?php echo $dados['resposta'];?></textarea>
				</div>
			</fieldset>
			
			<div class="botoes">
				<button type="submit">Gravar</button>
				<a href="<?php echo $backReal;?>">Voltar</a>
			</div>
		</form>
	</div>
	
	<script type="text/javascript">
		jQuery(function($){

			tinymce.init({
				selector: "textarea",
				plugins: [
					"advlist autolink autosave link lists hr",
					"code fullscreen nonbreaking"
				],

				toolbar1: "bold italic underline strikethrough removeformat | alignleft aligncenter alignright alignjustify | bullist numlist | link unlink | code",

				menubar: false,
				toolbar_items_size: 'small'
			});

		});
	</script>

	<?php
	break;

}