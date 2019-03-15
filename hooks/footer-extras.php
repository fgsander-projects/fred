<script>
    recountsItems();
<?php

$script_name = basename($_SERVER['PHP_SELF']);
if($script_name == 'index.php' && isset($_GET['signIn'])){
//in login page
    
}else{

$mi = getMemberInfo();
        if ($mi['groupID'] === '2'){ ?>
            <?php if (getLteStatus()){ ?>
                    $j('.nav.navbar-nav').prepend('<li><a class = "btn" onclick="importForm()" style="border-top-width: 0px;border-bottom-width: 0px;"><span class="fa fa-download"></span><span class="hidden-xs"> Importar arquivos </span></a></li>');
                    $j('.nav.navbar-nav').prepend('<li id="itemSalvos"><a href="items_salvos_view.php"><span class="fa fa-heart"></span><span class="hidden-xs"> Itens Salvos  </span><span class="label label-warning itemSalvos">--</span></a></li>');
            <?php }else{ ?>
                    $j('.navbar-right').prepend('<li><a onclick="importForm()"><span class="glyphicon glyphicon-import"></span> Importar arquivos </a></li>');
                    $j('.nav.navbar-nav.visible-xs').prepend('<a class = "btn navbar-btn btn-default btn-lg visible-xs" onclick="importForm()"><span class="glyphicon glyphicon-import"></span> Importar arquivos </a>');
                    $j('.navbar-right:not(.btn, .navbar-text), .nav.navbar-nav.visible-xs').prepend('<li id="itemSalvos"><a href="items_salvos_view.php">Itens Salvos  <span class="badge itemSalvos">--</span></a></li>');
            <?php } ?>
        <?php } ?>
        </script>
<?php } ?>
