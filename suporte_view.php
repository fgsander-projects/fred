<?php
// This script and data application were generated by AppGini 5.74
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/suporte.php");
	include("$currDir/suporte_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('suporte');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "suporte";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`suporte`.`id`" => "id",
		"`suporte`.`suporte`" => "suporte"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`suporte`.`id`',
		2 => 2
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`suporte`.`id`" => "id",
		"`suporte`.`suporte`" => "suporte"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`suporte`.`id`" => "ID",
		"`suporte`.`suporte`" => "Suporte:"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`suporte`.`id`" => "id",
		"`suporte`.`suporte`" => "suporte"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom = "`suporte` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 15;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "suporte_view.php";
	$x->RedirectAfterInsert = "suporte_view.php?addNew_x=1";
	$x->TableTitle = "Suporte";
	$x->TableIcon = "resources/table_icons/document_info.png";
	$x->PrimaryKey = "`suporte`.`id`";
	$x->DefaultSortField = '2';
	$x->DefaultSortDirection = 'asc';

	$x->ColWidth   = array(  150);
	$x->ColCaption = array("Suporte:");
	$x->ColFieldName = array('suporte');
	$x->ColNumber  = array(2);

	// template paths below are based on the app main directory
	$x->Template = 'templates/suporte_templateTV.html';
	$x->SelectedTemplate = 'templates/suporte_templateTVS.html';
	$x->TemplateDV = 'templates/suporte_templateDV.html';
	$x->TemplateDVP = 'templates/suporte_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `suporte`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='suporte' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `suporte`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='suporte' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`suporte`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: suporte_init
	$render=TRUE;
	if(function_exists('suporte_init')){
		$args=array();
		$render=suporte_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: suporte_header
	$headerCode='';
	if(function_exists('suporte_header')){
		$args=array();
		$headerCode=suporte_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: suporte_footer
	$footerCode='';
	if(function_exists('suporte_footer')){
		$args=array();
		$footerCode=suporte_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>