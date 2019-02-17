function removeFromList(id, tableName){
    $j.ajax({
            method: "POST",
            dataType: "text",
            url:'hooks/savedList.php',
            data: { cmd: 'deleteItem', id: id, tableName: tableName}
        })
        .done(function(msg){
//            alert ('deleted item' + id);
//            $j('#index-'+index).remove();
//            recountsItems();
        })
}