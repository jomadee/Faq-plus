<?php
/**
 *
 * FAQ plus -  lliure 8.x
 *
 * @Vers�o 4.0
 * @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
 * @Entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br
 * @Licen�a http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

switch(isset($_GET['ac']) ? $_GET['ac'] : 'home'){


    case 'grava':

        $id = $_GET['id'];

        $_POST['data_up'] = time();

        jf_update(PREFIXO.'faqplus_perguntas', $_POST, array('id' => $id));

        $_SESSION['aviso'] = array('Altera��o realizada com sucesso!', 1);

        header('Location: '. $_ll['app']['home']. '&p=pergunta&id=' . $id);

    break;

    case 'nova':

        jf_insert(PREFIXO.'faqplus_perguntas', array('nome' => 'Nova pergunta', 'categoria' => $_GET['ctg'], 'data' => time()));

    break;
}