<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" media="all" type="text/css" href="<?php echo $url ?>assets/css/bootstrap.css">
	<link rel="stylesheet" media="all" type="text/css" href="<?php echo $url ?>assets/css/base.css">
	<link rel="stylesheet" media="all" type="text/css" href="<?php echo $url ?>assets/css/default.css" id="template">
	<link rel="stylesheet" media="all" type="text/css" href="<?php echo $url ?>assets/css/home.css">

	<script type="text/javascript" src="<?php echo $url ?>assets/js/showdown.js"></script>
	<script type="text/javascript" src="<?php echo $url ?>assets/js/cookie.min.js"></script>
	<script type="text/javascript" src="<?php echo $url ?>assets/js/base.js"></script>
	<script type="text/javascript" src="<?php echo $url ?>assets/js/home.js"></script>
	<title>Markdown Paste 0.4v</title>	
</head>
<body class="create">
	<div id="top_bar">
		<b>Markdown Paste 0.4v</b>
		<ul>
			<li><select name="style" id="style"><option value="default.css">default.css</option><option value="base.css">base.css</option></select></li>
			<li><a href="?raw">RAW</a></li>
			<li><a href="?download">DOWNLOAD</a></li>
			<li><a href="<?php echo $url ?>">CREATE NEW PASTE</a></li>
		</ul>
	</div>

	<div id="markdown"><?php echo $content ?></div>

<?php if(isset($new_paste)): ?>

	<div class="modal-backdrop"></div>
	<div id="modal-links" class="modal">
		<div class="modal-header">
			<h3>You have created a new paste</h3>
		</div>
		<div class="modal-body">
		<div class="row">

			<div class="span8"><form>
				<div class="clearfix">
					<label for="share" style="color: #c00; font-weight: bold">Modification link:</label>
					<div class="input"><input id="modify" value="<?php echo $modify_link ?>"></div>
				</div>

				<div class="clearfix">
					<label for="share">Share link:</label>
					<div class="input"><input id="share" value="<?php echo $share_link ?>"></div>
				</div>

				<div class="clearfix">
					<label for="share">Share link (RAW):</label>
					<div class="input"><input id="share" value="<?php echo $share_link ?>?raw"></div>
				</div>

				<div class="clearfix">
					<label for="share">Share link (Download):</label>
					<div class="input"><input id="share" value="<?php echo $share_link ?>?download"></div>
				</div>
			</form></div>

			<div class="span1">

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_floating_style addthis_32x32_style" style="position: relative; right: -10px; padding: 0; margin: 0">
<a class="addthis_button_facebook"></a>
<a class="addthis_button_twitter"></a>
<a class="addthis_button_tumblr"></a>
<a class="addthis_button_gmail"></a>
<a class="addthis_button_compact"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-5006d59e15746a44"></script>

			</div>


		</div>
		</div>
		<div class="modal-footer">
			<a href="<?php echo $share_link ?>" class="btn primary" id="close-2">Go to your paste</a>
			<a href="<?php echo $modify_link ?>" class="btn">Modify your paste</a>
		</div>
	</div>

<?php endif; ?>
<?php if(isset($modify_paste)): ?>

	<div class="paste_code">
		<form method="post">
			<div class="textarea">
				<textarea id="paste" name="paste"><?php echo $content ?></textarea>
			</div>
			<div class="actions">
				<button type="submit" class="btn primary">Modify paste</button>
			</div>
		</form>
	</div>
<?php endif; ?>
</body>
</html>
