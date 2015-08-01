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

$llHome = "?app=faqplus";
$llPasta = "app/faqplus/";
$llTable = PREFIXO."faqplus";

$botoes = array(
	array('href' => $backReal, 'img' => $plgIcones.'br_prev.png', 'title' => $backNome)
	);


echo app_bar('FAQ plus', $botoes);


$pagina = 'home';

if(isset($_GET['p']) && file_exists($llPasta.$_GET['p'].'.php'))
	$pagina =  $_GET['p'];

require_once($pagina.'.php');
?>
