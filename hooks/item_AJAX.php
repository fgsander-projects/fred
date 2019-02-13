<?php
header('Content-type: application/json');
$currDir = dirname(__FILE__);
if (!function_exists('makeSafe')){
    include("$currDir/../lib.php");
}

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
    // var_dump($data);
    array_walk($codes, 'trim_value');
    $where_id =" AND colecao1.codigo_colecao = '{$codes['colec']}' AND grupo1.codigo_grupo = '{$codes['group']}' AND serie1.codigo = '{$codes['serie']}' ORDER BY item.numero_serie DESC LIMIT 1;";
    $res = getDataTable('item', $where_id);
    return $res;
}

function trim_value(&$value) 
{ 
    $value = trim($value); 
}