<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
      <?= HTML::includeCSS('milk.min');?>
      <?= HTML::includeCSS('milk-responsive.min');?>
      <?= HTML::includeCSS('main');?>
      <?= HTML::includeJS('jquery-1.8.3.min');?>
      <?= HTML::includeJS("pages/".CONTROLLERURLPATH);?>
      <?= HTML::includeJS('main');?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--<link rel="shortcut icon" href="/BasisFramework/ico/favicon.ico"> -->
  </head>
  <body>
<div class="container">
		<div class="header">
			<div class="logo-panel">
				<a href="index">
					<img src="/flybillSmall.png"><span class="site-description hidden-phone">Биллинг нового поколения</span>
				</a>
			</div>