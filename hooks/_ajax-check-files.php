<?php
// 
// Author: Alejandro Landini
// _nombre_ajax-checkfiles.php 4/6/18
// toDo: 
// revision:
//  *6/6/18 change function split by explode
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
              $myFiles[] = json_encode(array(
                        "valid"    => isValidFile($file,$msg),
                        "fileName" => $file,
                        "folder"   => $path,
                        "newName"  => $file,
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

        function isValidFile($file, &$msg){
           
            $ret = checkCode(pathinfo($file),$msg);
            
            return $ret;
        }
        
        function checkCode($file, &$msg){
            $ret = 'error';
            $a = $file['filename'];//get genero code
            if ($a){
                $ret = sqlValue("select identificacao from item where identificacao='$a'");
                if($ret){
                   $ret = 'error'; 
                    $msg .= ' - The file name it\'s already uploaded - ';
                }else{
                    //TODO: controlar que el nombre del file sea valido
                    $msg .= "ok to upload";
                }
                
            }else{
                $msg .= ' - The code it is not valid o the root code dont exist - ';
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
            $set['descricao'] = 'BATCH UPLOAD';
            insert('item',$set,$eo);
            $recID = db_insert_id(db_link());
            return $recID;
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
                $code = $f->newName;
                $valid = $f->valid;
                $b = pathinfo($code);
                //add new item
                if ($valid != 'error'){
                    $id = insertRecord($b['filename'], $eo);
                    $uploaded = getIdItem($b['filename'],$id);
                    $uploaded = json_decode($uploaded,TRUE);
                    //add the file to item, need id new record
                    if($id >0 ){
                            $target = $dir. $plugin ->folder. '/upload/' . $code;
                            move_uploaded_file( $_FILES['uploadedFile']['tmp_name'][$i], $target);
                            //add thumbsnail
                            //include('multipleUpload/loader.php');
                            $tumb = make_thumb($code,$b['filename'], $b['extension'], $plugin, $pag);
                            //agregar a la tabla de files
                            
                            //file uploaded successfully							
                            $json = array(
                                    "response-type" => "success",
                                    "defaultImage"  => false,
                                    "isRenamed"     => 'false',
                                    "fileName"      => $code,
                                    "extension"     => $b['extension'],
                                    "name"          => $b['filename'],
                                    "type"          => $plugin->type,
                                    "hd_image"      => $tumb,
                                    "folder"        => $dir,
                                    "folder_base"   => $plugin ->folder,
                                    "size"          => $plugin ->size,
                                    "userUpload"    => $mi['username'],
                                    "aproveUpload"  => 'true',
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
        
        function getIdItem($code,&$id){
            //error if the code exist!
            $id = sqlValue("SELECT id FROM item WHERE identificacao = '{$code}' ");
            $ret = sqlValue("SELECT uploads FROM item WHERE identificacao = '{$code}' ");
            return $ret;
        }
        
        
        
        
        
        
        