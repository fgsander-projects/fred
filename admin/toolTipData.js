var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// item table
item_addTip=["",spacer+"This option allows all members of the group to add records to the 'Itens' table. A member who adds a record to the table becomes the 'owner' of that record."];

item_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Itens' table."];
item_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Itens' table."];
item_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Itens' table."];
item_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Itens' table."];

item_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Itens' table."];
item_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Itens' table."];
item_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Itens' table."];
item_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Itens' table, regardless of their owner."];

item_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Itens' table."];
item_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Itens' table."];
item_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Itens' table."];
item_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Itens' table."];

// colecao table
colecao_addTip=["",spacer+"This option allows all members of the group to add records to the 'Cole&#231;&#227;o' table. A member who adds a record to the table becomes the 'owner' of that record."];

colecao_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Cole&#231;&#227;o' table."];
colecao_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Cole&#231;&#227;o' table."];
colecao_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Cole&#231;&#227;o' table."];
colecao_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Cole&#231;&#227;o' table."];

colecao_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Cole&#231;&#227;o' table."];
colecao_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Cole&#231;&#227;o' table."];
colecao_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Cole&#231;&#227;o' table."];
colecao_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Cole&#231;&#227;o' table, regardless of their owner."];

colecao_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Cole&#231;&#227;o' table."];
colecao_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Cole&#231;&#227;o' table."];
colecao_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Cole&#231;&#227;o' table."];
colecao_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Cole&#231;&#227;o' table."];

// grupo table
grupo_addTip=["",spacer+"This option allows all members of the group to add records to the 'Grupo' table. A member who adds a record to the table becomes the 'owner' of that record."];

grupo_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Grupo' table."];
grupo_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Grupo' table."];
grupo_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Grupo' table."];
grupo_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Grupo' table."];

grupo_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Grupo' table."];
grupo_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Grupo' table."];
grupo_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Grupo' table."];
grupo_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Grupo' table, regardless of their owner."];

grupo_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Grupo' table."];
grupo_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Grupo' table."];
grupo_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Grupo' table."];
grupo_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Grupo' table."];

// serie table
serie_addTip=["",spacer+"This option allows all members of the group to add records to the 'S&#233;rie' table. A member who adds a record to the table becomes the 'owner' of that record."];

serie_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'S&#233;rie' table."];
serie_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'S&#233;rie' table."];
serie_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'S&#233;rie' table."];
serie_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'S&#233;rie' table."];

serie_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'S&#233;rie' table."];
serie_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'S&#233;rie' table."];
serie_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'S&#233;rie' table."];
serie_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'S&#233;rie' table, regardless of their owner."];

serie_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'S&#233;rie' table."];
serie_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'S&#233;rie' table."];
serie_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'S&#233;rie' table."];
serie_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'S&#233;rie' table."];

// subserie table
subserie_addTip=["",spacer+"This option allows all members of the group to add records to the 'Subs&#233;rie' table. A member who adds a record to the table becomes the 'owner' of that record."];

subserie_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Subs&#233;rie' table."];
subserie_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Subs&#233;rie' table."];
subserie_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Subs&#233;rie' table."];
subserie_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Subs&#233;rie' table."];

subserie_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Subs&#233;rie' table."];
subserie_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Subs&#233;rie' table."];
subserie_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Subs&#233;rie' table."];
subserie_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Subs&#233;rie' table, regardless of their owner."];

subserie_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Subs&#233;rie' table."];
subserie_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Subs&#233;rie' table."];
subserie_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Subs&#233;rie' table."];
subserie_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Subs&#233;rie' table."];

// tipologia table
tipologia_addTip=["",spacer+"This option allows all members of the group to add records to the 'Tipologia / Esp&#233;cie' table. A member who adds a record to the table becomes the 'owner' of that record."];

tipologia_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Tipologia / Esp&#233;cie' table."];
tipologia_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Tipologia / Esp&#233;cie' table."];
tipologia_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Tipologia / Esp&#233;cie' table."];
tipologia_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Tipologia / Esp&#233;cie' table."];

tipologia_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Tipologia / Esp&#233;cie' table."];
tipologia_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Tipologia / Esp&#233;cie' table."];
tipologia_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Tipologia / Esp&#233;cie' table."];
tipologia_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Tipologia / Esp&#233;cie' table, regardless of their owner."];

tipologia_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Tipologia / Esp&#233;cie' table."];
tipologia_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Tipologia / Esp&#233;cie' table."];
tipologia_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Tipologia / Esp&#233;cie' table."];
tipologia_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Tipologia / Esp&#233;cie' table."];

// idioma table
idioma_addTip=["",spacer+"This option allows all members of the group to add records to the 'Idioma' table. A member who adds a record to the table becomes the 'owner' of that record."];

idioma_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Idioma' table."];
idioma_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Idioma' table."];
idioma_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Idioma' table."];
idioma_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Idioma' table."];

idioma_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Idioma' table."];
idioma_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Idioma' table."];
idioma_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Idioma' table."];
idioma_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Idioma' table, regardless of their owner."];

idioma_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Idioma' table."];
idioma_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Idioma' table."];
idioma_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Idioma' table."];
idioma_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Idioma' table."];

// local_comunicacao table
local_comunicacao_addTip=["",spacer+"This option allows all members of the group to add records to the 'Local de Comunica&#231;&#227;o' table. A member who adds a record to the table becomes the 'owner' of that record."];

local_comunicacao_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Local de Comunica&#231;&#227;o' table."];
local_comunicacao_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Local de Comunica&#231;&#227;o' table."];
local_comunicacao_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Local de Comunica&#231;&#227;o' table."];
local_comunicacao_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Local de Comunica&#231;&#227;o' table."];

local_comunicacao_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Local de Comunica&#231;&#227;o' table."];
local_comunicacao_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Local de Comunica&#231;&#227;o' table."];
local_comunicacao_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Local de Comunica&#231;&#227;o' table."];
local_comunicacao_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Local de Comunica&#231;&#227;o' table, regardless of their owner."];

local_comunicacao_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Local de Comunica&#231;&#227;o' table."];
local_comunicacao_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Local de Comunica&#231;&#227;o' table."];
local_comunicacao_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Local de Comunica&#231;&#227;o' table."];
local_comunicacao_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Local de Comunica&#231;&#227;o' table."];

// tipo_publicacao table
tipo_publicacao_addTip=["",spacer+"This option allows all members of the group to add records to the 'Tipo de Publica&#231;&#227;o' table. A member who adds a record to the table becomes the 'owner' of that record."];

tipo_publicacao_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Tipo de Publica&#231;&#227;o' table."];
tipo_publicacao_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Tipo de Publica&#231;&#227;o' table."];
tipo_publicacao_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Tipo de Publica&#231;&#227;o' table."];
tipo_publicacao_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Tipo de Publica&#231;&#227;o' table."];

tipo_publicacao_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Tipo de Publica&#231;&#227;o' table."];
tipo_publicacao_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Tipo de Publica&#231;&#227;o' table."];
tipo_publicacao_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Tipo de Publica&#231;&#227;o' table."];
tipo_publicacao_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Tipo de Publica&#231;&#227;o' table, regardless of their owner."];

tipo_publicacao_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Tipo de Publica&#231;&#227;o' table."];
tipo_publicacao_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Tipo de Publica&#231;&#227;o' table."];
tipo_publicacao_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Tipo de Publica&#231;&#227;o' table."];
tipo_publicacao_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Tipo de Publica&#231;&#227;o' table."];

// genero table
genero_addTip=["",spacer+"This option allows all members of the group to add records to the 'G&#234;nero' table. A member who adds a record to the table becomes the 'owner' of that record."];

genero_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'G&#234;nero' table."];
genero_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'G&#234;nero' table."];
genero_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'G&#234;nero' table."];
genero_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'G&#234;nero' table."];

genero_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'G&#234;nero' table."];
genero_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'G&#234;nero' table."];
genero_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'G&#234;nero' table."];
genero_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'G&#234;nero' table, regardless of their owner."];

genero_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'G&#234;nero' table."];
genero_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'G&#234;nero' table."];
genero_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'G&#234;nero' table."];
genero_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'G&#234;nero' table."];

// formato table
formato_addTip=["",spacer+"This option allows all members of the group to add records to the 'Formato' table. A member who adds a record to the table becomes the 'owner' of that record."];

formato_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Formato' table."];
formato_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Formato' table."];
formato_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Formato' table."];
formato_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Formato' table."];

formato_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Formato' table."];
formato_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Formato' table."];
formato_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Formato' table."];
formato_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Formato' table, regardless of their owner."];

formato_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Formato' table."];
formato_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Formato' table."];
formato_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Formato' table."];
formato_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Formato' table."];

// suporte table
suporte_addTip=["",spacer+"This option allows all members of the group to add records to the 'Suporte' table. A member who adds a record to the table becomes the 'owner' of that record."];

suporte_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Suporte' table."];
suporte_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Suporte' table."];
suporte_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Suporte' table."];
suporte_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Suporte' table."];

suporte_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Suporte' table."];
suporte_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Suporte' table."];
suporte_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Suporte' table."];
suporte_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Suporte' table, regardless of their owner."];

suporte_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Suporte' table."];
suporte_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Suporte' table."];
suporte_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Suporte' table."];
suporte_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Suporte' table."];

// numero_caixa table
numero_caixa_addTip=["",spacer+"This option allows all members of the group to add records to the 'N&#250;mero da Caixa' table. A member who adds a record to the table becomes the 'owner' of that record."];

numero_caixa_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'N&#250;mero da Caixa' table."];
numero_caixa_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'N&#250;mero da Caixa' table."];
numero_caixa_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'N&#250;mero da Caixa' table."];
numero_caixa_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'N&#250;mero da Caixa' table."];

numero_caixa_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'N&#250;mero da Caixa' table."];
numero_caixa_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'N&#250;mero da Caixa' table."];
numero_caixa_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'N&#250;mero da Caixa' table."];
numero_caixa_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'N&#250;mero da Caixa' table, regardless of their owner."];

numero_caixa_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'N&#250;mero da Caixa' table."];
numero_caixa_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'N&#250;mero da Caixa' table."];
numero_caixa_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'N&#250;mero da Caixa' table."];
numero_caixa_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'N&#250;mero da Caixa' table."];

// nome_caixa table
nome_caixa_addTip=["",spacer+"This option allows all members of the group to add records to the 'Nome da Caixa' table. A member who adds a record to the table becomes the 'owner' of that record."];

nome_caixa_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Nome da Caixa' table."];
nome_caixa_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Nome da Caixa' table."];
nome_caixa_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Nome da Caixa' table."];
nome_caixa_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Nome da Caixa' table."];

nome_caixa_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Nome da Caixa' table."];
nome_caixa_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Nome da Caixa' table."];
nome_caixa_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Nome da Caixa' table."];
nome_caixa_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Nome da Caixa' table, regardless of their owner."];

nome_caixa_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Nome da Caixa' table."];
nome_caixa_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Nome da Caixa' table."];
nome_caixa_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Nome da Caixa' table."];
nome_caixa_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Nome da Caixa' table."];

// numero_pasta table
numero_pasta_addTip=["",spacer+"This option allows all members of the group to add records to the 'N&#250;mero da Pasta' table. A member who adds a record to the table becomes the 'owner' of that record."];

numero_pasta_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'N&#250;mero da Pasta' table."];
numero_pasta_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'N&#250;mero da Pasta' table."];
numero_pasta_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'N&#250;mero da Pasta' table."];
numero_pasta_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'N&#250;mero da Pasta' table."];

numero_pasta_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'N&#250;mero da Pasta' table."];
numero_pasta_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'N&#250;mero da Pasta' table."];
numero_pasta_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'N&#250;mero da Pasta' table."];
numero_pasta_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'N&#250;mero da Pasta' table, regardless of their owner."];

numero_pasta_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'N&#250;mero da Pasta' table."];
numero_pasta_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'N&#250;mero da Pasta' table."];
numero_pasta_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'N&#250;mero da Pasta' table."];
numero_pasta_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'N&#250;mero da Pasta' table."];

// nome_pasta table
nome_pasta_addTip=["",spacer+"This option allows all members of the group to add records to the 'Nome da Pasta' table. A member who adds a record to the table becomes the 'owner' of that record."];

nome_pasta_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Nome da Pasta' table."];
nome_pasta_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Nome da Pasta' table."];
nome_pasta_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Nome da Pasta' table."];
nome_pasta_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Nome da Pasta' table."];

nome_pasta_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Nome da Pasta' table."];
nome_pasta_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Nome da Pasta' table."];
nome_pasta_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Nome da Pasta' table."];
nome_pasta_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Nome da Pasta' table, regardless of their owner."];

nome_pasta_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Nome da Pasta' table."];
nome_pasta_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Nome da Pasta' table."];
nome_pasta_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Nome da Pasta' table."];
nome_pasta_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Nome da Pasta' table."];

// items_salvos table
items_salvos_addTip=["",spacer+"This option allows all members of the group to add records to the 'Itens Salvos' table. A member who adds a record to the table becomes the 'owner' of that record."];

items_salvos_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Itens Salvos' table."];
items_salvos_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Itens Salvos' table."];
items_salvos_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Itens Salvos' table."];
items_salvos_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Itens Salvos' table."];

items_salvos_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Itens Salvos' table."];
items_salvos_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Itens Salvos' table."];
items_salvos_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Itens Salvos' table."];
items_salvos_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Itens Salvos' table, regardless of their owner."];

items_salvos_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Itens Salvos' table."];
items_salvos_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Itens Salvos' table."];
items_salvos_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Itens Salvos' table."];
items_salvos_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Itens Salvos' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
