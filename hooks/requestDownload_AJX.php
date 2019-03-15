<?php

$currDir = dirname(__FILE__);
$base_dir = realpath("{$currDir}/..");  
if(!function_exists('makeSafe')){
    include("$base_dir/lib.php");
} 

if (isset($_POST['cmd']) && isset($_POST['id']) && isset($_POST['fileName'])){
    $cmd = makeSafe($_POST['cmd']);
    $id = makeSafe($_POST['id']);
    $fileName = makeSafe($_POST['fileName']);
    echo processRequest($cmd, $id, $fileName);
    return;
}

function processRequest($cmd, $id, $fileName){
    
    $tableName = 'sinagoga';
    $dateAdded = time();
    $mi = getMemberInfo();//username;groupID;email
    $un = $mi['username'];
    $gi = $mi['groupID'];
    $em = $mi['email'];

    if ($cmd === 'dr'){
        $ret = 'false';
        if (!checkRequest($un, $tableName, $fileName, $id)){
            $ret = "INSERT INTO request_download ( `memberID`, `tableName`, `pkValue`, `fileName`, `groupID`, `dateAdded`, `aproved`, `text`)"
                            . " VALUES ('{$un}','{$tableName}','{$id}','{$fileName}','{$gi}','{$dateAdded}','false','{$em}')";
            $ret = sql($ret,$eo);
        }
        return $ret;
    }

    if ($cmd === 'check'){
        $ret = checkRequest($un, $tableName, $fileName, $id);
        return $ret;
    }
}

function checkRequest($un, $tableName, $fileName, $id){
    $ret = sqlvalue("select aproved from request_download where memberID = '{$un}' and tableName = '{$tableName}' and fileName = '{$fileName}' and pkValue = '{$id}' limit 1" );
    return $ret;
}