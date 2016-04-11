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

switch(isset($_GET['ac']) ? $_GET['ac'] : 'home') {

    case 'nova':

        header("Content-Type: text/html; charset=ISO-8859-1", true);

        if (isset($_GET['ctg'])) {
            $dados['categoria'] = $_GET['ctg'];

            $categoria = mysql_fetch_assoc(mysql_query('select * from ' . PREFIXO . 'faqplus_categorias where id = "' . $_GET['ctg'] . '" limit 1'));
            $permissoes = explode('>', $categoria['permissoes']);
            array_shift($permissoes);

            if (!empty($permissoes))
                $dados['permissoes'] = implode('>', $permissoes);
        }

        $dados['nome'] = 'Nova categoria';
        jf_insert(PREFIXO . 'faqplus_categorias', $dados);

    break;

    case 'grava':

        $id = $_GET['ctg'];
        jf_update(PREFIXO.'faqplus_categorias', $_POST, array('id' => $id));
        $_SESSION['aviso'] = array('Alteração realizada com sucesso!', 1);
        header('location: ' . $_ll['app']['home'] . '&p=configurar&ctg='. $id);

    break;

}