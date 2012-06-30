<?php
$request = preg_replace('@^/@','', str_replace('..','.',$_SERVER['PATH_INFO']));

if($request)
{
	require_once("lib/parser.php");
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
	$filename = uniqid().".md";
	file_put_contents('txt/'.$filename, $_POST['paste']);
	header("Location: ".$filename);
}

$url = (isset($_SERVER['SCRIPT_NAME']) ? substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/')) : '').'/';
require_once("views/home.php");
?>
