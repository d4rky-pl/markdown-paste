<?php
define("UNIQUE_PASTE_KEY", "XYZ");

session_start();
require_once("lib/parser.php");
$url = isset($_GET['file']) ? $_GET['file'] : '/';
$request = preg_replace('@^/@','', str_replace('..','.',$url));
if($request)
{
	$parser = new Parser($request);

	if(isset($_GET['raw']))
	{
		$parser->render_raw();
	}
	elseif(isset($_GET['download']))
	{
		$parser->render_download();
	}
	else
	{
		$parser->render_html();
	}

}

if(isset($_POST['paste']))
{
	$parser = new Parser;
	$parser->save($_POST['paste']);
	$_SESSION['new_paste'] = TRUE;
	$parser->redirect();
}

$url = (isset($_SERVER['SCRIPT_NAME']) ? substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/')) : '').'/';
require_once("views/home.php");
?>
