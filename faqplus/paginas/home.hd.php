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

ll::api('navigi');

$botoes[] = (array('href' => $_ll['app']['onserver'] . '&p=configurar&ac=nova', 'fa' => 'fa-folder-o', 'title' => 'Criar grupo', 'attr' => "class='novaCtg'"));