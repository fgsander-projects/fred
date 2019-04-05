<?php if(!isset($Translation)){ @header('Location: index.php'); exit; } ?>
<?php include_once("{$currDir}/header.php"); ?>


    <!-- Main content -->
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Buscar...</h3>
            </div>
            <div class="box-body">

              <div class="input-group input-group-lg">
                <input id="term" type="text" class="form-control">
                    <span class="input-group-btn">
                      <button id="_go" type="button" class="btn btn-info btn-flat glyphicon glyphicon-search"></button>
                    </span>
              </div>
              <div id="found"></div>
              <div class="progress">
                <div id="records" class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width: 0%">
                  <span class="sr-only"></span>
                </div>
              </div>
              <div id="result">
                <table class="table table-hover">
                  <tbody>
                  
                  </tbody>
                </table>
              </div><!-- /result -->
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>

<script>
function thisTable(){
    return 'item';
}

$j('#_go').on('click', function(){
  search();
})
$j(document).on('keypress',function(e) {
    if(e.which == 13) {
      search();
    }
});
function search(){
   
  term = $j('#term').val();
  if (term.length > 3){
    console.log(term);
    $j.ajax({
      method: "POST",
      dataType: "json",
      url:'hooks/search_AJX.php',
      data: { cmd: 'search', s: term }
    })
    .fail((e)=>{
      console.log('ERROR!:' + e);
    })
    .done(function(msg){;
      $bar=$j('#records');
      $bar.css('width','0%');
      $result = $j('#result table tbody');
      $result.html('');
      if (msg && msg.total >0){
        $bar.attr('aria-valuemax',msg.hits.length);
        
        var i = 0;
        var b = 0;
        var id = 0;
        var thumb ="";
        $j('#found').text(' ' + msg.total + ' foram encontrados em ' + msg.hits.length +' registros.')
        
        msg.hits.forEach(function(item){
          i++;
          $bar.attr('aria-valuenow',i);
          id = item._source.identificador;
          $j.ajax({
            type: "post",
            url: "hooks/item_card_AJAX.php",
            data: {id: id, cmd: 'record'},
            dataType: "html",
            success: function (response) {
              var data = getUrlVars(this.data);
              var thumb =   '<div class="col-container">'+
                            '  <div class="col col-md-2" style="padding-right: 4px;padding-left: 10px;margin-bottom: 20px;">'+
                            '    <div id="imagesThumbs-'+ data.id +'" class="thumbs" title="'+ data.id +'" hidden="" style="display: block;">'+
                            '    </div><br>'+
                            '    <button id="addToList-'+ data.id +'" type="button" class="btn btn-default addToList " title="Adicionar / Remover aos Salvos" onclick="addToList('+ data.id +');" myid="'+ data.id +'" hidden="" ><i class="glyphicon glyphicon-unchecked" myid="'+ data.id +'"></i></button>'+
                            '  </div>'+
                            '</div>';
              $result.append('<tr><td><div class="col col-md-10" id = "#items_Salvos_item-'+ data.id +'">' + thumb + response + '</div></td></tr>')
            }
          });
          b=(i/msg.hits.length)*100;
          $bar.css('width', b + '%');
        })
      }else{
        $j('#found').text('Nada foi encontrado, tente algo diferente.');
      }
    })
    .always(function(){
          showTumbs();
          recountsItems(thisTable());
          setTimeout(() => {
            $j('.form-group').each(function(index, element){
              console.log(index);
              $text = $j.trim($j('.form-control-static', this).text());
              console.log($text);
              if (!$text){
                console.log($text.length);
                  $j(this).remove();
              }
            });
          }, 1000);
                          
    })
  }else{
    $j('#found').text('Por favor, escreva ao menos 3 caracteres.');
  }
}

</script>


<?php include_once("$currDir/footer.php"); ?>



