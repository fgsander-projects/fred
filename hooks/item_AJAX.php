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

function getLastNumber($codes){
    $data = json_decode($codes);
    $where_id =" AND item.colecao_codigo = {$data['colecao_codigo']} AND item.grupo_codigo = {$data['grupo_codigo']} AND item.serie_codigo = {$data['serie_codigo']} ORDER BY item.numero_serie DESC LIMIT 1;";
    $res = getDataTable('item', $where_id,true);
    return $res;
}