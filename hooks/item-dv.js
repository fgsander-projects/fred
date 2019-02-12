
var $identificacao = $j('#identificacao');
var $body = $j("body");

$body.on('DOMSubtreeModified', "#colecao_codigo, #grupo_codigo, #serie_codigo", function(d) {
    getSerie(setValue());
});

$j(function(){
})

function setValue(){
    var $codigo = {
        "colec" : $j("#colecao_codigo").text(),
        "group" : $j("#grupo_codigo").text(),
        "serie" : $j("#serie_codigo").text()
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
                $codigo.numSerie = "001";
            }
            // makeCode($codigo);
        },
        "json"
        );
    makeCode($codigo);
}
    
function makeCode($codigo){
    var h=("000" + ($codigo.numSerie)).slice (-3);
    var identificacao = $codigo.colec.trim() + "_" + $codigo.group.trim() + "_" + $codigo.serie.trim() + "_" + h;
    $identificacao.val(identificacao);

}