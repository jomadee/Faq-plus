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

$botoes = array_merge(array(

	array('href' => $backReal, 'fa' => 'fa-chevron-left', 'title' => $backNome)

), (isset($botoes)? $botoes: array()));

echo app_bar('FAQ plus', $botoes);

unset($modo);
require dirname(__FILE__). '/load.php';