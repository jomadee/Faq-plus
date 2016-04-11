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

$permicao = null;

if (isset($_GET['ctg'])) {
	$categoria = mysql_fetch_assoc(mysql_query('select * from ' . $llTable . '_categorias where id = "' . $_GET['ctg'] . '" limit 1'));
	$permicao = explode('>', $categoria['permissoes']);
	$permicao = $permicao[0];
}?>

<div class="boxCenter900 boxPadrao">
	<?php if (isset($categoria)) { ?>
		<h2><?php echo $categoria['nome']; ?></h2>
		<div class="menu">
			<h2>Opções</h2>
			<ul>
				<?php
				if ($permicao == "0") {
					echo '<li><a href="' . $_ll['app']['onserver'] . '&p=configurar&ac=nova' . (isset($_GET['ctg']) ? '&ctg=' . $_GET['ctg'] : '') . '" class="novaCtg"> <i class="fa fa-folder-o"></i> Criar categoria</a></li>';
				} elseif ($permicao == 1) {
					echo '<li><a href="' . $_ll['app']['onserver'] . '&p=pergunta&ac=nova&ctg=' . $_GET['ctg'] . '" class="novaPgt"> <i class="fa fa-question"></i> Criar pergunta</a></li>';
				}

				if (isset($_GET['ctg']) && ll_tsecuryt())
					echo '<li><a href="' . $_ll['app']['home'] . '&p=configurar&ctg=' . $_GET['ctg'] . '"> <i class="fa fa-cog"></i> Configurações</a></li>';
				?>
			</ul>
		</div>
	<?php }?>

	<div class="alinhador <?php echo(!isset($categoria) ? 'inicial' : '') ?>">
		<?php
		$navegador = new navigi();
		
		if ($permicao == 1) {			
			$navegador->tabela = $llTable . '_perguntas';
			$navegador->query = 'select * from ' . $navegador->tabela . ' where categoria = "' . $_GET['ctg'] . '"';
			$navegador->exibicao = 'lista';
			$navegador->delete = true;
			$navegador->rename = true;
			$navegador->config = array(
				'link' => $_ll['app']['home'] . '&p=pergunta&id=',
				'fa' => 'fa-folder-o'
			);

		} else {
			$navegador->tabela = $llTable . '_categorias';
			$navegador->query = 'select * from ' . $navegador->tabela . ' where ' . (isset($_GET['ctg']) ? 'categoria = "' . $_GET['ctg'] . '"' : 'categoria is null');
			$navegador->exibicao = (!isset($categoria) ? 'icone' : 'lista');
			$navegador->delete = true;
			$navegador->rename = true;
			$navegador->config = array(
				'link' => $_ll['app']['home'] . '&ctg=',
				'fa' => 'fa-folder-o'
			);
		}
		
		$navegador->monta();
		?>
	</div>
</div>

<script type="text/javascript">
	$('.novaCtg').click(function () {
		ll_load($(this).attr('href'), function () {
			navigi_start();
		});

		return false;
	});

	$('.novaPgt').click(function () {
		ll_load($(this).attr('href'), function () {
			navigi_start();
		});

		return false;
	});
</script>