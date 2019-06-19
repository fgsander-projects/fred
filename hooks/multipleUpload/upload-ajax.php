<?php

include(dirname(__FILE__) . '/AppGiniPlugin.php');
	 $folder = '';
    if (isset($_GET['f'])) $folder =$_GET['f'];
	$plugin = new AppGiniPlugin();
        $plugin ->folder = $folder;
	$plugin->process_ajax_upload();