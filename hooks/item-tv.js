function thisTable(){
    return 'item';
}

$j(function(){
    initTable();
    removeEmpty();
    showTumbs();
    $current = $j('#current_view');
    if ($current.val()== 'DVP'){
        remove_DVP_empty();
        loadImages('dvp');
    }
    if ($current.val()== 'TVP'){
        $j('.hidden-print').hide();
        setTimeout(function(){
            $j('kbd').hide();
        },1000);
    }
});


function remove_DVP_empty(){
    $j('.form-group .col-xs-9 .form-control-static').each(function(){
        var $this = $j(this);
        var text = this.innerText;
        if (!text){
            $this.parent().parent().remove();
        }
    });
}