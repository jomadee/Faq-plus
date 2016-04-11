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

if(!isset($llTable)){
    $llTable = PREFIXO . "faqplus";}

$modo = (isset($modo)? '.'. $modo: '');

if(isset($_GET['p']) && file_exists(($f = $_ll['app']['pasta'] . 'paginas/'. $_GET['p']. $modo. '.php'))) require $f;