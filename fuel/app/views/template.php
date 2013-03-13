<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title;?></title>
	<?php foreach($css as $list) { echo Asset::css($list); }?>
	<?php foreach($js as $list) { echo Asset::js($list); }?>
</head>

<body>
	<div id="header">
		CORE TECH Resources
	</div>
	<div id="container">
		<div id="title"><?php echo $title;?></div>
		<div id="content">
			<?php echo $content;?>
		</div>
	</div>
</body>
</html>
