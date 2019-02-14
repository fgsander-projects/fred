$j(function(){
    $j('#identificacao').attr('readonly',true);
    $j('#numero_serie').attr('readonly',true)
    $actionButtons = $j('#item_dv_action_buttons .btn-toolbar')
    $actionButtons.prepend(' <div id="imagesThumbs"></div>')        
    $actionButtons.append('<p></p><div id="uploadFrame"></div>');
            
    var $body = $j("body");
    $body.on('DOMSubtreeModified', "#colecao_codigo, #grupo_codigo, #serie_codigo", function(d) {
        setTimeout(function(){
            if (is_add_new()){
                getSerie(setValue());
            }else{
                $codigo = setValue();
                $codigo.numSerie = $j('#numero_serie').val();
                getSerie($codigo);
            }
        },500)
    });
    setInterval();
})

function setValue(){
    var $codigo = {
        "colec" : $j("#colecao_codigo").text().trim(),
        "group" : $j("#grupo_codigo").text().trim(),
        "serie" : $j("#serie_codigo").text().trim()
    };
    return $codigo;
};

function getSerie($codigo) {
    $j.get("hooks/item_AJAX.php", 
        {codes: $codigo, id:"01", cmd:"lastNumber"},
        function (data) {
            if (data){
                data.numero_serie = null ? 0 : parseInt(data.numero_serie) || 0;
                $codigo.numSerie = data.numero_serie + 1;
            }else{
                if (is_add_new()){
                    $codigo.numSerie = 1;
                }
            }
            makeCode($codigo);
        },
        "json"
    );
}

function makeCode($codigo){
    var $identificacao = $j('#identificacao');
    var $numero_serie = $j('#numero_serie');
    var h=("000" + ($codigo.numSerie)).slice (-3);
    var identificacao = $codigo.colec.trim() + "_" + $codigo.group.trim() + "_" + $codigo.serie.trim() + "_" + h;
    if (identificacao !== $identificacao.val()){
        $numero_serie.val($codigo.numSerie);
        $identificacao.val(identificacao);
    }
}