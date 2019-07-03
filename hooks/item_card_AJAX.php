<?php
//
// Author: Alejandro Landini
//
//
// toDo:
// revision:
//
//
$cardDir = dirname(__FILE__);
include("$cardDir/../defaultLang.php");
include("$cardDir/../language.php");
include("$cardDir/../lib.php");

$id = intval($_REQUEST['id']);

$table_name = 'item';

if (!$id) {
    exit(error_message(sprintf($Translation['invalid id'],$table_name),'', false));
}
$table_from = get_sql_from($table_name);
if (!$table_from) {
    exit(error_message(sprintf($Translation['access denied'],$table_name),'', false));
}

$where_id = "AND item.id = $id";

//TODO: falta ver el member


$item = getDataTable($table_name, $where_id);

if (!$item){
    exit(error_message($Translation['No records found'],'', false));
}

ob_start();
?>
<!-- insert HTML code-->
<!--

<div class="col-md-8">
  <dl class="dl-horizontal">
    <dt class="item-titulo field-caption-tv">T&#237;tulo</dt>
    <dd id="item-titulo" class="item-titulo"> <a target="_blank" href="item_view.php?SelectedID=<?php echo $id; ?>">  <?php echo $item['titulo']; ?></a></dd>

    <dt class="item-descricao-caption field-caption-tv">Descri&#231;&#227;o:</dt>
    <dd id="item-descricao-<%%VALUE(id)%%>" class="item-descricao"><%%SELECT%%><%%VALUE(descricao)%%><%%ENDSELECT%%></dd>

    <dt class="item-identificacao-caption field-caption-tv">Identifica&#231;&#227;o:</dt>
    <dd id="item-identificacao-<%%VALUE(id)%%>" class="item-identificacao"><%%SELECT%%><%%VALUE(identificacao)%%><%%ENDSELECT%%></dd>

    <dt class="item-colecao-caption field-caption-tv">Cole&#231;&#227;o:</dt>
    <dd id="item-colecao-<%%VALUE(id)%%>" class="item-colecao"><%%SELECT%%><%%VALUE(colecao)%%><%%ENDSELECT%%></dd>
-->
<div class="col-md-10">
<dl class="dl-horizontal">
						<dt class="item-identificacao-caption field-caption-tv">Identifica&#231;&#227;o:</dt>
						<dd id="item-identificacao-<%%VALUE(id)%%>" class="item-identificacao"> <a target="_blank" href="item_view.php?SelectedID=<?php echo $id; ?>">  <?php echo $item['identificacao']; ?></a></dd>
						
						<dt class="item-titulo_atribuido-caption field-caption-tv">T&#237;tulo </dt>
						<dd id="item-titulo_atribuido-<%%VALUE(id)%%>" class="item-titulo_atribuido"> <a target="_blank" href="item_view.php?SelectedID=<?php echo $id; ?>">  <?php echo $item['titulo']; ?></a></dd>
						
						<dt class="item-descricao-caption field-caption-tv">Descri&#231;&#227;o:</dt>
						<dd id="item-descricao-<%%VALUE(id)%%>" class="item-descricao"> <a target="_blank" href="item_view.php?SelectedID=<?php echo $id; ?>">  <?php echo $item['descricao']; ?></a></dd>
						
						<dt class="item-colecao-caption field-caption-tv">Cole&#231;&#227;o:</dt>
						<dd id="item-colecao-<%%VALUE(id)%%>" class="item-colecao"> <a target="_blank" href="item_view.php?SelectedID=<?php echo $id; ?>">  <?php echo $item['colecao']; ?></a></dd>
						
						<dt class="item-grupo-caption field-caption-tv">Grupo:</dt>
						<dd id="item-grupo-<%%VALUE(id)%%>" class="item-grupo"><a target="_blank" href="item_view.php?SelectedID=<?php echo $id; ?>">  <?php echo $item['grupo']; ?></a></dd>

						<dt class="item-serie-caption field-caption-tv">S&#233;rie:</dt>
						<dd id="item-serie-<%%VALUE(id)%%>" class="item-serie"><a target="_blank" href="item_view.php?SelectedID=<?php echo $id; ?>">  <?php echo $item['serie']; ?></a></dd>

						<dt class="item-subserie-caption field-caption-tv">Subs&#233;rie:</dt>
						<dd id="item-subserie-<%%VALUE(id)%%>" class="item-subserie"><a target="_blank" href="item_view.php?SelectedID=<?php echo $id; ?>">  <?php echo $item['subserie']; ?></a></dd>

						<dt class="item-tipologia-caption field-caption-tv">Tipologia / Esp&#233;cie:</dt>
						<dd id="item-tipologia-<%%VALUE(id)%%>" class="item-tipologia"><a target="_blank" href="item_view.php?SelectedID=<?php echo $id; ?>">  <?php echo $item['tipologia']; ?></a></dd>

</dl>
</div>

            <div id='item-uploads-<?php echo $id; ?>' class="form-control-static" hidden=""><?php echo $item['uploads']; ?></div>
	</fieldset>
    </div>
<?php
$html_code = ob_get_contents();
ob_end_clean();
echo $html_code;
