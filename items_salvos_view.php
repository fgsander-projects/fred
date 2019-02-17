<?php
// This script and data application were generated by AppGini 5.74
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/items_salvos.php");
	include("$currDir/items_salvos_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('items_salvos');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "items_salvos";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`items_salvos`.`id`" => "id",
		"`items_salvos`.`memberID`" => "memberID",
		"`items_salvos`.`tableName`" => "tableName",
		"`items_salvos`.`pkValue`" => "pkValue",
		"`items_salvos`.`groupID`" => "groupID",
		"if(`items_salvos`.`dateAdded`,date_format(`items_salvos`.`dateAdded`,'%d/%m/%Y'),'')" => "dateAdded",
		"`items_salvos`.`text`" => "text"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`items_salvos`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => '`items_salvos`.`dateAdded`',
		7 => 7
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`items_salvos`.`id`" => "id",
		"`items_salvos`.`memberID`" => "memberID",
		"`items_salvos`.`tableName`" => "tableName",
		"`items_salvos`.`pkValue`" => "pkValue",
		"`items_salvos`.`groupID`" => "groupID",
		"if(`items_salvos`.`dateAdded`,date_format(`items_salvos`.`dateAdded`,'%d/%m/%Y'),'')" => "dateAdded",
		"`items_salvos`.`text`" => "text"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`items_salvos`.`id`" => "ID",
		"`items_salvos`.`memberID`" => "MemberID",
		"`items_salvos`.`tableName`" => "TableName",
		"`items_salvos`.`pkValue`" => "PkValue",
		"`items_salvos`.`groupID`" => "GroupID",
		"`items_salvos`.`dateAdded`" => "DateAdded",
		"`items_salvos`.`text`" => "Text"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`items_salvos`.`id`" => "id",
		"`items_salvos`.`memberID`" => "memberID",
		"`items_salvos`.`tableName`" => "tableName",
		"`items_salvos`.`pkValue`" => "pkValue",
		"`items_salvos`.`groupID`" => "groupID",
		"if(`items_salvos`.`dateAdded`,date_format(`items_salvos`.`dateAdded`,'%d/%m/%Y'),'')" => "dateAdded",
		"`items_salvos`.`text`" => "text"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom = "`items_salvos` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 0;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = 0;
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 0;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "items_salvos_view.php";
	$x->RedirectAfterInsert = "items_salvos_view.php?SelectedID=#ID#";
	$x->TableTitle = "Itens Salvos";
	$x->TableIcon = "resources/table_icons/heart.png";
	$x->PrimaryKey = "`items_salvos`.`id`";
	$x->DefaultSortField = '`items_salvos`.`dateAdded`';
	$x->DefaultSortDirection = 'desc';

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("MemberID", "TableName", "PkValue", "GroupID", "DateAdded", "Text");
	$x->ColFieldName = array('memberID', 'tableName', 'pkValue', 'groupID', 'dateAdded', 'text');
	$x->ColNumber  = array(2, 3, 4, 5, 6, 7);

	// template paths below are based on the app main directory
	$x->Template = 'templates/items_salvos_templateTV.html';
	$x->SelectedTemplate = 'templates/items_salvos_templateTVS.html';
	$x->TemplateDV = 'templates/items_salvos_templateDV.html';
	$x->TemplateDVP = 'templates/items_salvos_templateDVP.html';

	$x->ShowTableHeader = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `items_salvos`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='items_salvos' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `items_salvos`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='items_salvos' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`items_salvos`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: items_salvos_init
	$render=TRUE;
	if(function_exists('items_salvos_init')){
		$args=array();
		$render=items_salvos_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: items_salvos_header
	$headerCode='';
	if(function_exists('items_salvos_header')){
		$args=array();
		$headerCode=items_salvos_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: items_salvos_footer
	$footerCode='';
	if(function_exists('items_salvos_footer')){
		$args=array();
		$footerCode=items_salvos_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>