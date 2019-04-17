<?php
// 
// Author: Alejandro Landini
// _nombre_ajax-checkfiles.php 4/6/18
//

	/* Checks if provided 'path' is a path to a valid */
	$current_dir = dirname(__FILE__);
	include("{$current_dir}/../lib.php");
	
	/* check access */
	$mi = getMemberInfo();
	if (!$mi['admin'] || !(isset($_REQUEST['f']) xor isset($_REQUEST['path']) xor isset($_FILES['uploadedFile']))){
            exit404();
        }
        $maxFileUpload = ini_get('max_file_uploads');
	
        if(isset($_REQUEST['path'])){
            $path = realpath(trim($_REQUEST['path']));
            if(!is_dir($path)) {exit404();}
        }
        
	    if (isset($_REQUEST['path'])){
            $files = scandir($path);
        }

        if (isset($_REQUEST['f'])){
            
            $files = json_decode($_REQUEST['f']);
        }

        if (isset($_FILES['uploadedFile'])){
            $files = $_FILES['uploadedFile']['name'];
        }
        
        $myFiles = filesArray($files, $path,$maxFileUpload);
        
        if (isset($_POST['cmd']) && $_POST['cmd'] === 'i'){
            //start to import files
            $ret = json_encode(checkInsert($myFiles));
            echo $ret;
            return ;
        }
            
        $myFiles = json_encode($myFiles);
        
        echo $myFiles;
        
        
/********************************************************************/
	function filesArray($files, $path,$maxUpload){
            foreach($files as $file){
              $msg ='';
              $f= pathinfo($file);
              $code = getCodeFile($f['filename']);
              $myFiles[] = json_encode(array(
                        "valid"    => checkCode($code,$msg),
                        "code"     => $code,
                        "fileName" => $file,
                        "folder"   => $path,
                        "newName"  => $f['filename'],
                        "msg"      => $msg,
                        "mxu"      => $maxUpload
                ));
            }
            return $myFiles;
        }
        
	function exit404(){
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		exit;
	}

        function checkCode($code, &$msg){
            $ret = 'error';
            if ($code){
                $ret = getCodeID($code, $msg);
                if($ret){
                   $ret = 'update'; 
                    $msg .= ' - Este código já existe no banco de dados, ele será adicionado ao item.';
                }else{
                    $ret = 'insert';
                    $msg .= "Este código não existe no banco de dados, será criado um novo item.";
                }
                
            }else{
                $msg .= ' - Este código não é válido.';
            }
            return $ret;
            
        }
        
        
        
        function chekFileItem($file,$code,&$id){
            $ret = FALSE;
            $uploaded = getIdItem($code,$id);
            $uploaded = json_decode($uploaded,TRUE);
            foreach ($uploaded['images'] as $k){
                $key = $k['fileName'];
                if($key === $file ){
                    $ret = TRUE;
                    break ;
                }
            }
            return $ret;
        }
        
        function insertRecord($code, &$eo){
            $codes = explode("_",$code);

            $col = sqlValue("select id from colecao where codigo_colecao='{$codes[0]}'");
            $grp = sqlValue("select id from grupo where codigo_grupo='{$codes[1]}'");
            $ser = sqlValue("select id from serie where codigo = '{$codes[2]}'");

            $set['identificacao'] = $code;
            $set['colecao'] = $col;//0
            $set['grupo'] = $grp;//1
            $set['serie'] = $ser;//2
            $set['tipologia'] = '1';//REQUIRED
            $set['numero_serie'] = intval($codes[3]);//REQUIRED
            $set['descricao'] = 'ENVIADO EM LOTE';
            insert('item',$set,$eo);
            $recID = db_insert_id(db_link());
            return $recID;
        }

        //develve el id del código de indentificación
        function getCodeID($code,&$msg){
            $codes = explode("_",$code);

            $col = sqlValue("SELECT id from colecao where codigo_colecao='{$codes[0]}'");
            $grp = sqlValue("SELECT id from grupo where codigo_grupo='{$codes[1]}'");
            $ser = sqlValue("SELECT id from serie where codigo = '{$codes[2]}'");

            if (!$col && !$grp && !$ser){
                $msg .= " Erro no código: Coleção, Grupo ou Código não exitem. [$col, $grp, $ser]";
                return 0;
            }

            $ret = sqlValue("SELECT id from item where identificacao = '$code'");

            return $ret;

        }
        // obtengo el código del archivo
        function getCodeFile($fileName){
            $codes = explode("_",$fileName);
            $code = $codes[0]."_".$codes[1]."_".$codes[2]."_". $codes[3];
            return $code;
        }
        
        function checkInsert($myFiles){

            $current_dir = dirname(__FILE__);
            include_once '_resampledIMG.php';
            include('multipleUpload/AppGiniPlugin.php');
            $plugin = new AppGiniPlugin();
            
            // i need the select files to import
            $mi = getMemberInfo();
                        
            $i=0;
            $dir = $current_dir . '/..';
            $plugin ->folder = '/arquivos/images';
            $ret =[];
            foreach ($myFiles as $myF){
                $f=json_decode($myF);
                $code = $f->code;
                $valid = $f->valid;
                $b = pathinfo($f->fileName);
                //add new item
                if ($valid != 'error'){
                    if ($valid === 'insert' ) $id = insertRecord($code, $eo);
                    if ($valid === 'update' ) $id = getCodeID($code, $msg);
                    $uploaded = getIdItem($code);
                    $uploaded = json_decode($uploaded,TRUE);
                    //add the file to item, need id new record
                    if($id >0 ){
                            $target = $dir. $plugin ->folder. '/upload/' . $f->fileName;
                            move_uploaded_file( $_FILES['uploadedFile']['tmp_name'][$i], $target);
                            //add thumbsnail
                            $tumb = make_thumb($f->fileName,$b['filename'], $b['extension'], $plugin, $pag);
                            //agregar a la tabla de files
                            
                            //file uploaded successfully							
                            $json = array(
                                    "response-type" => "success",
                                    "defaultImage"  => false,
                                    "isRenamed"     => 'false',
                                    "fileName"      => $b['basename'],
                                    "extension"     => $b['extension'],
                                    "name"          => $b['filename'],
                                    "type"          => $plugin->type,
                                    "hd_image"      => $tumb,
                                    "folder"        => $dir,
                                    "folder_base"   => $plugin->folder,
                                    "size"          => $plugin->size,
                                    "userUpload"    => $mi['username'],
                                    "aproveUpload"  => 'true'
                            );
                            if(empty($uploaded)){
                                $json= json_encode($json);
                                $json="{\"images\": [$json]}";
                                
                            }else{
                                $uploaded['images'][]= $json; 
                                $json = json_encode($uploaded);
                            }
                            
                            $fin = sql("UPDATE item SET uploads= '{$json}' WHERE id = '{$id}' ",$eo);
                            
                            if ($fin) {$f->valid = 'success';}else{$f->valid = 'error';}
                            $f->msg = "update item: $fin";
                    }else{
                        $f->valid = 'error';
                        $f->msg = $eo;
                    }
                    $ret[] = json_encode($f);
                }else{
                    $ret[] = $myF;
                }
                $i++;
            }
            //make thumbs and images lo if the image is >1200px
            echo json_encode($ret);
            return $ret ;
        }
        
        function getIdItem($code){
            //error if the code exist!
            $ret = sqlValue("SELECT uploads FROM item WHERE identificacao = '{$code}' ");
            return $ret;
        }