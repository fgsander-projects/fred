
<?php
// 
// Author: Alejandro Landini
// previewImages.php 7/4/18
// toDo: 
// revision:   
//             * 18/7/18 add 4 thumbs for a video 
//             * 9/7/18 modify show mov code
//             * 7/5/18 implement dragable UI
//             * -add library to header.php before bootstrap.js
//             * -add library css to heder-extras.php
//             * -update open gallery
// 
//

if(!function_exists('makeSafe')){
    include("../lib.php");
} 

$cmd    = isset($_POST['cmd'])    ? $_POST['cmd']    : '';
$source = isset($_POST['source']) ? $_POST['source'] : '';
$json   = isset($_POST['json'])   ? $_POST['json']   : [];
$indice = isset($_POST['indice']) ? $_POST['indice'] : '';//id
$title  = isset($_POST['title'])  ? $_POST['title']  : '';

$invalid_characters = array("$", "%", "#", "<", ">", "|", "\"");
$title = makesafe(str_replace($invalid_characters, "",$title));

$name   = isset($_POST['name'])   ? $_POST['name']   : '';
$largo  = isset($_POST['largo'])  ? $_POST['largo']  : '';
$tableName  = isset($_POST['tableName'])  ? $_POST['tableName']  : '';

$currDir = dirname(__FILE__);

if ($cmd !== ''){
        $folder ='hooks/projects/';
        $html = '<div>';
        $html2 ='';
        $index = 1;
        $base_dir = realpath("{$currDir}/..");
        $modif = time();
        if ($json !== []){
            switch ($cmd){
                case 'full':
                    $end ='';
                    if($indice !== '') {
                        $html = '<div class = "th-'. $indice .'">';
                        $end = '</div>';
                    }
                    $a=[];
                    foreach ($json['images'] as $image=>$a) {
                        $fo = $a['folder_base'];
                        if ( !empty($fo)){
                            $folderO = substr ($fo,1)."/upload/"; //original
                            $folderT = substr ($fo,1)."/th/"; //thumbs
                            $folderL = substr ($fo,1)."/LO/"; //loRes
                        }else{
                            $folderO = $folder; //original
                            $folderT = $folder; //thumbs
                            $folderL = $folder; //loRes
                        }
                        $ext = strtolower($a['extension']);
                        $url = $folderO.$a['fileName'];
                        if ($a['hd_image'] === 'true'){
                            $url = $folderL.$a['name'].'_LO.jpg';
                        }
                        $url_th = $folderT."{$a['name']}_th.jpg";
                        $source =$base_dir.'/'. $url_th;
                        if (file_exists($source)){
                            $modif =filemtime($source);
                        }
                        
                        $style = '"valign="center" style="display:block; max-width:240px; max-height:290px; margin-left: auto; margin-right:auto; border-radius:5px; margin-bottom:6px; "/>';
                        $href = '<a class="example-image-link" href="'.$url.'" data-lightbox="set-'.$indice.'" data-title="'. $title . '">';
                        $thumbs = '<img class="" src="' . $url_th . '?m='. $modif .'" alt="' . $a['fileName'] . $style;

                        if ($ext === 'pdf'){
                            $href = "<a onclick=\"showPdf('". $url ."' , '".  $title ."' , '". $index."' , '". $indice . "')\">";
                        }
                       
                        //video type
                        $video='';
                        if ($a['type'] == 'mov'){
                            $url_th = $folderT."{$a['name']}_th.jpg";
                            if (isset($a['thumb']) && $a['thumb'] > 1){
                                $i = $a['thumb'] -1;
                                $url_th = $folderT."{$a['name']}({$i})_th.jpg";
                            }
                            $href ='<a class="launch-modal" href="#" data-modal-id="modal-video-' .$indice .'">';
                            $video = ModalVideo($indice,$url,$title).videoScripts($indice);
                        }
                        
                        //audio type
                        $audio='';
                        if ($a['type'] == 'audio'){
                            $href ='<a class="launch-modal" href="#" data-modal-id="modal-audio-' .$indice .'">';
                            $audio = ModalAudio($indice,$url,$title).audioScripts($indice);
                            $url_th= 'hooks/audio/audio-wave-icon.png';
                        }

                        if ($a['type'] == 'img' ){
                            // es tipo IMG
                            $html .=  '<div class = "mySlides-'. $indice. '" style="border-bottom: 1px solid #efefef; max-width:250px; max-height:300px;">'
                                        . $href . $thumbs
                                        . '</a>'
                                        .$video.$audio
                                    . '</div>';
                            //TODO: check if can disbale thumbs if TV
                            if ($tableName){

                                $html2 .= '<div class="column columns-thumbs" style="width:50px; height:50px; margin-top:3px; margin-left:4px;">'
                                            . '<img class="demo cursor" style="width:50px; height:50px; margin-left:3px;opacity:0.8" src="' . $url_th . '?m='. $modif .'" onclick="currentSlide('. $index. ',' .  $indice .')" alt="' . $a['name'] . '"/>'
                                        . '</div>';
                            }
                            $index += 1;
                        }
						
						 if ($a['type'] == 'mov' || $ext == 'pdf' || $a['type'] == 'audio' ){
                            // es tipo IMG o PDF o MOV o AUDIO
                            $html .=  '<div class = "mySlides-'. $indice. '" style="border-bottom: 1px solid #efefef;">'
                                        . $href . $thumbs
                                        . '</a>'
                                        .$video.$audio
                                    . '</div>';
                            $html2 .= '<div class="column columns-thumbs" style="width:50px; height:50px; margin-top:3px; margin-left:4px">'
                                        . '<img class="demo cursor" src="' . $url_th . '?m='. $modif .'" onclick="currentSlide('. $index. ',' .  $indice .')" alt="' . $a['name'] . '"/>'
                                    . '</div>';
                            $index += 1;
                        }
						
						
                    } 
                    echo $html. '<div style="max-height: 200px; overflow-x: auto;">' .$html2 . '</div></div>'. $end;
                    return;
                case 'empty':
                    //TODO: poner no foto!
                    echo '';
                    return;
                case 'form':
                    $form = '';
                    //carga un formulario para ver las opciones de la imágen!
                    $mi= getMemberInfo();
                    usort($json['images'], 'cmp');
                    //vairifica y agrega que todos los item tenga el campo de aprobación, solo se guarda si el usuario hace click en salvar.
                    foreach ($json['images'] as $image=>$a) {
                        if (!isset($a['aproveUpload'])){
                            $json['images'][$image]['aproveUpload'] = 'false';
                        }
                    }
                    foreach ($json['images'] as $image=>$a) {
                        $form .= imageForm($a, $folder, $index, json_encode($json),$mi, $tableName,$indice);
                        $index += 1;
                    }
                    
                    echo '<ul id = "sortable-images" class="list-unstyled">'. $form. '</ul>'. myscripts($indice);
                    return;
                case 'buttons':
                    include 'requestDownload_AJX.php';
                    $buttons = '<table class="table table-hover"><tr><th>Nome do arquivo</th><th>Dimensão - Tamanho</th><th> Tipo de arquivo</th><th>Download</th></tr>';
                    
                    //carga un formulario para ver las opciones de la imágen!
                    foreach ($json['images'] as $image=>$a) {

                        $buttons .= otherFiles($a, $folder, $largo, $indice, $tableName);

                    }
                    $buttons = $buttons. "</table>" . myscripts($indice);
                    echo $buttons ;
                    return;
                case 'downloads':
                    //descarga PDF
                    $dwl= "<a id= '". $name ."' href='". $json ."' download ></a>";
                    echo     $dwl;
                    return;
            }
                    
        return;
        }
}

//open gallery
function imageForm($a,$folder,$index,$json,$mi,$tableName,$indice){
    $fo = $a['folder_base'];
    $currDir = dirname(__FILE__);
    $base_dir = realpath("{$currDir}/..");
    $size = 0 ;
    $modif = time();
    if ( !empty($fo)){
        $folderO = substr ($fo,1).'/upload'; //original
        $folderT = substr ($fo,1).'/th'; //thumbs
        $folderL = substr ($fo,1).'/LO'; //loRes
    }else{
        $folderO = $folder; //original
        $folderT = $folder; //thumbs
        $folderL = $folder; //loRes
    }
    
    $image = $folderO.'/'.$a['fileName'];
    
    if ($a['hd_image']=== 'true'){
        $image = $folderL.'/'.$a['name'].'_LO.jpg';
    }
    if ($a['type']=== 'mov'){
        $image = $folderT.'/'.$a['name'].'_th.jpg';
        if (isset($a['thumb'])){
            $i = $a['thumb']-1;
            if (i>0){
                $image = $folderT.'/'. $a['name'] . '(' . $i . ')_th.jpg';
            }
        }
    }
    if ($a['type']=== 'doc'){
        $image = 'hooks/cloud.png';
    }
    if ($a['type']=== 'audio'){
        $image = 'hooks/audio/audio-wave-icon.png';
        $source =  $folderO .'/'.$a['fileName'];
    }
    
    if ($a['extension']=== 'pdf'){
        $image = $folderT.'/'.$a['name'].'_th.jpg';
        $source = $base_dir.'/'. $folderO .'/'.$a['fileName'];
    }
    if (file_exists($base_dir .'/' . $image)){
        $modif = filemtime($base_dir .'/' . $image);
    }
    if (file_exists($currDir .'/../' . $folderO.'/' . $a['fileName'])){
        $size = FileSizeConvert(filesize ( $currDir .'/../' . $folderO.'/' . $a['fileName']));
    }
    //verifica si la imagen esta autorizada para ser visualizada
    $hidden = FALSE;
    if ($a['aproveUpload'] === 'true' || $tableName !== 'sinagoga'){
        $aproveUpload = 'default';
    }else{
        $aproveUpload = 'danger';
        //solo el admin o el usuario que cargo puede verlo
        $uu = getMemberInfo($a['userUpload']);
        if (!$mi['admin'] && $mi['username']!==$a['userUpload']){
            $hidden = true;
        }
    }
    ob_start();
    ?>
    
    <li class="index-<?php echo $index; ?>">
        <div class="panel panel-<?php echo $aproveUpload; ?>">
            <div class="panel-heading clearfix">
                <h3 class="panel-title pull-left">Iten  <span class="badge"><?php echo $index; ?></span></h3>
                <div class="btn-group pull-right">
                    <button class="move-element btn btn-default btn-xs"><span class="glyphicon glyphicon-move"></span></button>
                    <?php if ($mi['admin'] && $tableName === 'sinagoga' ){ //solo si el usuario es admin y estamos en la tabla sinagoga se habilita para poder aprobar la imagen
                            if ($a['aproveUpload']==='false' || !isset($a['aproveUpload'])){?>
                                <button id="aprove-<?php echo $index; ?>" class="aprove btn btn-default btn-xs"><span class="glyphicon glyphicon-thumbs-down"></span>   Aprove</button>
                            <?php 
                            $a['aproveUpload']='false';
                            }else{ ?>
                                <button id="aprove-<?php echo $index; ?>" class="aprove btn btn-success btn-xs"><span class="glyphicon glyphicon-thumbs-up"></span>   Aprove</button>
                            <?php
                            } 
                    }?>
                    <button id="remove-<?php echo $index; ?>" class="remove btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span>   Remover</button>
                    <button id="makeDe-<?php echo $index; ?>"
                        <?php if ($a['defaultImage'] === 'true') {?>
                                class="makeDe btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-check">
                        <?php }else{?>
                                class="makeDe btn btn-default btn-xs">
                                <span class="glyphicon glyphicon-unchecked">
                        <?php }?>
                                </span>   Imagem padrão
                    </button>
                    <?php
                    //boton download
                     //preguntar si puede bajar habilitar el boton de bajar..
                    if ($tableName === 'sinagoga'){
                        $ret = processRequest('check', $indice, $a['fileName']);
                        if ($ret){
                            //puede desacargar
                            //cuando puede desacargar? cuando este autorizado
                            if ($ret === 'false'){
                                //todavía no esta autorizado
                                ?> 
                                    <a href="#" title="Request Download" class="btn btn-warning btn-xs" disabled>
                                        <span class="glyphicon glyphicon-cloud-download"></span> Download
                                    </a>
                                <?php
                            }else{
                                //esta autorizado
                                ?> 
                                    <a href="<?php echo $folderO.'/'.$a['fileName']; ?>" target="_blank" title="<?php echo $a['name']; ?>" class="request btn btn-warning btn-xs" download>
                                        <span class="glyphicon glyphicon-cloud-download"></span> Download
                                    </a>
                                <?php
                            }
                        }else{
                            //solicitar autorización.
                            ?> 
                                <a href="#" filename = "<?php echo $a['fileName']; ?>" title="<?php echo $a['name']; ?>" class="request btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-comment"></span> Download
                                </a>
                            <?php
                        }
                    } else {
                    //no estamos en sinagoga está autorizado
                        ?> 
                            <a href="<?php echo $folderO.'/'.$a['fileName']; ?>" target="_blank" title="<?php echo $a['name']; ?>" class="request btn btn-warning btn-xs" download>
                                <span class="glyphicon glyphicon-cloud-download"></span> Download
                            </a>
                        <?php
                        
                    }?>
                </div> <!-- /.btn-group -->
                
            </div><!--/.panel-heding -->
            <div class="panel-body">
               <div class="col col-lg-2">
                    <a href="<?php echo $image; ?>" data-lightbox="item_form">
                        <img id="image-<?php echo $index; ?>" class="hover-shadow" src="<?php echo $image . '?m=' . $modif; ?>" alt="<?php echo $folderT.'/'.$a['name']; ?>" style="width:100%; margin-left: auto; margin-right:auto; border-radius: 5px; margin-bottom:6px; ">
                    </a>
                </div> <!--/.col-lg-2 -->
                
               <div class="col col-lg-10">
                   <?php if ($a['extension']=== 'pdf'){ ?>
                        <div class="col-lg--6 pdf-container" style="margin-bottom: 10px;margin-left: 10px;">
                            <div class="input-group">
                                <input id="pagPDF-<?php echo $index; ?>" type="text" class="form-control" source = " <?php echo $source ?>" placeholder="Lendo o arquivo..." disabled="true">
                                <span class="input-group-btn">
                                    <button id="pdfBut-<?php echo $index; ?>" data-loading-text="Carregando..." class="pdfButton btn btn-default" type="button" disabled="true">Selecionar</button>
                                </span>
                            </div><!-- /.input-group -->
                        </div><!-- /.col-lg-9 -->
                    <?php }?>
                    
                   <?php if ($a['type']=== 'audio'){ ?>
                        <div class="col-lg--6 pdf-container" style="margin-bottom: 10px;margin-left: 10px;">
                            <audio controls class="embed-responsive-item">
                                <source src="<?php echo $source;?>">
                            </audio>
                        </div><!-- /.col-lg-9 -->
                    <?php }?>
                        
                    <div class="well well-sm" style="margin-bottom: 10px;margin-left: 10px;">
                        - Nome do arquivo: <?php 
                                if (strlen($a['name']) > 30){
                                    echo substr($a['name'],0, 30). '...'.$a['extension']; 
                                }else{
                                    echo $a['fileName']; 
                                }
                        ?>
                        <br>
                        - Extensão:        <?php echo $a['extension']; ?><br>
                        <!--- Tipo de arquivo: <?php echo $a['type'];      ?><br>-->
                        <!--- Alta resolução:  <?php echo $a['hd_image'];  ?><br>-->
                        - Tamanho:         <?php 
                                            if ( isset($a['size']) && $a['size'] !== 'false'){
                                                echo $a['size'].'-('.$size.')';
                                            }else{
                                                echo $size; 
                                            }
                                ?>
                        <br>
                    </div><!--/.well-sm -->
               </div><!--/.col-lg-10 -->
               <?php if ($a['type']=== 'mov'){ 
                        $image = $folderT.'/'.$a['name'].'_th.jpg';
                        for ($x = 1; $x <= 4; $x++) {
                            ?>
                            <div class="col-lg-3 alt-thumb"
                                <a href="<?php echo $image; ?>" data-lightbox="item_form"  >
                                    <img id="image-<?php echo $index.$x; ?>" class="hover-shadow defualt-movie-th <?php echo ($a['thumb'] == $x ? 'selectedth':''); ?>" src="<?php echo $image . '?m=' . $modif; ?>" alt="<?php echo $x; ?>" style=" width:100%; margin-left: auto; margin-right:auto; border-radius: 5px; margin-bottom:6px;" myindex="<?php echo $index; ?>" mypicture="<?php echo $x; ?>" >
                                </a>
                            </div><!-- /.col-lg-3 -->

                            <?php 
                            $image = $folderT . '/' . $a['name'] . '(' . $x . ')_th.jpg';
                        }?>
                <?php }?>
            </div><!--/.panel-body-->
        </div> <!--/.panel -->
    </li>
    <?php 
    if ($index === 1 ){
    ?>
    <script>
        var j = <?php echo $json; ?>;
        var d = {images:[]}; //array vacia para borrar elementos
        
        $j(document).ready(function(){
            $j( "#sortable-images" ).sortable({
                handle: 'button',
                cancel: ''
            });
            $j('.pdf-container input').each(function(index){
                var pdfcontainer = this.attributes;
                $j.ajax({
                    method: 'POST', //post, get
                    dataType: 'json', //json,text,html
                    url:'hooks/previewImages_AJX.php',
                    cache: 'false',
                    data: {cmd:'chk', source: pdfcontainer.source.value, id: pdfcontainer.id.value}
                })
                .done(function(msg){
                    //function at response
                    //set value
                    if (parseInt(msg.ret) >1){
                        $j('#' + msg.tag).attr('disabled',false);
                        $j('#' + msg.tag + '~  span button').attr('disabled',false);
                        $j('#' + msg.tag + '~  span button').attr('cantpages',msg.ret);
                        $j('#' + msg.tag).attr('placeholder','Digite o número da página (máx. ' + msg.ret + ' )');
                    }else{
                        $j('#' + msg.tag).attr('placeholder','O documento tem apenas 1 página.');
                    }
                });
            });
        });
        $j(function(){
            $j('.makeDe').click(function(event){
                //move to top of iden selected images o make default
                event.preventDefault();
                var a = this.id;
                a=parseInt(a.substring(7)) -1 || 0;//ID viejo
//                'makeDe-'=7
                $j('.makeDe').removeClass('btn-success');
                $j('.makeDe').addClass('btn-default');
                $j('.makeDe > span:nth-child(1)').removeClass('glyphicon-check');
                $j('.makeDe > span:nth-child(1)').addClass('glyphicon-unchecked');
                
                $j(this).toggleClass('btn-success');
                $j('#' + this.id + ' > span:nth-child(1)').toggleClass('glyphicon-check glyphicon-unchecked');
                $j('.makeDe').each(function(){
                    var b = this.id;
                    b=parseInt(b.substring(7)) -1 || 0;//ID viejo
                    j.images[b].defaultImage = false;
                });
                j.images[a].defaultImage = true;
            });
            
            $j('.defualt-movie-th').click(function(){
                var ix = this.attributes.myindex.value;
                var px = this.attributes.mypicture.value;
                var th = $j('#image-' + ix + px).attr('src');
                j.images[ix-1]['thumb']=px;
                $j('#image-'+ix).attr('src',th);
                $j('img').removeClass('selectednew');
                $j('#image-' + ix + px).addClass('selectednew');
            });
            
            $j('.sendTo').click(function(){
                var a = this.id;
                a=a.substring(7);//ID viejo
                $j('#ocr_text').val($j('#pdfText-' + a).val());
            });
            $j('.pdfButton').click(function(){
                //move to top of iden selected images o make default
                var a = this.id;
                var maxPages = this.attributes.cantpages.value;
                a=a.substring(7);//ID viejo
                var new_page = parseInt($j('#pagPDF-'+ a).val());
                if (new_page>0 && new_page <= parseInt(maxPages)){
                    var btn = $j(this).button('loading');
                    $j.ajax({
                            method: 'POST',
                            url: 'hooks/_resampledIMG.php',
                            data: { cmd:        'newPDF', 
                                    $source:    j.images[a-1].name, 
                                    $fileName:  j.images[a-1].fileName, 
                                    $ext:       j.images[a-1].extension,
                                    $folder:    j.images[a-1].folder_base, 
                                    $page:      new_page
                                },
                            dataType: 'text'
                          })
                          .done(function(response){
                               if( response === 'true' ) {
                                    date = new Date();
                                    var last =$j('#image-' + a).attr("src") + '?m=' + date.getTime();
                                    $j("#image-" + a).attr("src", last );
                                    btn.button('reset');
                               }
                          });
                }else{
                    alert('Select a number behaind 1 and ' + maxPages );
                }
            });
            $j('.remove').click(function(){
                var a = this.id;
                a=a.substring(7);
//                'remove-'=7
                d.images.push(j.images[a-1]);
                j.images.splice(a - 1,1);
                $j('.index-' + a).remove();
                $j('.remove').each(function(index){
                   $j(this).attr('id','remove-'+(index + 1));
                });
                $j('.Gallery').each(function(index){
                   $j(this).removeClass(function (index, className) {
                        return (className.match (/(^|\s)panel-\S+/g) || []).join(' ');
                    });
                   $j(this).addClass('panel-'+(index + 1));
                });
                return j;
            });
            $j('.aprove').click(function(){
                var a = this.id;
                a=a.substring(7);
                console.log(j.images[a-1].aproveUpload);
                if (j.images[a-1].aproveUpload === 'false'){
                    j.images[a-1].aproveUpload = 'true';
                    $j('#aprove-' + a + ' > span').removeClass('glyphicon-thumbs-down');
                    $j('#aprove-' + a + ' > span').addClass('glyphicon-thumbs-up');
                    $j('#aprove-' + a).toggleClass('btn-success');
                }else{
                    j.images[a-1].aproveUpload = 'false';
                    $j('#aprove-' + a + ' > span').removeClass('glyphicon-thumbs-up');
                    $j('#aprove-' + a + ' > span').addClass('glyphicon-thumbs-down');
                    $j('#aprove-' + a).toggleClass('btn-default');
                }
                
            });
        });
    </script>
    <?php 
    }
    $form = ob_get_contents();
    ob_get_clean();
    return $form;
}

function otherFiles($a,$folder,$largo, $indice,$tableName){
    if (!$largo){
        $largo = 20;
    }
    $dir = dirname(__FILE__) ;
    $fo = $a['folder_base'];
    if ( !empty($fo)){
        $folderO = substr ($fo,1).'/upload'; //original
        $folderT = substr ($fo,1).'/th'; //thumbs
        $folderL = substr ($fo,1).'/LO'; //loRes
    }else{
        $folderO = $folder; //original
        $folderT = $folder; //thumbs
        $folderL = $folder; //loRes
    }
    $form ='';
    $name = $a['name'];
    $size = FileSizeConvert(filesize ( $dir .'/../' . $folderO.'/' . $a['fileName']));
    if ($largo < strlen($a['name'])){
        // le nombre es mayor que el código
        $name = substr($a['name'],0, $largo - 3). '...';
    }

    ob_start();
    ?>
        <tr>
            <td><?php echo $name; ?></td>
            <td>
                <?php 
                    if ( isset($a['size']) && $a['size'] !== 'false'){
                        echo $a['size'].'-('.$size.')';
                    }else{
                        echo $size; 
                    }
                ?>
            </td>
            <td><?php echo $a['extension']; ?></td>
            <td>
                <?php 
                    //preguntar si puede bajar habilitar el boton de bajar..
                    if ($tableName === 'sinagoga'){
                        $ret = processRequest('check', $indice, $a['fileName']);
                        if ($ret){
                            //puede desacargar
                            //cuando puede desacargar? cuando este autorizado
                            if ($ret === 'false'){
                                //todavía no esta autorizado
                                ?> 
                                    <a href="#" target="_blank" title="<?php echo $name; ?>" class="btn btn-warning" disabled>
                                        <i class="glyphicon glyphicon-cloud-download"></i>
                                    </a>
                                <?php
                            }else{
                                //esta autorizado
                                ?> 
                                    <a href="<?php echo $folderO.'/'.$a['fileName']; ?>" target="_blank" title="<?php echo $name; ?>" class="btn btn-warning" download>
                                        <i class="glyphicon glyphicon-cloud-download"></i>
                                    </a>
                                <?php
                            }
                        }else{
                            //solicitar autorización.
                            ?> 
                                <a href="#" filename = "<?php echo $a['fileName']; ?>" title="Request Download" class="request btn btn-success" >
                                    <i class="glyphicon glyphicon-comment"></i>
                                </a>
                            <?php
                        }
                    } else {
                    //no estamos en sinagoga
                        ?> 
                            <a href="<?php echo $folderO.'/'.$a['fileName']; ?>" target="_blank" title="<?php echo $name; ?>" class="btn btn-warning" download>
                                <i class="glyphicon glyphicon-cloud-download"></i>
                            </a>
                        <?php
                        
                    }
                ?>
            </td>
        </tr>
    <?php
    $form .= ob_get_contents();
    ob_get_clean();
    return $form;       
}
function myscripts($indice){
    ob_start();
    ?>
    <script>
        //pedir la descarga del archivo
        $j(function(){
            $j('.request').click(function(){
                var btn = this;
                $j(this).attr('disabled', true);
                requestDownload(btn,"<?php echo $indice; ?>");
            });
            //windows modal for video
            $j('.launch-modal').on('click', function(e){
                e.preventDefault();
                $j( '#' + $j(this).data('modal-id') ).modal();
            });
        });
        //controlar si puede bajar el archivo
        //habilitar el boton de descarga y desabilitar el boton de pedido
    </script>
    <?php
    $ret = ob_get_contents();
    ob_get_clean();
    return $ret;       
}

function FileSizeConvert($bytes){
    $result = 0;
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}

function cmp(array $a, array $b) {
    if ($a['fileName'] < $b['fileName']) {
        return -1;
    } else if ($a['fileName'] > $b['fileName']) {
        return 1;
    } else {
        return 0;
    }
}

function ModalVideo($index,$url,$title){
    //https://azmind.com/bootstrap-tutorial-modal-video/
    ob_start();
    ?>
        <div class="myVideo modal fade in" id="modal-video-<?php echo $index;?>" tabindex="-1" role="dialog" aria-labelledby="modal-video-label">
                <div class="myVideo modal-dialog" role="document">
                        <div class="myVideo modal-content">
                                <div class="myVideo modal-header">
                                        <button type="button" class="myVideo close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h3 class="myVideo modal-title"><?php echo $title;?></h3>
                                </div>
                                <div class="myVideo modal-body">
                                        <div class="myVideo modal-video">
                                                <div align="center" class="embed-responsive embed-responsive-16by9">
                                                    <video id="video-mp4-<?php echo $index;?>"  controls class="embed-responsive-item">
                                                        <source src="<?php echo $url;?>" type="video/mp4">
                                                    </video>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
    <?php
    $ret = ob_get_contents();
    ob_get_clean();
    return $ret;
}

function videoScripts($indice){
    ob_start();
    ?>
    <script>
        $j(function(){
            var indice = '<?php echo $indice;?>';
            //windows modal for video
            $j('.launch-modal').on('click', function(e){
                e.preventDefault();
                $j( '#' + $j(this).data('modal-id') ).modal();
            });
            $j('.close').click(function(){
                $j('#video-mp4-' + indice).trigger('load');
            });
        });
    </script>
    <?php
    $ret = ob_get_contents();
    ob_get_clean();
    return $ret;       
}

function ModalAudio($index,$url,$title){
    //https://azmind.com/bootstrap-tutorial-modal-video/
    ob_start();
    ?>
        <div class="myAudio modal-audio">
                <div align="center" class="">
                    <audio id="audio-<?php echo $index;?>"  controls class="embed-responsive-item" style="width: 100%;">
                        <source src="<?php echo $url;?>">
                    </audio>
                </div>
        </div>

    <?php
    $ret = ob_get_contents();
    ob_get_clean();
    return $ret;
}

function audioScripts($indice){
    ob_start();
    ?>
    <script>
//        $j('#audio-<?php //echo $indice;?>').mediaPlayer();
    </script>
    <?php
    $ret = ob_get_contents();
    ob_get_clean();
    return $ret;       
}


//
//{"images":[
//  {
//      "response-type":"success",
//      "defaultImage":false,
//      "isRenamed":false,
//      "fileName":"safra21.mp4",
//      "extension":"mp4",
//      "name":"safra21",
//      "type":"mov",
//      "hd_image":null,
//      "folder":"/srv/www/htdocs/safra/safra/images/upload",
//      "folder_base":"/safra/images",
//      "size":"false",
//      "userUpload":"admin",
//      "aproveUpload":true
//      }
//      ]}