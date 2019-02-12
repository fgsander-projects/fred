

$j(function(){
    $j('#identificacao').attr('readonly',true)
    var $body = $j("body");
    $body.on('DOMSubtreeModified', "#colecao_codigo, #grupo_codigo, #serie_codigo", function(d) {
        if (is_add_new()){
            console.log('insert mode')
            getSerie(setValue());
        }else{
            setTimeout(function(){
                console.log('update mode')
                $codigo = setValue();
                $codigo.numSerie = $j('#numero_serie').val();
                makeCode($codigo);
            },1000)
        }
    });
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
    console.log('codigo: ', $codigo);
    $j.get("hooks/item_AJAX.php", 
        {codes: $codigo, id:"01", cmd:"lastNumber"},
        function (data) {
            console.log('data: ',data);
            if (data){
                data.numero_serie = null ? 0 : parseInt(data.numero_serie) || 0;
                $codigo.numSerie = data.numero_serie + 1;
            }else{
                $codigo.numSerie = 1;
            }
            makeCode($codigo);
        },
        "json"
    );
    // makeCode($codigo);
}

function makeCode($codigo){
    var $identificacao = $j('#identificacao');
    var $numero_serie = $j('#numero_serie');
    var h=("000" + ($codigo.numSerie)).slice (-3);
    var identificacao = $codigo.colec.trim() + "_" + $codigo.group.trim() + "_" + $codigo.serie.trim() + "_" + h;
    console.log('val make %s, val get %s', identificacao, $identificacao.val());
    if (identificacao !== $identificacao.val()){
        $numero_serie.val($codigo.numSerie);
        $identificacao.val(identificacao);
        console.warn ('val get changed');
        //changue serie
        //getSerie($codigo);

    }
    
}