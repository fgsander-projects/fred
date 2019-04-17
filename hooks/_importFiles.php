<?php
// 
// Author: Alejandro Landini
//

	define("PREPEND_PATH", "../");
	$hooks_dir = dirname(__FILE__);
	include("{$hooks_dir}/../defaultLang.php");
	include("{$hooks_dir}/../language.php");
	include("{$hooks_dir}/../lib.php");

	$x = new StdClass;
	include_once("{$hooks_dir}/../header_old.php");
	$user_data = getMemberInfo();
	$user_group = strtolower($user_data["group"]);
?>
<div class="row">
    <div class="col-xs-12">
        
    <div class="page-header"><h1>Importar Arquivos</h1></div>

    <form method="post" enctype="multipart/form-data" action="_ajax-check-files.php">
        <div class="form-group">
                <span class="help-block">Selecione os arquivos que deseja enviar <code></code></span>
                    <input id="btnupload" type="file" name="uploadedFile[]" directory multiple>
                    <input type="text" name="cmd" value="i" hidden="">
                    <div class="text-center">
                        <button type="submit" data-loading-text="Processando as imagens..." class="btn btn-success btn-lg" id="submit">Enviar 
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
        </div>
        <br>
        <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
            <span class="sr-only">0% Completo</span>
          </div>
        </div>
        <br>
                <div class="col">
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                        <div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">Selecionar Arquivos</div>
                                </div>
                                <div class="panel-body">
                                        <div class="panel-body-list"></div>
                                </div>
                        </div>
                </div>
    </form>

    </div>
</div>
		 
<script>

    var user_group= <?php echo json_encode($user_group) ?>  ;
    var retData = '';
    $j(function(){
                        
        $j("form").submit(function(e) {
            e.preventDefault();    
            var btn = $j('#submit').button('loading');
            var formData = new FormData(this);

            $j.ajax({
                url: '_ajax-check-files.php',
                type: 'POST',
                data: formData,
                xhr: function(){
                  var myXhr= $j.ajaxSettings.xhr();
                  if(myXhr.upload){
                      myXhr.upload.addEventListener('progress',progress,false);
                  }
                  return myXhr;
                },
                success: function (files) {
                    btn.button('reset');
                    console.log(files);
                    listFiles(files);
                },
                cache: false,
                contentType: false,
                processData: false
            });
            
        });
         $j('form').on('change','#btnupload',function(){
//            console.log(this);
            var f= [];
            $j.each(this.files,function(i,data){
//                console.log(data);
                f.push(data.name);
            });

            f = JSON.stringify(f);
            $j.ajax({
                    url: '_ajax-check-files.php',
                    dataType:'text',
                    data: {f:f}
            })
                    .done(function(files){
//                        console.log(files);
                        listFiles(files);
                    });
        });

    });
    function listFiles(files){
        var disabled = '';
        $j('.panel-body-list').html('');
        retData = files;
        console.log(files);
        var list = JSON.parse(files);
        var max = '20';
        $j.each(list,function(i,data){
            disabled = '';
            var d = JSON.parse(data);
            if (d.valid === 'error') disabled = 'disabled';
            var f = '<div class="checkbox has-' + d.valid + ' ' + disabled + '">\
                        <label>\
                            <input type="checkbox" myindex="' + i + '" ' + disabled + ' > <strong>' + d.fileName + '</strong> (em: ' + d.folder + ') Padrão de nome: OK. ' + d.msg +
                        '</label>\
                    </div>';
            $j('.panel-body-list').append(f);
            max = d.mxu;
        });
        if(list.length > max){
            alert("Você selecionou " + list.length + " arquivos. O Máximo permitido para upload é:" + max );
        }else{
//            alert("correct, you have selected less than 10 files");
        }
            
    }  
    function progress(e){
        if (e.lengthComputable){
            var max = e.total;
            var current = e.loaded;
            var percentage = (current * 100)/max;
//            console.log (percentage);
            $j('.progress-bar').css('width', percentage + '%').attr('aria-valuenow', percentage)
            if (percentage >= 100){
                //procees completed
            }
        }
    }
</script>

<?php include_once("$hooks_dir/../footer_old.php"); 
