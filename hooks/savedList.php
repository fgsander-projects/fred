<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("../lib.php");
/* grant access to all logged users */
$mi = getMemberInfo();
if(!$mi['username'] || $mi['username'] == 'guest'){
        echo "Access denied";
        exit;
}

if (isset($_POST['cmd']) && $_POST['cmd']==='deleteItem'){
    if (isset($_POST['id'])){
        //borrar el id del item salvos
        $sql = "delete from items_salvos where pkValue = '{$_POST['id']}' and tableName = '{$_POST['tableName']}' ";
        $msg = sql ($sql, $eo);
        return $msg;
    }
}

if (isset($_POST['cmd']) && $_POST['cmd']==='isSelected'){
    if (isset($_POST['id'])){
        //verifica si el item está guardado
        $msg = sqlValue ("select id from items_salvos where pkValue = '{$_POST['id']}' and tableName = '{$_POST['tableName']}' and memberID = '{$mi['username']}'");
        echo $msg;
        return;
    }
}


if (isset($_POST['id']) && $_POST['cmd']==='addToList'){
            $count = addToList($_POST['id'],$_POST['tableName'],$_POST['image']);
            echo $count;
            exit;
        }
        
if (isset($_POST['id']) && $_POST['cmd']==='recountItems'){
            $count = recountItems();
            echo $count;
            exit;
        }
        
if (!isset($_POST['cmd']) || $_POST['cmd'] !=='savedList'){
    return false;
}

function addToList($id,$table,$image){
    $mi = getMemberInfo();
    $t = time();
    $num = sqlValue("select count(1) from items_salvos where memberID = '{$mi['username']}' and tableName = '$table' and pkvalue = '$id'");
    if (!$num){
        $num = sql("INSERT INTO `items_salvos`(`memberID`, `tableName`, `pkValue`, `groupID`, `dateAdded`) VALUES ('{$mi['username']}','$table','$id','{$mi['groupID']}','$t')",$eo);
    }else{
        $num = 'you are already save this item';
    }
    return $num;
}

function recountItems(){
    $mi = getMemberInfo();
    $num = sqlValue("select count(pkValue) from itemsSalvos where memberID = '{$mi['username']}'");
    return $num;
}