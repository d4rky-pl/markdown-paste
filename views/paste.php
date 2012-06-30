<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" media="all" type="text/css" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css">
	<link rel="stylesheet" media="all" type="text/css" href="<?php echo $url ?>assets/css/base.css">
	<link rel="stylesheet" media="all" type="text/css" href="<?php echo $url ?>assets/css/default.css" id="template">
	<link rel="stylesheet" media="all" type="text/css" href="<?php echo $url ?>assets/css/home.css">

	<script type="text/javascript" src="http://js.appdawn.com/showdown/latest/showdown.min.js"></script>
	<script type="text/javascript" src="https://raw.github.com/js-coder/cookie.js/master/cookie.min.js"></script>
	<script type="text/javascript" src="<?php echo $url ?>assets/js/base.js"></script>
	<script type="text/javascript" src="<?php echo $url ?>assets/js/paste.js"></script>
	<title>Markdown Paste 0.2v</title>		
</head>
<body>
	<div id="top_bar">
		<b>Markdown Paste 0.2v</b>
		<ul>
			<li><select name="style" id="style"><option value="default.css">default.css</option><option value="base.css">base.css</option></select></li>
			<li><a href="?raw">RAW</a></li>
			<li><a href="?download">DOWNLOAD</a></li>
			<li><a href="<?php echo $url ?>">CREATE NEW PASTE</a></li>
		</ul>
	</div>
	
	<pre id="markdown"><?php echo $content ?></pre>

</body>
</html>
