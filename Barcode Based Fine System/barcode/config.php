<?php
	
	session_start();
	error_reporting(1);
	
	//local database config.
	
	$databasename = "cashdigi";
	$databaseuser = "root";
	$databasepassword = "";
	$host = "localhost";
	
	
	/*server database config.
	$databasename = "cashdigi";
	$databaseuser = "root";
	$databasepassword = "";
	$host = "localhost";*/
	
	
	//root path of server
    
	define('ROOT',$_SERVER['DOCUMENT_ROOT'].'/cashdigi/');
	define('CSS_PATH_ROOT',ROOT.'css/');
	define('CALENDAR_PATH_ROOT',ROOT.'calendar/');
	define('JQLIB_PATH_ROOT',ROOT.'jqlib/');
	define('JSFILES_PATH_ROOT',ROOT.'jsfiles/');
	
	//path for html links
	
	define('HTML_PATH','http://'.$_SERVER['HTTP_HOST'].'/cashdigi/');
   	define('CSS_PATH_HTML',HTML_PATH.'css/');
	define('CALENDAR_PATH_HTML',HTML_PATH.'calendar/');
	define('JQLIB_PATH_HTML',HTML_PATH.'jqlib/');
	define('JSFILES_PATH_HTML',HTML_PATH.'jsfiles/');


?>