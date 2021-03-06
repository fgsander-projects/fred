                        <aside class="main-sidebar">
<!-- Sidebar user panel -->
      <!-- /.search form -->
                          <!-- sidebar: style can be found in sidebar.less -->
                          <section class="sidebar">
                            <!-- Sidebar Menu -->
                            <ul class="sidebar-menu" data-widget="tree">
                              <?php
                              /* accessible tables */
                              
                              $arrTables = get_tables_info();
                              $homeLinks=[];
                              @include("{$currDir}/hooks/links-home.php"); 
                              if(is_array($arrTables) && count($arrTables)){
                                  /* how many table groups do we have? */
                                  $groups = get_table_groups();
                                  $multiple_groups = (count($groups) > 1 ? true : false);

                                  /* construct $tg: table list grouped by table group */
                                  $tg = array();
                                  if(count($groups)){
                                          foreach($groups as $grp => $tables){
                                                  foreach($tables as $tn){
                                                          $tg[$tn] = $grp;
                                                          if ($tn === $x->TableName) {
                                                              $current_group = $grp;
                                                          }
                                                  }
                                          }
                                  }

                                    $len = 21;
                                    $i = 0; 
                                    //$ico_menu = '{"Table Group Index":"icon class"};
                                    //'Acervo', 'Cole&#231;&#227;o / Grupo / S&#233;rie / Subs&#233;rie', 'Identifica&#231;&#227;o', 'Localiza&#231;&#227;o
                                    $ico_menu = '{
                                                    "0":"fa fa-table",
                                                    "1":"fa fa-cog",
                                                    "2":"fa fa-pencil-square-o",
                                                    "3":"fa fa-map-pin"
                                                }';
                                    
                                    $json = json_decode($ico_menu,true);
                                    $ico = "fa fa-table"; //default ico
                                    // $ico = $json['ico'] ? $json['ico'] : $ico ;
                                  foreach ($groups as $lte_group => $lte_tables) {
                                      if (($lte_group !== 'hiddens' || $memberInfo['admin']) ){ // new fucntionality if table group named hiddens dont show in other users
                                        if (count($lte_tables)){
                                        ?>
                                              <li class="treeview <?php echo ($lte_group === $current_group ? 'active' : '');?>">
                                                  
                                                <a href="#"><i class="<?php echo $json[$i] ? $json[$i] : $ico; ?>"></i>
                                                    <span>
                                                        <?php 
                                                            $lte_group = htmlentities_to_utf8($lte_group);
                                                            $dot = (strlen($lte_group) > $len) ? "..." : "";
                                                            echo substr($lte_group,0,$len+3).$dot; 
                                                        ?>
                                                        <?php // echo $lte_group; ?>
                                                    </span>
                                                    <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                  
                                                <ul class="treeview-menu">
                                                    <?php
                                                            foreach ($lte_tables as $lte_table){
                                                                $tc = $arrTables[$lte_table];
                                                                $count_badge ='';
                                                                if($tc['homepageShowCount']){
                                                                    $sql_from = get_sql_from($lte_table);
                                                                    if ($lte_table === 'items_salvos'){
                                                                        $count_records = sqlValue("select count(1) from items_salvos where items_salvos.memberID ='" . getLoggedMemberID() . "'") ;
                                                                    }else{
                                                                        $count_records = ($sql_from ? sqlValue("select count(1) from " . $sql_from) : 0);
                                                                    }
                                                                    $count_badge = '<small class="label pull-right bg-green">' . number_format($count_records) . '</small>';
                                                                }
                                                                /* hide current table in homepage? */
                                                                $tChkHL = array_search($lte_table, array('ordersDetails','creditDocument','_resumeOrders', 'electronicInvoice','modalitaPagamento','codiceDestinatario','regimeFiscale','tipoCassa'));
                                                                if($tChkHL === false || $tChkHL === null){ /* if table is not set as hidden in homepage */ ?>
                                                                    <li class ="<?php echo ($lte_table === $x->TableName ? 'active' : ''); ?>">
                                                                        <a href="<?php echo $lte_table; ?>_view.php">
                                                                            <?php echo ($tc['tableIcon'] ? '<img src="' . $tc['tableIcon'] . '">' : '');?>
                                                                            <strong class="table-caption">
                                                                                <?php 
                                                                                    $caption =  htmlentities_to_utf8($tc['Caption']); 
                                                                                    $dot = (strlen($caption) > $len) ? "..." : "";
                                                                                    echo substr($caption,0,$len).$dot; 
                                                                                ?>
                                                                            </strong>
                                                                            <?php echo $count_badge; ?>
                                                                        </a>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            foreach($homeLinks as $link){
                                                                if(!isset($link['url']) || !isset($link['title'])) continue;
                                                                if($lte_group != $link['table_group'] && $lte_group != '*') continue;
                                                                if($memberInfo['admin'] || @in_array($memberInfo['group'], $link['groups']) || @in_array('*', $link['groups'])){
                                                                  $title = $link['subGroup'] ? $link['subGroup']." - ".$link['title'] : $link['title'];
                                                                  $dot = (strlen($title) > $len+3) ? "..." : "";
                                                                    ?>
                                                                    <li>
                                                                        <a href="<?php echo $link['url']; ?>" title="<?php echo $title; ?>">
                                                                              <?php echo ($link['icon'] ? '<img src="' . $link['icon'] . '">' : ''); ?>
                                                                              <?php echo substr($title,0,$len + 3).$dot; ?>
                                                                        </a>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                    ?>
                                                </ul>
                                              </li>
                                        <?php
                                        }else{
                                         ?>
                                         <li class="active"><a href="#"><i class="fa fa-link"></i> <span><?php echo $lte_group; ?></span></a></li>

                                        <?php
                                        }
                                      }
                                      $i++;
                                  }
                                  foreach($homeLinks as $link){
                                      if(!isset($link['url']) || !isset($link['title'])) continue;
                                      if($link['table_group'] != '*' && $link['table_group'] != '') continue;
                                      if($memberInfo['admin'] || @in_array($memberInfo['group'], $link['groups']) || @in_array('*', $link['groups'])){
                                          ?>
                                          <li>
                                              <a href="<?php echo $link['url']; ?>">
                                                  <?php echo ($link['icon'] ? '<img src="' . $link['icon'] . '">' : ''); ?>
                                                  <?php echo $link['subGroup'] ? $link['subGroup']." - ".$link['title'] : $link['title']; ?>
                                              </a>
                                          </li>
                                          <?php
                                      }
                                  }
                              }else{
                                  //ver si está solicitando registrarse???
                                  $script_name = basename($_SERVER['PHP_SELF']);
                                    if($script_name != 'membership_signup.php'){
                                      ?><script>window.location='index.php?signIn=1';</script><?php
                                    }
                              }
                              ?>

                            </ul>
                            <!-- /.sidebar-menu -->
                          </section>
                          <!-- /.sidebar -->
                        </aside>
