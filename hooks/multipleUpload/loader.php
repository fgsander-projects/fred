<?php
	function load_plugins_resources(){
                $resources_dir = dirname(__FILE__);
		$base_dir = realpath("{$resources_dir}/../..");
		$plugins_dir = realpath("{$resources_dir}");
                
		$error_msgs = array();
		$plugins_error = false;
                $folder = '/arquivos/images';
                
		if( !@include("{$base_dir}/lib.php") ) $plugins_error = true;
		if( !@include("{$resources_dir}/AppGiniPlugin.php") ) $plugins_error = true;
                
                if (isset($_POST['folder'])) $folder =$_POST['folder'];
                $foldersConfig = new AppGiniPlugin();
		$foldersConfig ->folder= $folder;
		
		if($plugins_error) $error_msgs[] = "The plugin was not installed correctly, you must put it inside the plugins folder under you main AppGini application folder.";
                
                $base_dir .=$foldersConfig ->folder;
                $original_dir = $base_dir.$foldersConfig ->original;
                $thumbs_dir = $base_dir.$foldersConfig ->thumbs;
                $loRes_dir = $base_dir.$foldersConfig ->loRes;
                        
		/* Ensure that the projects folder has write permission */
		if ( !is_dir("{$base_dir}")){
			if (! @mkdir ( "{$base_dir}" , 0775)){
				$error_msgs[] = 'Could not create images directory.<br>Please create \'' . $base_dir. '\' directory inside the edirectory.';		
			}
		}
		if ( !is_dir($original_dir )){
			if (! @mkdir ( $original_dir , 0775)){
				$error_msgs[] = 'Could not create images directory.<br>Please create \'' . $original_dir . '\' directory inside the edirectory.';		
			}
		}
		if ( !is_dir($thumbs_dir )){
			if (! @mkdir ( $thumbs_dir , 0775)){
				$error_msgs[] = 'Could not create images directory.<br>Please create \'' . $thumbs_dir . '\' directory inside the edirectory.';		
			}
		}
		if ( !is_dir($loRes_dir )){
			if (! @mkdir ( $loRes_dir , 0775)){
				$error_msgs[] = 'Could not create images directory.<br>Please create \'' . $loRes_dir . '\' directory inside the edirectory.';		
			}
		}
		if ( ! is_writable( "$base_dir" )){
			$error_msgs[] = 'Please, change the permission of the \'' . $base_dir. '\' folder to be writeable.';		
		}
		if ( ! is_writable( "$original_dir" )){
			$error_msgs[] = 'Please, change the permission of the \'' . $original_dir . '\' folder to be writeable.';		
		}
		if ( ! is_writable( "$thumbs_dir" )){
			$error_msgs[] = 'Please, change the permission of the \'' . $thumbs_dir . '\' folder to be writeable.';		
		}
		if ( ! is_writable( "$loRes_dir" )){
			$error_msgs[] = 'Please, change the permission of the \'' . $loRes_dir . '\' folder to be writeable.';		
		}
		if(count($error_msgs)){
			?>
				<div class="container" style="margin-top: 5em;">
					<div class="panel panel-danger">
						<div class="panel-heading"><h3 class="panel-title">Error:</h3></div>
						<div class="panel-body">
							<p class="text-danger"><?php echo implode('<br>&bull; ', $error_msgs); ?></p>
						</div>
					</div>
				</div>
			<?php 
			exit;
		}
	}

	load_plugins_resources();
