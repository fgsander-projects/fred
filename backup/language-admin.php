<?php

    // IMPORTANT:
	// ==========
	// When translating, only translate the strings that are
	// TO THE RIGHT OF the equal sign (=).
	//
	// Do NOT translate the strings between square brackets ([])
	//
	// Also, leave the text between < and > untranslated.
	//
	// =====================================================
	// PLEASE NOTE:
	// ============
	// When a new version of AppGini is released, new strings
	// might be added to the "defaultLang.php" file. To translate
	// them, simply copy them to this file ("language.php") and 
	// translate them here. Do NOT translate them directly in 
	// the "defaultLang.php" file.
	// =====================================================
	// BRASILIAN PORTUGUESE / PORTUGUÊS BRASILEIRO
	// Tradução/Translator: Rodrigo Gomes Pedrosa 
	// State/Country: Paraíba - Brazil 
	// Translation date: 25/05/2016
	// Link to Translator page: http://instagram.com/pedrosapp
	// =====================================================

	
	// incHeader.php
	$Translation['membership management'] = "Área de Gestão";
	$Translation['password mismatch'] = "Incompatibilidade de Senha";
	$Translation['error'] = "Error";
	$Translation['invalid email'] = "Endereço de Email inválido";
	$Translation['sending mails'] = "O envio de emails poderá demorar um pouco. Por Favor, não feche está página até ver a mensagem 'Concluído'.";
	$Translation['complete step 4'] = "Por favor, complete a etapa 4, selecionando o usuário que deseja transferir registros para.";
	$Translation['info'] = "Info";
	$Translation['sure move member'] = 'Tem certeza de que deseja mover usuário \'<MEMBER>\' e seus dados de grupo \'<OLDGROUP>\' para o grupo \'<NEWGROUP>\'?';
	$Translation['sure move data of member'] = 'Tem certeza de que deseja mover os dados de usuário \'<OLDMEMBER>\' do grupo \'<OLDGROUP>\' ao usuário \'<NEWMEMBER>\' do grupo \'<NEWGROUP>\'?';
	$Translation['sure move all members'] = 'Tem certeza de que deseja mover todos os usuários e os dados do grupo \'<OLDGROUP>\' para o grupo \'<NEWGROUP>\'?';
	$Translation['sure move data of all members'] = 'Tem certeza de que deseja mover os dados de todos os usuários do grupo \'<OLDGROUP>\' ao usuário \'<MEMBER>\' do grupo \'<NEWGROUP>\'?';
	$Translation['toggle navigation'] = "Toggle de Navegação";
	$Translation['admin area'] = "Área do Administrador";
	$Translation['groups'] = "Grupos";
	$Translation['view groups'] = "Ver Grupos";
	$Translation['add group'] = "Add Grupos";
	$Translation['edit anonymous permissions'] = "Editar Permissões anônimas";
	$Translation['members'] = "Usuários";
	$Translation['view members'] = "Ver Usuários";
	$Translation['add member'] = "Add Usuários";
	$Translation["view members' records"] = "Ver registros dos usuários";  
	$Translation["utilities"] = "Utilidades"; 
	$Translation["admin settings"] = "Configurações do Administrador"; 
	$Translation["rebuild thumbnails"] = "Reconstruir Miniaturas"; 
	$Translation['rebuild fields'] = "Reconstruir Campos";
	$Translation['import CSV'] = "Importar dados CSV";
	$Translation['batch transfer'] = "Assistente para transferência de lote";
	$Translation['mail all users'] = "Envie para todos os usuários";
	$Translation['AppGini forum'] = "Fórum/Comunidade AppGini";
	$Translation["user's area"] = 'Área do Usuário';
	$Translation["sign out"] = "Sair";
	$Translation["attention"] = "Atenção!";
	$Translation['security risk admin'] = 'Você está usando o nome de usuário e senha de administrador padrão. Este é um enorme risco de segurança. Por favor, altere, pelo menos, a senha de administrador nas<a href="pageSettings.php"> Configurações de Administrador</a><em> imediatamente</em>.';
	$Translation['security risk'] = 'Você está usando a senha de administrador padrão. Este é um enorme risco de segurança. Por favor, altere a senha de administrador nas<a href="pageSettings.php"> Configurações de Administrador</a> <em>imediatamente</em>.' ;
	$Translation['plugins'] = 'Plugins';

	//pageAssignOwners.php
	$Translation["assigned table records to group"] = "Atribuir <NUMBER> registros na tabela '<TABLE>' o grupo '<GROUP>'";
	$Translation["assigned table records to group and member"] = "Atribuir <NUMBER> regristros na tabela '<TABLE>' o grupo '<GROUP>' , e o usuário '<MEMBERID>'";
	$Translation['data ownership assign'] = "Atribuir a propriedade os dados que não tem proprietários";
	$Translation['records ownership done'] = "Todos os registros agora possuem proprietários .<br>Voltar para<a href='pageHome.php'>Página Incial</a>.";
	$Translation['select group'] = "Selecionar Grupo";
	$Translation['data ownership'] = "As vezes, você pode ter tabelas com dados que foram inseridos antes de implementar este sistema de gestão, ou introduzidos com outras aplicações que desconhecem este mesmo sistema. Estes dados atualmente não tem donos. Esta página permite que você atribua grupos de proprietários e usuários proprietários a esses dados.";
	$Translation["table"] = "Tabela";
	$Translation["records with no owners"] = "Registros sem proprietários";
	$Translation["new owner group"] = "Novo Proprietário do Grupo";
	$Translation["new owner member"] = "Novo usuário proprietário*";	
	$Translation["cancel"] = "Cancelar";
	$Translation["assign new owners"] = "Atribuir novos proprietários";
	$Translation["please wait"] = "Por favor, aguarde ...";	
	$Translation["if no owner member assigned"] = '* Se você atribuir nenhum usuário proprietário aqui, você ainda pode usar o <a href="pageTransferOwnership.php">Assistente para transferência de lote</a> depois de o fazer.';
	
	//pageDeleteGroup.php
	$Translation["can not delete group remove members"] = 'Excluir este grupo. Por favor antes de tudo remova os usuários...';
	$Translation["can not delete group transfer records"] = 'Excluir este grupo. Por favor antes de tudo, transfira seus registros de dados para outro grupo...';
	
	//pageEditGroup.php
	$Translation["group exists error"] = "Error: Nome do grupo já existe. Você deve escolher um nome de grupo único.";
	$Translation["group not found error"] = "Error: Grupo não encontrado!";								 	
	$Translation["edit group"] = "Editar o grupo '<GROUPNAME>'";
	$Translation["add new group"] = "Add novo grupo";
	$Translation["anonymous group attention"] = "Atenção! Este é um grupo anónimo.";
	$Translation["show tool tips"] = "Veja dicas sobre ferramentas, movendo o mouse sobre as opções";
	$Translation["group name"] = "Nome do grupo";
	$Translation["readonly group name"] = "O nome deste grupo anônimo é somente leitura.";
	$Translation["anonymous group name"] = "Se você nomear o grupo '<ANONYMOUSGROUP>', ele será considerado um grupo anônimo<br>que define as permissões de usuários visitantes que não entram no sistema.";
	$Translation["description"] = "Descrição";
	$Translation["allow visitors sign up"] = 'Permitir que os visitantes possam se inscrever?';
	$Translation["admin add users"] = "Não. Somente o administrador pode adicionar usuários.";
	$Translation["admin approve users"] = "Sim, o administrador já o aprovou!";
	$Translation["automatically approve users"] = "Sim, você foi automaticamente aprovado.";
	$Translation["group table permissions"] = "Permissões de tabelas para esse grupo";
	$Translation["no"] = "Não";
	$Translation["owner"] = "Proprietário";
	$Translation["group"] = "Grupo";
	$Translation["all"] = "Todos";
	$Translation["insert"] = "Inserir";
	$Translation["view"] = "Ver";
	$Translation["edit"] = "Editar";
	$Translation["delete"] = "Deletar";
	$Translation["save changes"] = "Salvar alterações";
	
	//pageEditMember.php
	$Translation["username error"] = "Erro! O nome de usuário já existe ou é inválido. Forneça um nome de usuário contendo 4 a 20 caracteres válidos..";
	$Translation["member not found"] = "Erro! Usuário não encontrado!";
	$Translation["user has special permissions"] = "Este usuário não tem permissões especiais que substituam suas permissões de grupo.";
	$Translation["user has group permissions"] = 'Este utilizador possui <ahref="pageEditGroup.php?groupID=<GROUPID>">permissões de seu grupo</a>.';
	$Translation["set user special permissions"] = 'Definir permissões especiais para este usuário';
	$Translation["sure continue"] = "Se você fizer quaisquer alterações a este usuário e não salvá-los, serão perdidos se você continuar. Você tem certeza que quer continuar?";
	$Translation["edit member"] = "Editar usuário <MEMBERID>" ;
	$Translation["add new member"] = "Adicionar novo Usuário";
	$Translation["anonymous guest member"] = "Atenção! Este usuário é anônimo.";
	$Translation["admin member"] = 'Atenção! Este é um usuário administrador. Você pode mudar o nome de usuário, senha ou e-mail desse usuário, também você pode modificar nas <a href="pageSettings.php">configurações do Administrador.</a>';
	$Translation["member username"] = "Nome de usuário Usuário";
	$Translation["check availability"] = "Verificar disponibilidade";
	$Translation["read only username"] = "O nome de usuário do usuário convidado é somente leitura.";
	$Translation["password"] = "Senha";
	$Translation["change password"] = "Digite uma senha somente se você for mudar<br>a senha deste usuário. Caso contrário, deixe este campo em branco.";
	$Translation["confirm password"] = "Confirmar senha";
	$Translation["email"] = "Email";
	$Translation["approved"] = "Aprovado";
	$Translation["banned"] = "Suspenso";
	$Translation["comments"] = "Comentários";
	$Translation["back to members"] = "Voltar para usuários";
	$Translation["member added"] = "Usuário <USERNAME> adicionado com sucesso";
	
	//pageEditMemberPermissions.php
	$Translation["member permissions saved"] = "As permissões do usuário foram salvas com sucesso.";
	$Translation["member permissions reset"] = "As permissões do usuário foram redefinidas para o mesmo que o seu grupo.";
	$Translation["user table permissions"] = "As permissões da tabela para o usuário <a href='pageEditMember.php?memberID=<MEMBER>' title='View member details'><MEMBERID></a> do grupo <a href='pageEditGroup.php?groupID=<GROUPID>'  title='View group details and permissions'><GROUP></a>";
	$Translation["no member permissions"] = 'O usuário não tem nenhuma permissão especiais. Esta lista mostra as permissões de seu grupo.';
	$Translation["reset member permissions"] = "Restaurar as permissões do Usuário";
	$Translation["remove special permissions"] = 'Isto remover todas as permissões especiais deste usuário e ele terá as mesmas permissões que o seu grupo. Tem certeza de que quer fazer isso?';
	
	//pageEditOwnership.php
	$Translation["invalid table"] = "Tabela inválida.";
	$Translation["invalid primary key"] = "O valor da chave primária é inválida";
	$Translation["record not found"] = "Registro não encontrado... se tiver sido importado externamente, tente atribuir um proprietário a partir da área de administração.";
	$Translation["invalid username"] = "Nome de usuário inválido";
	$Translation["record not found error"] = "Erro! Registro não encontado!";
	$Translation["edit Record Ownership"] = "Editar propriedades do registro";
	$Translation["owner group"] = "Propriéario do Grupo";
	$Translation["view all records by group"] = "Ver todos os registros deste grupo";
	$Translation["owner member"] = "Proprietário do Usuário";
	$Translation["view all records by member"] = "Ver todos os registros deste usuário";
	$Translation["switch record ownership"] = "Se você quiser mudar a posse desse registro a um usuário de outro grupo, você deve alterar o grupo proprietário e salvar as alterações primeiro.";
	$Translation["record created on"] = "Registro criado na";
	$Translation["record modified on"] = "Regristro modificado na";
	$Translation["view all records of table"] = "Ver todos os regristros desta tabela";
	$Translation["record data"] = "Data de registro";
	$Translation["print"] = "Imprimir";
	$Translation["could not retrieve field list"] = "Não foi possível recuperar a lista de campos da tabela '<TABLENAME>'";
	$Translation["field name"] = "Nome do campo";
	$Translation["value"] = "Valor";
	
	//pageHome.php
	$Translation["visitor sign up"] = '<a href="../membership_signup.php" target="_blank">Visitante se inscreva,</a> você está desativado porque no momento não há grupos onde possa se inscrever. Para habilitar sua inscrição, você deve definir pelo menos um grupo, só assim será permitido sua inscrição.';
	$Translation["table data without owner"] = 'Você tem dados em uma ou mais tabelas que possui um dono. Para atribuir um grupo proprietário para estes dados, <a href="pageAssignOwners.php"><b>Clique Aqui</b></a>.';
	$Translation["membership management homepage"] = "Página inicial para Gestão de Usuários";
	$Translation["newest updates"] = "Atualizações recentes";
	$Translation["view record details"] = "Ver detalhes dos registros";
	$Translation["newest entries"] = "Entradas recentes";
	$Translation["available add-ons"] = "Add-ons Disponível";
	$Translation["more info"] = "Mais informações";
	$Translation["close"] = "Fechar";
	$Translation["view add-ons"] = "Ver todos os add-ons";
	$Translation["top members"] = "Usuários Principais";
	$Translation["edit member details"] = "Editar detalhes dos usuários";
	$Translation["view member records"] = "Ver registros de dados dos usuários";
	$Translation["records"] = "Registros";
	$Translation["members stats"] = "Estatísticas usuários";
	$Translation["total groups"] = "Total de grupos";
	$Translation["active members"] = "Ativar Usuários";
	$Translation["view active members"] = "Ver Usuários ativos";
	$Translation["members awaiting approval"] = "Usuários aguardando aprovação";
	$Translation["view members awaiting approval"] = "Ver usuários que aguardam aprovação";
	$Translation["banned members"] = "Usuários banidos";
	$Translation["view banned members"] = "Ver usuários banidos";
	$Translation["total members"] = "Total de Usuários";
	$Translation["view all members"] = "Ver todos os Usuários";
	$Translation["BigProf tweets"]  = "Tweets da BigProf Software";
	$Translation["follow BigProf"] = "Seguir a @bigprof";
	$Translation["loading bigprof feed"] = "Carregar @bigprof feed ...";
	$Translation["remove feed"] = "Remover o feed";
	
	//pageMail.php
	$Translation["can not send mail"] = "Você não pode enviar e-mails atualmente. O endereço do remetente de e-mail configurado não é válido. Por favor <a href='pageSettings.php'>primeiro corriga e</a> em seguida, tente novamente.";
	$Translation["all groups"] = "Todos os grupos";
	$Translation["no recipient"] = "Não foi possível encontrar destinatário. Por favor, certifique-se de fornecer um destinatário válido.";
	$Translation["invalid subject line"] = "Linha de assunto inválido.";
	$Translation["no recipient found"] = "Não conseguimos encontrar destinatários. Por favor, certifique-se de fornecer um destinatário válido.";
	$Translation["mail queue not saved"] = "Não foi possível salvar fila de correio. Por favor, verifique se o diretório '<CURRDIR>' é gravável (chmod 755 or chmod 777).";
	$Translation["send mail"]  = "Enviar mensagem de Email para um usuário ou grupo.";
	$Translation["send mail to all members"] = "Você está enviando um e-mail a todos os usuários. Isso pode levar muito tempo e afetar o desempenho do servidor. Se você tem um grande número de usuários, não recomendamos o envio de um e-mail a todos eles de uma só vez.";
	$Translation["from"] = "Para";
	$Translation["change setting"] = "Alterar configuração";
	$Translation["to"] = "De";
	$Translation["subject"] = "Assunto";
	$Translation["message"] = "Mensagem";
	$Translation["send message"] = "Enviar Mensagem";
	
	//pagePrintRecord.php
	$Translation["record details"] = "Gestão de Usuários - Detalhes dos Registros";
	$Translation['table name'] = "Tabela: <TABLENAME>";
	
	//pageRebuildFields.php
	$Translation['create or update table'] = "Uma tentativa de <ACTION> o campo <i><FIELD></i> em <i><TABLE></i> foi feita por executar esta consulta: <pre><QUERY></pre> os resultados são mostrados abaixo.";

	$Translation['view or rebuild fields'] = "Ver/reconstruir campos";
	$Translation['show deviations only'] = "Mostrar apenas desvios";
	$Translation['show all fields'] = "Mostrar todos os campos";
	$Translation['compare tables page'] = "Esta página compara as tabelas e campos estrutura/esquema como projetado no AppGini. A estrutura banco de dados real permite você corrigir quaisquer desvios.";
	$Translation['field'] = "Campo";
	$Translation['AppGini definition'] = "Definições <b>AppGini</b>";
	$Translation['database definition'] = "Definição atuais do banco de dados";
	$Translation['table name title'] = "<TABLENAME> tabela";
	$Translation['does not exist'] = "Não Existe!";
	$Translation['create field'] = "Criar o campo, executando uma consulta ADD COLUMN.";
	$Translation['create it'] = "Criar";
	$Translation['fix field'] = "Corrigir o campo executando uma consulta ALTER COLUMN de modo que se torna sua definição o mesmo que o da <b>AppGini</b>.";
	$Translation['fix it'] = "Consertar";
	$Translation['field update warning'] = "PERIGO!! Em alguns casos, isto pode conduzir a perda de dados. Você ainda deseja continuar?";
	$Translation['no deviations found'] = "Sem desvios encontrados. Todos os campos OK!";
	$Translation['error fields'] = "Encontrados <CREATENUM> campos não-existentes que precisam ser criados.<br>Campos <UPDATENUM> divergentes encontrados que podem precisar de ser actualizada.";
	
	//pageRebuildThumbnails.php
	$Translation['rebuild thumbnails'] = "Reconstruir Miniaturas";
	$Translation['thumbnails utility'] = "Use este utilitário se você tiver um ou mais campos de imagem em uma tabela que não têm miniaturas ou com miniaturas com dimensões incorretas.";
	$Translation['rebuild thumbnails of table'] = "Reconstruir miniaturas de Tabela";
	$Translation['rebuild'] = "Reconstruir";
	$Translation['rebuild thumbnails of table_name'] = "Reconstruindo miniaturas de '<i><TABLENAME></i>' tabela ...";
	$Translation['do not close page message'] = "Não feche esta página até ver uma mensagem de confirmação de que todas as miniaturas foram construídos.";	
	$Translation['rebuild thumbnails status'] = "Status: Ainda está reconstruindo as miniaturas, por favor espere ...";
	$Translation['building field thumbnails'] =  "Reconstrução de miniaturas para '<i><FIELD></i>' o campo...";
	$Translation['done'] = "Pronto!";
	$Translation['finished status'] = "Status: Finalizado. Você já pode fechar esta página.";
	
	//pageSender.php
	$Translation['invalid mail queue'] = "Fila de email inválida.";
	$Translation['sending message failed'] = "Envio de mensagem para '<EMAIL>': Falhou!";
	$Translation['sending message ok'] = "Envio de mensagem para '<EMAIL>': Sucesso!";
	$Translation['done!'] = "Pronto!";
	$Translation['close page'] = "Você pode fechar esta página agora ou navegar para outra página.";
	$Translation['mail log'] = "Log de email:";
	
	//pageSettings.php
	$Translation['invalid security token'] = 'Token de segurança inválido! Por favor <a href="pageSettings.php">recarregar a página</a> e tente novamente.';
	$Translation['unique admin username error'] = "O novo nome de usuário administrador já está tomada por outro usuário. Por favor, verifique se o novo nome de usuário administrador é única.";	
	$Translation['unique anonymous username error'] = 'O novo nome de usuário anônimo já está tomada por outro usuário. Por favor, certifique-se o nome de usuário fornecido é exclusivo.';
	$Translation['unique anonymous group name error'] = 'O nome do novo grupo anônimo já está em uso por outro grupo. Por favor, certifique-se o nome do grupo fornecido é exclusivo.';
	$Translation['admin password mismatch'] = '"Senha de administrador, Confirme a senha.';
	$Translation['invalid sender email'] = 'E-mail do remetente está inválido".';
	$Translation['errors occurred'] = "Os seguintes erros ocorreram:";
	$Translation['go back'] = 'Por Favor <a href="pageSettings.php" onclick="history.go(-1); return false;">volte</a> para corrigir o(s) erro(s) acima e tente novamente.';
	$Translation['record updated automatically'] = "Registro atualizado automaticamente <DATE>";
	$Translation['admin settings saved'] = "Configurações de administrador salvas com sucesso.<br>de volta a<a href=\"pageSettings.php\">configurações de administador</a>.";
	$Translation['admin settings not saved'] = "As configurações de administrador não foram salvas com sucesso. motivo da falha: <ERROR><br>volta para <a href=\"pageSettings.php\" onclick=\"history.go(-1); return false;\">configurações de administador</a>.";
	$Translation['show tool tips'] = 'São mostrados dicas sobre ferramentas quando você passa o mouse sobre as opções';
	$Translation['admin username'] = "Nome de usuário do Administrados";
	$Translation['admin password'] = "Senha do administrador";
	$Translation['change admin password'] = "Digite uma senha somente se você deseja alterar a senha de administrador.";
	$Translation['sender email'] = "Email do remetente";
	$Translation['sender name and email'] = "Nome do remetente do e-mail é usado ​​no campo 'Para' ao enviar";
	$Translation['email messages'] = "Mesagens de e-mail para grupos ou usuários.";
	$Translation['admin notifications'] = "Notificações do administrador";
	$Translation['no email notifications'] = "Não existe Nenhuma notificação de e-mail para o administrador.";
	$Translation['member waiting approval'] = "Notificar ao administrador somente quando um novo usuário está aguardando por aprovação.";
	$Translation['new sign-ups'] = "Notificar ao administrador todas as novas inscrições.";
	$Translation['sender name'] = "Nome do remetente";
	$Translation['members custom field 1'] = "Usuários, campo personalizado 1";
	$Translation['members custom field 2'] = "Usuários, campo personalizado 2";
	$Translation['members custom field 3'] = "Usuários, campo personalizado 3";
	$Translation['members custom field 4'] = "Usuários, campo personalizado 4";
	$Translation['member approval email subject'] = "Aprovação do usuário<br>assunto do email";
	$Translation['member approval email subject control'] = "Quando o administrador aprova um usuário, o usuário é notificado por e-mail<br>que ele está aprovado. Você pode controlar o assunto do e-mail<br>aprovação neste campo, e o conteúdo na caixa abaixo.";
	$Translation['member approval email message'] = "aprovação do usuário<br>mensagem de e-mail";
	$Translation['MySQL date'] = "MySQL data<br>string de formatação";
	$Translation['MySQL reference'] = 'Por favor, consulte <a href="http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_date-format" target="_blank">a referência MySQL</a> para possíveis formatos.';
	$Translation['PHP short date'] = "PHP data curta<br>string de formatação";
	$Translation['PHP manual'] = 'Por favor, consulte <a href="http://www.php.net/manual/en/function.date.php" target="_blank">o manunal PHP </a> para possíveis formatos.'; 
	$Translation['PHP long date'] = "PHP data longa<br>string de formatação";
	$Translation['groups per page'] = "Grupos por página";
	$Translation['members per page'] = "Usuários por página";
	$Translation['records per page'] = "Registros por página";
	$Translation['default sign-up mode'] = "Modo de inscrição padrão para novos grupos";
	$Translation['no sign-up allowed'] = "Nenhum cadastro permitido. Apenas o administrador pode adicionar novos usuários.";
	$Translation['admin approve members'] = "Cadastro permitido, porém o administrador deve aprovar usuários.";
	$Translation['automatically approve members'] = "Cadastro permitido e aprovado automaticamente para novos usuários.";
	$Translation['anonymous group'] = "Nome do grupo<br>anônimo";
	$Translation['anonymous user name'] = "Nome do usuário<br>anônimo.";
	$Translation['hide twitter feed'] = "Esconder feed do Twitter<br>na página inicial do administrador?";
	$Translation['twitter feed'] = "Nosso feed do Twitter ajuda a mantê-lo informado sobre as nossas últimas notícias, recursos úteis, novos lançamentos, e muitas outras dicas úteis.";
	
	//pageTransferOwnership.php
	$Translation['invalid source member'] = "O usuário selecionado é de origem inválida.";
	$Translation['invalid destination member'] = "O usuário selecionado possuí um desntino inválido.";
	$Translation['moving member'] = "Mover o Usuário '<MEMBERID>' e os seus dados do Grupo '<SOURCEGROUP>' para o Grupo '<DESTINATIONGROUP>' ...";
	$Translation['data records transferred'] = "O Usuário '<MEMBERID>' agora pertence ao grupo '<NEWGROUP>'. registros de dados transferidos: <DATARECORDS>.";
	$Translation['moving data'] = "Mover os dados do Usuário '<SOURCEMEMBER>' do Grupo '<SOURCEGROUP>' o Usuário '<DESTINATIONMEMBER>' para o Grupo '<DESTINATIONGROUP>' ...";
	$Translation['member records status'] = "O Usuário '<SOURCEMEMBER>' do Grupo '<SOURCEGROUP>' possuí <DATABEFORE> dados de regristros. <TRANSFERSTATUS> do Usuário '<DESTINATIONMEMBER>' do Grupo '<DESTINATIONGROUP>'.";
	$Translation['moving all group members'] = "Mover todos os usuários e os dados do grupo '<SOURCEGROUP>' para o Grupo '<DESTINATIONGROUP>' ...";
	$Translation['failed transferring group members'] = "Falha na operação . Nunhum usuário foi transferido do grupo '<SOURCEGROUP>' para '<DESTINATIONGROUP>'.";
	$Translation['group members transferred'] = "Todos os usuários do grupo '<SOURCEGROUP>' agora pertencem '<DESTINATIONGROUP>'. ";
	$Translation['failed transfer data records'] = "Não foi possível transferir os registros de dados.";
	$Translation['data records were transferred'] = "<DATABEFORE> os registros de dados foram transferidos com sucesso!";
	$Translation['moving group data to member'] = "Mover dados de todos os usuários do grupo '<SOURCEGROUP>' ao Usuário '<DESTINATIONMEMBER>' do Grupo '<DESTINATIONGROUP>' ...";
	$Translation['moving group data to member status'] = "<NUMBER> os regsitros foram transferidos a partir do grupo '<SOURCEGROUP>' ao Usuário '<DESTINATIONMEMBER>' do Grupo '<DESTINATIONGROUP>'";
	$Translation['status'] = "STATUS:";
	$Translation['batch transfer link'] = 'Para repetir a mesma transferência novamente, você pode <a href= "pageTransferOwnership.php?sourceGroupID=<SOURCEGROUP>&amp;sourceMemberID=<SOURCEMEMBER>&amp;destinationGroupID=<DESTINATIONGROUP>&amp;destinationMemberID=<DESTINATIONMEMBER>&amp;moveMembers=<MOVEMEMBERS>">guardar ou copiar este link</a>.';
	$Translation['ownership batch transfer'] = "Transferência de propriedade de lote.";
	$Translation['step 1'] = "PASSO 1:";
	$Translation['batch transfer wizard'] = "O assistente de transferência em lote permite a transferência de registros de dados de um ou de todos os usuários de um grupo (O <i>grupo de origem</i>) a um usuário de um outro grupo (O <i>usuário de destino</i> do <i>grupo de destino</i>)";
	$Translation['source group'] = "Grupo de origem";
	$Translation['update'] = "Atualizar";
	$Translation['next step'] = "Próximo passo";
	$Translation['group statistics'] = "Este grupo tem <MEMBERS> usuários, e <RECORDS> registros de dados.";
	$Translation['step 2'] = "PASSO 2:";
	$Translation['source member message'] = "O usuário de origem pode ser um usuário ou todos os usuários do grupo de origem.";
	$Translation['source member'] = "Usuário de origem";
	$Translation['all group members'] = "Todos os usuários da '<GROUPNAME>'";
	$Translation['member statistics'] = "Este usuário tem <RECORDS> dados registrados.";
	$Translation['step 3'] = "PASSO 3:";
	$Translation['destination group message'] = "O grupo de destino pode ser o mesmo ou diferente do grupo de origem. Apenas os grupos que têm usuários estão listados abaixo.";
	$Translation['destination group'] = "Grupo de destino";
	$Translation['step 4'] = "PASSO 4:";
	$Translation['destination member message'] = "O usuário de destino será o novo proprietário dos registros de dados do usuário de origem.";
	$Translation['destination member'] = "Destino do Usuário";
	$Translation['begin transfer'] = "Comece Transferência";	
	$Translation['move records'] = "Você poderia mover registros do usuário (s) de origem para um usuário do grupo de destino, ou mover o usuário de origem (s), juntamente com os seus registros de dados ao grupo de destino.";
	$Translation['move data records to member'] = "Mover registros de dados para este usuário:";
	$Translation['move source member to group'] = "Mover origem de Usuário e todos os seus registos de dados para o '<GROUPNAME>' grupo.";
	
	//pageUploadCSV.php
	$Translation['file not found error'] = "Error: Arquivos '<FILENAME>' não encontrados.";
	$Translation['preview and confirm CSV data'] = "Pré-visualizar os dados CSV em seguida, confirme para importá-lo ...";
	$Translation['display csv file rows'] = "Exibindo os primeiros 10 linhas do arquivo CSV ...";
	$Translation['change CSV settings'] = 'Alterar configurações de CSV';
	$Translation['import CSV data'] = 'Confirmar e dados de importação CSV &gt;';
	$Translation['apply CSV settings'] = 'Confirmar e dados de importação CSV';
	$Translation['importing CSV data'] = 'Importar dados CSV ...';
	$Translation['start at estimated record'] = "A partir do registro <RECORDNUMBER> de <RECORDS> registros totais estimados ...";
	$Translation['table backed up'] = "Tabela '<TABLE>' backup como '<TABLENAME>'.";
	$Translation['table backup not done'] = "Tabela '<TABLE>' está vazio, então nenhum backup foi feito.";
	$Translation['importing batch'] = 'Importat LOTE <BATCH> de <BATCHNUM>: ';
	$Translation['ok'] = 'Ok';
	$Translation['records inserted or updated successfully'] = "<RECORDS> registros inseridos / atualizados em <SECONDS> segundos.";
	$Translation['mission accomplished'] = "Missão cumprida!";
	$Translation['assign a records owner'] = "Atribuir um proprietário para os registros importados &gt;";
	$Translation['please wait and do not close'] = "Por favor, aguarde e não fechar esta página...";
	$Translation['hide advanced options'] = "Ocultar opções avançadas";
	$Translation['show advanced options'] = "Mostrar opções avançadas";
	$Translation['import CSV to database'] = "Importar um arquivo CSV para o banco de dados";
	$Translation['import CSV to database page'] = "Esta página permite fazer upload de um arquivo CSV (por exemplo, aquele gerado a partir do MS Excel) e importá-lo para uma das tabelas do banco de dados. Isto torna tão fácil de bulk-preencher o banco de dados com dados de outras fontes em vez de inserir manualmente cada registro único.";
	$Translation['populate table from CSV'] = "Esta é a tabela que você deseja preencher com dados do arquivo CSV.";
	$Translation['CSV file'] = "Arquivo CSV";
	$Translation['preview CSV data'] = "Visualização dados CSV &gt;";
	$Translation['no table name provided'] = "Nenhum nome para tabela foi fornecido.";
	$Translation['can not open CSV'] = "Não é possível abrir arquivo CSV '<FILENAME>'.";
	$Translation['empty CSV file'] = "O arquivo CSV '<FILENAME>' está vazio.";		
	$Translation['no CSV file data'] = "O arquivo CSV '<FILENAME>' não tem dados para ler." ;
	$Translation['field separator'] = "separador de campo";
	$Translation['default comma'] = "O padrão é a vírgula (,)";
	$Translation['field delimiter'] = "delimitador de campo";
	$Translation['default double-quote'] = 'O padrão é aspas (")';
	$Translation['maximum characters per line'] = "Máximo de caracteres por linha";
	$Translation['trouble importing CSV'] = "Se você tiver problemas para importar o arquivo CSV, tente aumentar esse valor.";
	$Translation['ignore lines number'] = "Número de linhas de ignorar";
	$Translation['skip lines number'] = "Alterar este valor se você quiser pular um número específico de linhas no arquivo CSV.";
	$Translation['first line field names'] = "A primeira linha do arquivo contém nomes de campo";
	$Translation['field names must match'] = "Os nomes dos campos devem<br>exatamente<br>coincidir com aqueles no banco de dados.";
	$Translation['update table records'] = "Atualizar registros da tabela, se os seus valores de chave primária coincidem com aqueles no arquivo CSV.";
	$Translation['ignore CSV table records'] = "Se não for marcada, os registros no arquivo CSV com os mesmos valores de chave primária como aqueles na tabela<br>será ignorado<br>";
	$Translation['back up the table'] = "Voltar-se a tabela antes de importar dados CSV para ele.";
	
	//pageViewGroups.php
	$Translation['no matching results found'] = "Nenhum resultado correspondentes foram encontrados.";
	$Translation['search groups'] = "Pesquisar Grupos";
	$Translation['find'] = "Buscar";
	$Translation['reset'] = "Restaurar";
	$Translation['members count'] = "Conta de Usuários";
	$Translation['Edit group'] = "Editar Grupo";
	$Translation['confirm delete group'] = "Tem a certeza que pretende eliminar completamente esse grupo?";
	$Translation['delete group'] = "Apagar Grupo";
	$Translation['view group records'] = "Ver registros de Grupo";
	$Translation['view group members'] = "Ver Usuários de Grupo";
	$Translation['send message to group'] = "Enviar mensagem para grupo";
	$Translation['previous'] = "Anterior";
	$Translation['displaying groups'] = "Exibir Grupo <GROUPNUM1> de <GROUPNUM2> de <GROUPS>";
	$Translation['next'] = "Próximo";
	$Translation['key'] = "Chave Key:";	
	$Translation['edit group details'] = "Editar detalhes do grupo e permissões.";
	$Translation['add member to group'] = "Adicionar um novo usuário para o grupo.";
	$Translation['view data records'] = "Ver todos os registros de dados inseridos pelos usuários do grupo.";
	$Translation['list group members'] = "Listar todos os usuários de um grupo.";
	$Translation['send email to all members'] = "Enviar uma mensagem de e-mail para todos os usuários de um grupo.";
	
	//pageViewMembers.php
	$Translation['search members'] = "Procure usuários <SEARCH> em <HTMLSELECT>";
	$Translation['all fields'] = "Todos os campos";
	$Translation['any'] = "Qualquer";
	$Translation['waiting approval'] = "Esperando aprovação";
	$Translation['active'] = "Ativado";
	$Translation['Banned'] = "Banido";
	$Translation['username'] = "Nome de Usuário";
	$Translation['sign up date'] = "Data do Registro";
	$Translation['Status'] = "Status";
	$Translation['Edit member'] = "Editar Usuário";	
	$Translation['sure delete user'] = "Tem certeza de que deseja excluir o usuário \'<USERNAME>\'?";
	$Translation['delete member'] = "Excluir usuário";
	$Translation["approve this member"] = "Aprovar este usuário";
	$Translation["unban this member"] = "Desbanir este usuário";
	$Translation["ban this member"] = "Banir este usuário";
	$Translation["View member records"] = "Ver registros de usuário";
	$Translation["send message to member"] = "Enviar mensagem ao Usuário";
	$Translation['displaying members'] = "Exibindo usuários <MEMBERNUM1> de <MEMBERNUM2> de <MEMBERS>";
	$Translation['activate member'] = "Ative Usuário/ proibidos.";
	$Translation['ban member'] = "Suspender Usuário banido.";
	$Translation['view entered member records'] = "Ver todos os registros de dados inseridos pelo usuário.";
	$Translation['send email to member'] = "Enviar uma mensagem de e-mail ao usuário.";
	
	//pageViewRecords.php
	$Translation['data records'] = "Dados de registros";
	$Translation['show records'] = "Mostrar registros de";
	$Translation['all tables'] = "Todas as Tabelas";
	$Translation['sort records'] = "Classificar registros por";
	$Translation['date created'] = "Data Criada";
	$Translation['date modified'] = "Data modificada";
	$Translation['newer first'] = "Recentes primeiro";
	$Translation['older first'] = "mais velhos primeiro";
	$Translation['created'] = "Criados";
	$Translation['modified'] = "Modificados";
	$Translation['data'] = "Dados";
	$Translation['change record ownership'] = "Alteração de propriedade deste registro";
	$Translation['sure delete record'] = "Tem certeza de que deseja excluir este registro?";
	$Translation['delete record'] = "Eliminar este registo";
	$Translation['displaying records'] = "Exibindo registros <RECORDNUM1> de <RECORDNUM2> até <RECORDS>";
	
	
	// ------------------------------------------------------------------------
