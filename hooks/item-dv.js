/* global $j */

var COUNT = 1;
var CURRENT = '';

function thisTable(){
    return 'item';
}

$j(function(){
    CURRENT = $j('#numero_serie').val();
    $j('#identificacao, #numero_serie, #uploads').attr('readonly',true);
    
    var $actionButtons = $j('#item_dv_action_buttons .btn-toolbar');
        $actionButtons.prepend(' <div id="imagesThumbs"></div>')    ;    
        $actionButtons.append('<p></p><div id="uploadFrame"></div>');
            
    var $body = $j("body");
    
    if (!is_add_new()){
        addWarningBtn("identificacao","changue serial number","fa fa-edit");
        addWarningBtn("numero_serie");
    }

    $body.on('DOMSubtreeModified', "#colecao_codigo, #grupo_codigo, #serie_codigo", function() {
        setTimeout(function(){
            if (is_add_new()){
                getSerie(setValue());
            }else{
                if (COUNT > 3){
                    $codigo = setValue();
                    $codigo.numSerie = $j('#numero_serie').val();
                    $codigo.current = CURRENT;
                    getSerie($codigo);
                }else{
                    COUNT += 1;
                }
            }
        },500);
    });
    
    $j('#uploadFrame').load('hooks/multipleUpload/index.php',{folder: '/arquivos/images'});
    
    var a = getUploadedFile();
    loadImages($j('#titulo').val());
    
    var $dim = $j('#dimensao');

    $dim.focusout(function(){
        // console.log('Dimensão');
        text = $dim.val();
        const coma = /\,/g;
        const punto = /\./g;
        const regex = /[+-]?\d+(?:(\.|\,)\d+)?/g;

        var res = text.replace(coma,'.');
        
        var result = []
        result = res.match(regex);

        if (result && result.length == 2){
            //cantidad de numero ok
            var a = Number(result[0]).toFixed(2);
            var b = Number(result[1]).toFixed(2);
            var out = `${a.replace(punto,',')} x ${b.replace(punto,',')} cm`;
            // console.log(out)
            $dim.val(out);
        }else{
            console.log ('no se puede verificar las dimesiones')
            $dim.parent().parent().toggleClass('has-error')
        }
    })

    $j( "body" ).on( "click", ".btn-fix",function(){
            var field = this.attributes.myfield.value;
            if (field === 'identificacao'){
                    $j('.numero_serie').show();
                    $j('#numero_serie').prop('readonly',false);
            };
            if (field === 'numero_serie'){
                    $j('#numero_serie').val(CURRENT);
                    ToggleFix(field);
                    $j('#numero_serie').trigger("change");
//                    makeCode(setValue())
            };
    });

    $j('#numero_serie').on('change',function(){
        var serie = parseInt(this.value);
        $codigo = setValue();
        $codigo.numSerie = serie;
        if (serie !== parseInt(CURRENT)){
            checkCode($codigo)
        }else{
            makeCode($codigo);
        }
    });
});

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

function checkCode($codigo) {
    $j.get("hooks/item_AJAX.php", 
        {codes: $codigo, id:"01", cmd:"checkCode"},
        function (data) {
            if (data){
                //code exist
                console.log('existe')
                ToggleFix('numero_serie','danger');
            }else{
                //can changue value
                console.log('NO existe')
                makeCode($codigo);
                ToggleFix('numero_serie');
            }
        },
        "json"
    );
}

function makeCode($codigo){
    var $identificacao = $j('#identificacao');
    var $numero_serie = $j('#numero_serie');
    
    var h=("0000" + ($codigo.numSerie)).slice (-4);
    var identificacao = $codigo.colec.trim() + "_" + $codigo.group.trim() + "_" + $codigo.serie.trim() + "_" + h;
    if (identificacao !== $identificacao.val()){
        $numero_serie.val($codigo.numSerie);
        $identificacao.val(identificacao);
    }
}
