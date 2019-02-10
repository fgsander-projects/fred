/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var colec = "";
var group = "";
var serie = "";
var numSerie = "01" ;
var $identificacao = $j('#identificacao');

var $body = $j("body");
$body.on('DOMSubtreeModified', "#colecao_codigo, #grupo_codigo, #serie_codigo", function(d) {
    colec = $j("#colecao_codigo").text();
    group = $j("#grupo_codigo").text();
    serie = $j("#serie_codigo").text();
    console.log(colec.trim(), group.trim(),serie.trim());
    makeCode();
    
});

function makeCode() {
    var identificacao = colec.trim() + "_" + group.trim() + "_" + serie.trim() + "_" + numSerie.trim();

    $j.get("hooks/item_AJAX.php", 
        {codes: {"colecao_codigo":colec,"grupo_codigo":group,"serie_codigo":serie}, id:"01", cmd:"lastNumber"},
        function (data) {
            console.log(data);
            // $identificacao.val(identificacao);
            
        },
        "json"
    );

}