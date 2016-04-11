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

$dados = mysql_fetch_assoc(mysql_query('select * from '.$llTable.'_categorias where id = "'.$_GET['ctg'].'" limit 1')); ?>

<div class="boxCenter">
    <form class="form" method="post" action="<?php echo $_ll['app']['onserver']. '&p=configurar&ac=grava&ctg='. $_GET['ctg'];?>">
        <fieldset>
            <div>
                <label>Nome</label>
                <input type="text"  <?php $item = 'nome';  echo 'name="'.$item.'" value="'.($dados[$item]).'"'; ?> />
            </div>

            <div>
                <label>Permissões</label>
                <input type="text"  <?php $item = 'permissoes';  echo 'name="'.$item.'" value="'.($dados[$item]).'"'; ?> />
                <span class="ex">Use <strong>1</strong> para categoria terminal, e <strong>0</strong> para categoria container. Para definir uma hierarquia separe por <strong>></strong></span>
            </div>
        </fieldset>

        <div class="botoes">
            <button type="submit">Gravar</button>
            <a href="<?php echo $backReal?>">Voltar</a>
        </div>
    </form>
</div>