<?php
header('Content-type: application/json');
$currDir = dirname(__FILE__);
include("$currDir/../lib.php");

if(isset($_REQUEST['cmd']) && isset($_REQUEST['id'])){
    $id=makeSafe($_REQUEST['id']);
    $data ="{'invalid':'data'}";
    if ($_REQUEST['cmd']==='lastNumber'){
        $codes = $_REQUEST['codes'];
        $data = getLastNumber($codes);
    }
    echo json_encode($data, true);
}

function getLastNumber($data){
    $where_id =" AND colecao1.codigo_colecao = '{$data['colecao_codigo']}' AND grupo1.codigo_grupo = '{$data['grupo_codigo']}' AND serie1.codigo = '{$data['serie_codigo']}' ORDER BY item.numero_serie DESC LIMIT 1;";
    $res = getDataTable('item', $where_id);
    return $res;
}