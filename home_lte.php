<?php if(!isset($Translation)){ @header('Location: index.php'); exit; } ?>
<?php include_once("{$currDir}/header.php"); ?>


    <!-- Main content -->
    

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
    
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Search...</h3>
            </div>
            <div class="box-body">

              <div class="input-group input-group-lg">
                <input id="term" type="text" class="form-control">
                    <span class="input-group-btn">
                      <button id="_go" type="button" class="btn btn-info btn-flat">Go!</button>
                    </span>
              </div>
              <div id="found"></div>
              <div class="progress">
                <div id="records" class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width: 0%">
                  <span class="sr-only"></span>
                </div>
              </div>
              <div id="result">
              </div><!-- /result -->
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>

<script>
$j('#_go').on('click', function(){
  
  term = $j('#term').val();
  if (term.length > 3){
    console.log(term);
    $j.ajax({
      method: "POST",
      dataType: "json",
      url:'hooks/search_AJX.php',
      data: { cmd: 'search', s: term }
    })
    .done(function(msg){;
      $bar=$j('#records');
      $bar.css('width','0%');
      $result = $j('#result');
      $result.html('');
      console.log(msg);
      if (msg.total >0){
        $bar.attr('aria-valuemax',msg.hits.length);
        
        var i = 0;
        var b = 0;
        $j('#found').text(' ' + msg.total + ' matches they found in: ' + msg.hits.length +' records')
        
        msg.hits.forEach(function(item){
          i++;
          $bar.attr('aria-valuenow',i);
          console.log(item._source.contenido);

          $result.append(item._source.contenido + '<hr><br>')

          b=(i/msg.hits.length)*100;
          $bar.css('width', b+'%');
        })
        }else{
          $j('#found').text('nothing was found');
        }
    })
  }else{
    $j('#found').text('write more than 3 characters');
  }
})
</script>


<?php include_once("$currDir/footer.php"); ?>