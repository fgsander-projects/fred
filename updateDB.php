<?php
	// check this file's MD5 to make sure it wasn't called before
	$prevMD5=@implode('', @file(dirname(__FILE__).'/setup.md5'));
	$thisMD5=md5(@implode('', @file("./updateDB.php")));
	if($thisMD5==$prevMD5){
		$setupAlreadyRun=true;
	}else{
		// set up tables
		if(!isset($silent)){
			$silent=true;
		}

		// set up tables
		setupTable('item', "create table if not exists `item` (   `id` INT unsigned not null auto_increment , primary key (`id`), `titulo` TEXT null , `titulo_atribuido` VARCHAR(40) null , `descricao` TEXT null , `identificacao` VARCHAR(80) not null , unique `identificacao_unique` (`identificacao`), `colecao` INT unsigned not null , `colecao_codigo` INT unsigned null , `grupo` INT unsigned not null , `grupo_codigo` INT unsigned null , `serie` INT unsigned not null , `serie_codigo` INT unsigned null , `subserie` INT unsigned null , `numero_serie` INT not null , `tipologia` INT unsigned not null , `date` DATE null , `data_livre` VARCHAR(120) null , `data_atribuida` VARCHAR(40) null , `autoria` TEXT null , `quantidade` VARCHAR(40) null , `idioma` BLOB null , `local_producao` TEXT null , `local_publicacao_veiculo` INT unsigned null , `local_publicacao` TEXT null , `tipo_publicacao` INT unsigned null , `genero` INT unsigned null , `forma` TEXT null , `formato` INT unsigned null , `escritura` TEXT null , `suporte` INT unsigned null , `dimensao` VARCHAR(120) null , `estado_conservacao` TEXT null , `observacoes` TEXT null , `documentos_relacionados` INT unsigned null , `numero_caixa` INT unsigned null , `nome_caixa` INT unsigned null , `numero_pasta` INT unsigned null , `nome_pasta` INT unsigned null , `upload` VARCHAR(40) null , `usuario_cadastro` VARCHAR(80) null , `usuario_alteracao` VARCHAR(80) null , `publicar` VARCHAR(40) null , `uploads` TEXT null ) CHARSET utf8", $silent);
		setupIndexes('item', array('colecao','grupo','serie','subserie','tipologia','local_publicacao_veiculo','tipo_publicacao','genero','formato','suporte','documentos_relacionados','numero_caixa','nome_caixa','numero_pasta','nome_pasta'));
		setupTable('colecao', "create table if not exists `colecao` (   `id` INT unsigned not null auto_increment , primary key (`id`), `colecao` VARCHAR(80) not null , `codigo_colecao` VARCHAR(20) not null ) CHARSET utf8", $silent);
		setupTable('grupo', "create table if not exists `grupo` (   `id` INT unsigned not null auto_increment , primary key (`id`), `colecao` INT unsigned null , `grupo` VARCHAR(80) not null , `codigo_grupo` VARCHAR(20) not null , unique `codigo_grupo_unique` (`codigo_grupo`)) CHARSET utf8", $silent);
		setupIndexes('grupo', array('colecao'));
		setupTable('serie', "create table if not exists `serie` (   `id` INT unsigned not null auto_increment , primary key (`id`), `grupo` INT unsigned not null , `serie` VARCHAR(80) not null , `codigo` INT(2) zerofill not null ) CHARSET utf8", $silent);
		setupIndexes('serie', array('grupo'));
		setupTable('subserie', "create table if not exists `subserie` (   `id` INT unsigned not null auto_increment , primary key (`id`), `serie` INT unsigned not null , `subserie` VARCHAR(80) not null ) CHARSET utf8", $silent);
		setupIndexes('subserie', array('serie'));
		setupTable('tipologia', "create table if not exists `tipologia` (   `id` INT unsigned not null auto_increment , primary key (`id`), `tipologia` VARCHAR(80) not null , unique `tipologia_unique` (`tipologia`)) CHARSET utf8", $silent);
		setupTable('idioma', "create table if not exists `idioma` (   `id` INT unsigned not null auto_increment , primary key (`id`), `idioma` VARCHAR(80) not null , unique `idioma_unique` (`idioma`)) CHARSET utf8", $silent);
		setupTable('local_comunicacao', "create table if not exists `local_comunicacao` (   `id` INT unsigned not null auto_increment , primary key (`id`), `local_comunicacao` VARCHAR(80) not null , unique `local_comunicacao_unique` (`local_comunicacao`)) CHARSET utf8", $silent);
		setupTable('tipo_publicacao', "create table if not exists `tipo_publicacao` (   `id` INT unsigned not null auto_increment , primary key (`id`), `tipo_publicacao` VARCHAR(80) not null , unique `tipo_publicacao_unique` (`tipo_publicacao`)) CHARSET utf8", $silent);
		setupTable('genero', "create table if not exists `genero` (   `id` INT unsigned not null auto_increment , primary key (`id`), `genero` VARCHAR(80) not null , unique `genero_unique` (`genero`)) CHARSET utf8", $silent);
		setupTable('formato', "create table if not exists `formato` (   `id` INT unsigned not null auto_increment , primary key (`id`), `formato` VARCHAR(80) not null , unique `formato_unique` (`formato`)) CHARSET utf8", $silent);
		setupTable('suporte', "create table if not exists `suporte` (   `id` INT unsigned not null auto_increment , primary key (`id`), `suporte` VARCHAR(80) not null , unique `suporte_unique` (`suporte`)) CHARSET utf8", $silent);
		setupTable('numero_caixa', "create table if not exists `numero_caixa` (   `id` INT unsigned not null auto_increment , primary key (`id`), `numero_caixa` VARCHAR(80) not null , unique `numero_caixa_unique` (`numero_caixa`)) CHARSET utf8", $silent);
		setupTable('nome_caixa', "create table if not exists `nome_caixa` (   `id` INT unsigned not null auto_increment , primary key (`id`), `numero_caixa` INT unsigned not null , `nome_caixa` TEXT not null ) CHARSET utf8", $silent);
		setupIndexes('nome_caixa', array('numero_caixa'));
		setupTable('numero_pasta', "create table if not exists `numero_pasta` (   `id` INT unsigned not null auto_increment , primary key (`id`), `numero_pasta` VARCHAR(80) not null , unique `numero_pasta_unique` (`numero_pasta`)) CHARSET utf8", $silent);
		setupTable('nome_pasta', "create table if not exists `nome_pasta` (   `id` INT unsigned not null auto_increment , primary key (`id`), `numero_pasta` INT unsigned not null , `nome_pasta` TEXT not null ) CHARSET utf8", $silent);
		setupIndexes('nome_pasta', array('numero_pasta'));
		setupTable('items_salvos', "create table if not exists `items_salvos` (   `id` INT unsigned not null auto_increment , primary key (`id`), `memberID` VARCHAR(40) null , `tableName` VARCHAR(40) null , `pkValue` VARCHAR(40) null , `groupID` VARCHAR(40) null , `dateAdded` VARCHAR(40) null , `text` TEXT null ) CHARSET utf8", $silent, array( "ALTER TABLE `table17` RENAME `items_salvos`","UPDATE `membership_userrecords` SET `tableName`='items_salvos' where `tableName`='table17'","UPDATE `membership_userpermissions` SET `tableName`='items_salvos' where `tableName`='table17'","UPDATE `membership_grouppermissions` SET `tableName`='items_salvos' where `tableName`='table17'","ALTER TABLE items_salvos ADD `field1` VARCHAR(40)","ALTER TABLE `items_salvos` CHANGE `field1` `id` VARCHAR(40) null ","ALTER TABLE `items_salvos` CHANGE `id` `id` INT unsigned not null auto_increment ","ALTER TABLE items_salvos ADD `field2` VARCHAR(40)","ALTER TABLE `items_salvos` CHANGE `field2` `memberID` VARCHAR(40) null ","ALTER TABLE items_salvos ADD `field3` VARCHAR(40)","ALTER TABLE `items_salvos` CHANGE `field3` `tableName` VARCHAR(40) null ","ALTER TABLE items_salvos ADD `field4` VARCHAR(40)","ALTER TABLE `items_salvos` CHANGE `field4` `pkValue` VARCHAR(40) null ","ALTER TABLE items_salvos ADD `field5` VARCHAR(40)","ALTER TABLE `items_salvos` CHANGE `field5` `groupID` VARCHAR(40) null ","ALTER TABLE items_salvos ADD `field6` VARCHAR(40)","ALTER TABLE `items_salvos` CHANGE `field6` `dateAdded` VARCHAR(40) null ","ALTER TABLE items_salvos ADD `field7` VARCHAR(40)","ALTER TABLE `items_salvos` CHANGE `field7` `text` VARCHAR(40) null "," ALTER TABLE `items_salvos` CHANGE `text` `text` TEXT null "));


		// save MD5
		if($fp=@fopen(dirname(__FILE__).'/setup.md5', 'w')){
			fwrite($fp, $thisMD5);
			fclose($fp);
		}
	}


	function setupIndexes($tableName, $arrFields){
		if(!is_array($arrFields)){
			return false;
		}

		foreach($arrFields as $fieldName){
			if(!$res=@db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")){
				continue;
			}
			if(!$row=@db_fetch_assoc($res)){
				continue;
			}
			if($row['Key']==''){
				@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
			}
		}
	}


	function setupTable($tableName, $createSQL='', $silent=true, $arrAlter=''){
		global $Translation;
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)){
			$matches=array();
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/", $arrAlter[0], $matches)){
				$oldTableName=$matches[1];
			}
		}

		if($res=@db_query("select count(1) from `$tableName`")){ // table already exists
			if($row = @db_fetch_array($res)){
				echo str_replace("<TableName>", $tableName, str_replace("<NumRecords>", $row[0],$Translation["table exists"]));
				if(is_array($arrAlter)){
					echo '<br>';
					foreach($arrAlter as $alter){
						if($alter!=''){
							echo "$alter ... ";
							if(!@db_query($alter)){
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							}else{
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				}else{
					echo $Translation["table uptodate"];
				}
			}else{
				echo str_replace("<TableName>", $tableName, $Translation["couldnt count"]);
			}
		}else{ // given tableName doesn't exist

			if($oldTableName!=''){ // if we have a table rename query
				if($ro=@db_query("select count(1) from `$oldTableName`")){ // if old table exists, rename it.
					$renameQuery=array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)){
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					}else{
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				}else{ // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			}else{ // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)){
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				}else{
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}
		}

		echo "</div>";

		$out=ob_get_contents();
		ob_end_clean();
		if(!$silent){
			echo $out;
		}
	}
?>