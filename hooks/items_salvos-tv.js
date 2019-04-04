function thisTable(){
    return 'item';
}

function removeFromList(id, tableName){
    $j.ajax({
            method: "POST",
            dataType: "text",
            url:'hooks/savedList.php',
            data: { cmd: 'deleteItem', id: id, tableName: tableName}
        });
}

$j(function(){
        refreshCards();
        cahgeDate();
});

function refreshCards(){
    $j('.items_salvos-pkValue').each(function(){
        var elementId = this.textContent;
        var id = $j(this).attr('myId')|| 0;//este id es el id del registro
        if (elementId){
            showItem(elementId,'#items_Salvos_item-'+id,'item');
        }
    });
}
function cahgeDate(){
    moment.locale('pt-br');
    $j('.items_salvos-dateAdded').each(function(){
        var id = $j(this).attr('myId')|| 0;//este id es el id del registro

        var day = moment($j(this).attr('date'), "DD-MM-YYYY");
        var today = moment(new Date());
        var human = moment.duration(day.diff(today,'days'),'day').humanize(true);
        
        $j('#btn-dateAdded-'+id).text('Agregado: ' + human);
    });
}

