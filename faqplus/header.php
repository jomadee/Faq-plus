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
$apigem = new api; 
$apigem->iniciaApi('navigi');

$_GET['p'] = (isset($_GET['p'])? $_GET['p']: 'home');
$modo = 'hd';

require dirname(__FILE__). '/load.php';