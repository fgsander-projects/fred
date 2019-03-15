<?php
    $resources_dir = dirname(__FILE__);
//    $content=false;
    $folder = '';
    if (isset($_POST['folder'])) $folder =$_POST['folder'];
    include('loader.php');
    
    $spm = new AppGiniPlugin(array(
            'title' => 'Multimple upload files',
            'name' => 'muf',
            'logo' => ''
    ));
    $spm ->folder= $folder;
?>
<script src="hooks/multipleUpload/plugins-common.js"></script>
<!-- process notifications -->
<div style="height: 60px; margin: -15px 0 -45px;">
        <?php if(function_exists('showNotifications')) echo showNotifications(); ?>
</div>

<?php
    echo $spm->view("{$resources_dir}/load-project.php");
