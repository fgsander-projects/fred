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
   <div class="panel-body">
	<fieldset class="form-horizontal">
			<div class="form-group">
				<label class="col-xs-3 control-label">T&#237;tulo:</label>
				<div class="col-xs-9">
					<div class="form-control-static"> <a href="item_view.php?SelectedID=<?php echo $id; ?>">  <?php echo $item['titulo']; ?></a></div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-3 control-label">Identifica&#231;&#227;o:</label>
				<div class="col-xs-9">
					<div class="form-control-static"> <a href="item_view.php?SelectedID=<?php echo $id; ?>"> <?php echo $item['identificacao']; ?></a></div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-3 control-label">Cole&#231;&#227;o:</label>
				<div class="col-xs-9">
					<div class="form-control-static"> <a href="item_view.php?SelectedID=<?php echo $id; ?>"> <span id="colecao"><?php echo $item['colecao']; ?></span></a></div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-3 control-label">Grupo:</label>
				<div class="col-xs-9">
					<div class="form-control-static"> <a href="item_view.php?SelectedID=<?php echo $id; ?>"> <span id="grupo"><?php echo $item['grupo']; ?></span></a></div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-3 control-label">S&#233;rie:</label>
				<div class="col-xs-9">
					<div class="form-control-static"> <a href="item_view.php?SelectedID=<?php echo $id; ?>"> <span id="serie"><?php echo $item['serie']; ?></span></a></div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-3 control-label">Subs&#233;rie:</label>
				<div class="col-xs-9">
					<div class="form-control-static"> <a href="item_view.php?SelectedID=<?php echo $id; ?>"> <span id="subserie"><?php echo $item['subserie']; ?></span></a></div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-3 control-label">Descri&#231;&#227;o:</label>
				<div class="col-xs-9">
					<div class="form-control-static"> <a href="item_view.php?SelectedID=<?php echo $id; ?>"> <?php echo $item['descricao']; ?></a></div>
				</div>
			</div>
            <div id='item-uploads-<?php echo $id; ?>' class="form-control-static" hidden=""><?php echo $item['uploads']; ?></div>
	</fieldset>
    </div>
<?php
$html_code = ob_get_contents();
ob_end_clean();
echo $html_code;