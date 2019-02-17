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
                        "valid"    => isValidFile($file,$completeCode,$msg),
                        "fileName" => $file,
                        "folder"   => $path,
                        "newName"  => $completeCode,
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

        function isValidFile($file, &$completeCode, &$msg){
           
            $ret = checkCode(pathinfo($file), $completeCode,$msg);
            
            return $ret;
        }
        
        function checkCode($file, &$completeCode, &$msg){
            $ret = 'error';
            $a = explode("_", $file['filename']);//get genero code
            //check if a valid item name
            $cod = ifGenCode($a[0]);
            if (isset($a[1]) && $cod >0){
                ControlNumbers($a[1],$completeCode,$child,$msg);
                $ret = availableCodeItem($a[0]."_".$completeCode,$id);
                if ($ret === 'success'){
                    //check chidknumber
                    $ret = checkChild($child, $msg);
                }else{
                    $msg .= ' - The item code it is not available - ';
                }
                $ret = chekFileItem($a[0]."_".$completeCode.".".$file['extension'], $a[0] . "_" . $completeCode ,$id);
                $completeCode = $a[0]."_".$completeCode.".".$file['extension'];
                if($ret){
                   $ret = 'error'; 
                    $msg .= ' - The file name it\'s already uploaded - ';
                }
                
            }else{
                $msg .= ' - The genero code it is not valid o the root code dont exist - ';
            }
            return $ret;
            
        }
        
        function ifGenCode($code){//chech in gen code exist
            $ret = sqlValue("SELECT id FROM genero WHERE base_codigo = '$code' ");
            return $ret;
        }
        
        function ControlNumbers($a, &$completeCode, &$child, &$msg){
            $b = explode("-",$a);//get numbers codes
            if ($b[0]==='SAFRA'){
                //check the other numbers
                if (intval($b[1])>0 && intval($b[2])>0 ){
                    //check if codenumber is available
                    $completeCode = $b[0]."-".rootCode($b[1])."-".childCode($b[2]);
                    $child=intval($b[2]);
                }else{
                    $msg .= ' - the root code and/or child code are invalid - ';
                    
                }
            }else {
                $msg .= ' - Not exist SAFRA code in the name of file - ';
            }
            return;
        }
        
        function rootCode($val){
            //format de root code
            return substr("000000" . $val, -6);
        }
        function childCode($val){
            //format de child code
            return substr("000" . $val, -3);
        }
        
        function availableCodeItem($code,&$id){
            //error if the code exist!
            $ret = sqlValue("SELECT id FROM safra_acervo WHERE codigoCompleto = '$code' ");
            $id=$ret;
            if ($ret) {$ret = 'success';}else{$ret='error';}
            return $ret;
        }
        
        function getIdItem($code,&$id){
            //error if the code exist!
            $ret = sqlValue("SELECT id FROM safra_acervo WHERE codigoCompleto = '$code' ");
            $id=$ret;
            $ret = sqlValue("SELECT uploadedFiles FROM safra_acervo WHERE codigoCompleto = '$code' ");
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
        
        function checkChild($code, &$msg){
            $ret = 'success';
            //if $code has =1 and code not exist its good return succes
            if ($code > 1) { 
                $ret = 'error';
                $msg .= ' - The child code is >1 - ';
            }
            //if code exist rename to next availble child.
                //if $code has >1 and code not exist need to rename to next child
                //if $code has =1 and code exist need to find the next child code.
                //if $code has >1 and code exist need to rename to next child code.
            return $ret;
        }
        
        function insertRecord($code, &$eo){
            $o['error']='';
            $a = explode("_", $code);
            $cod = ifGenCode($a[0]);//get genero code
            $b = pathinfo($code);
            $json = '';
            
            $data['genero'] = makeSafe($cod);
            $data['file_rel'] = '';
            $data['codigoBase'] = makeSafe($cod);
            $data['codigoCompleto'] = makeSafe($b['filename']);
            $data['titulo'] = makeSafe($b['filename']);
            $data['descricao'] = br2nl('import automatically: '. makeSafe($code) . ' ' . date('l jS \of F Y h:i:s A') );
            $data['suporte'] = '';
            $data['formato'] = '';
            $data['especie'] = '';
            $data['tipo'] = '';
            $data['cromia_icon'] = '';
            $data['data'] =  date('l jS \of F Y h:i:s A');
            $data['data'] = parseMySQLDate($data['data'], '');
            $data['autor'] = '';
            $data['empresa'] = '';
            $data['depto'] = '';
            $data['numero_item'] = '';
            $data['pais'] = '';
            $data['idioma'] = '';
            $data['tags'] = '';
            $data['paginas_text'] = '';
            $data['local_guarda'] = '';
            $data['ocr_text'] = '';
            $data['data_entrada'] =  date('l jS \of F Y h:i:s A');
            $data['data_entrada'] = parseMySQLDate($data['data_entrada'], '');
            $data['data_saida'] = '';
            $data['data_saida'] = parseMySQLDate($data['data_saida'], '');
            $data['usuario_cad'] = '';
            $data['uploadedFiles'] = $json;
            $data['numGenero'] = '';
            $data['manualCode'] = 'false';
            $data['Dimensao'] = '';
            
            $o = array('silentErrors' => true);
            sql('insert into `safra_acervo` set '
                    . '`genero`=' . (($data['genero'] !== '' && $data['genero'] !== NULL) ? "'{$data['genero']}'" : 'NULL') . 
                    ', `file_rel`=' . (($data['file_rel'] !== '' && $data['file_rel'] !== NULL) ? "'{$data['file_rel']}'" : 'NULL') . 
                    ', `codigoBase`=' . (($data['codigoBase'] !== '' && $data['codigoBase'] !== NULL) ? "'{$data['codigoBase']}'" : 'NULL') . 
                    ', `codigoCompleto`=' . (($data['codigoCompleto'] !== '' && $data['codigoCompleto'] !== NULL) ? "'{$data['codigoCompleto']}'" : 'NULL') .
                    ', `titulo`=' . (($data['titulo'] !== '' && $data['titulo'] !== NULL) ? "'{$data['titulo']}'" : 'NULL') .
                    ', `descricao`=' . (($data['descricao'] !== '' && $data['descricao'] !== NULL) ? "'{$data['descricao']}'" : 'NULL') . 
                    ', `suporte`=' . (($data['suporte'] !== '' && $data['suporte'] !== NULL) ? "'{$data['suporte']}'" : 'NULL') . 
                    ', `formato`=' . (($data['formato'] !== '' && $data['formato'] !== NULL) ? "'{$data['formato']}'" : 'NULL') . 
                    ', `especie`=' . (($data['especie'] !== '' && $data['especie'] !== NULL) ? "'{$data['especie']}'" : 'NULL') . 
                    ', `tipo`=' . (($data['tipo'] !== '' && $data['tipo'] !== NULL) ? "'{$data['tipo']}'" : 'NULL') . 
                    ', `cromia_icon`=' . (($data['cromia_icon'] !== '' && $data['cromia_icon'] !== NULL) ? "'{$data['cromia_icon']}'" : 'NULL') . 
                    ', `data`=' . (($data['data'] !== '' && $data['data'] !== NULL) ? "'{$data['data']}'" : 'NULL') . 
                    ', `autor`=' . (($data['autor'] !== '' && $data['autor'] !== NULL) ? "'{$data['autor']}'" : 'NULL') . 
                    ', `empresa`=' . (($data['empresa'] !== '' && $data['empresa'] !== NULL) ? "'{$data['empresa']}'" : 'NULL') . 
                    ', `depto`=' . (($data['depto'] !== '' && $data['depto'] !== NULL) ? "'{$data['depto']}'" : 'NULL') . 
                    ', `numero_item`=' . (($data['numero_item'] !== '' && $data['numero_item'] !== NULL) ? "'{$data['numero_item']}'" : 'NULL') . 
                    ', `pais`=' . (($data['pais'] !== '' && $data['pais'] !== NULL) ? "'{$data['pais']}'" : 'NULL') . 
                    ', `idioma`=' . (($data['idioma'] !== '' && $data['idioma'] !== NULL) ? "'{$data['idioma']}'" : 'NULL') . 
                    ', `tags`=' . (($data['tags'] !== '' && $data['tags'] !== NULL) ? "'{$data['tags']}'" : 'NULL') . 
                    ', `paginas_text`=' . (($data['paginas_text'] !== '' && $data['paginas_text'] !== NULL) ? "'{$data['paginas_text']}'" : 'NULL') .
                    ', `local_guarda`=' . (($data['local_guarda'] !== '' && $data['local_guarda'] !== NULL) ? "'{$data['local_guarda']}'" : 'NULL') .
                    ', `ocr_text`=' . (($data['ocr_text'] !== '' && $data['ocr_text'] !== NULL) ? "'{$data['ocr_text']}'" : 'NULL') . 
                    ', `data_entrada`=' . (($data['data_entrada'] !== '' && $data['data_entrada'] !== NULL) ? "'{$data['data_entrada']}'" : 'NULL') . 
                    ', `data_saida`=' . (($data['data_saida'] !== '' && $data['data_saida'] !== NULL) ? "'{$data['data_saida']}'" : 'NULL') . 
                    ', `usuario_cad`=' . "'{$data['usuario_cad']}'" . 
                    ', `uploadedFiles`=' . (($data['uploadedFiles'] !== '' && $data['uploadedFiles'] !== NULL) ? "'{$data['uploadedFiles']}'" : 'NULL') . 
                    ', `numGenero`=' . (($data['numGenero'] !== '' && $data['numGenero'] !== NULL) ? "'{$data['numGenero']}'" : 'NULL') . 
                    ', `manualCode`=' . (($data['manualCode'] !== '' && $data['manualCode'] !== NULL) ? "'{$data['manualCode']}'" : 'NULL') . 
                    ', `Dimensao`=' . (($data['Dimensao'] !== '' && $data['Dimensao'] !== NULL) ? "'{$data['Dimensao']}'" : 'NULL'), $o);
                    
            if($o['error']!=''){
                    $eo= $o['error'];
                    exit;
            }

            $recID = db_insert_id(db_link());

            // mm: save ownership data
            set_record_owner('safra_acervo', $recID, getLoggedMemberID());
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
            $plugin ->folder = '/safra/images';
            $ret =[];
            foreach ($myFiles as $myF){
                $f=json_decode($myF);
                $code = $f->newName;
                $valid = $f->valid;
                $b = pathinfo($code);
                //add new item
                if ($valid != 'error'){
//                    $id = insertRecord($code, $eo);
                    $uploaded = getIdItem($b['filename'],$id);
                    $uploaded = json_decode($uploaded,TRUE);
                    //add the file to item, need id new record
                    if($id >0 ){
                            $target = $dir. $plugin ->folder. '/upload/' . $code;
                            move_uploaded_file( $_FILES['uploadedFile']['tmp_name'][$i], $target);
                            //add thumbsnail
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
                            
                            $fin = sql("UPDATE safra_acervo SET uploadedFiles= '$json' WHERE id = '$id' ",$eo);
                            
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
        
        
        
        
        
        
        
        
        