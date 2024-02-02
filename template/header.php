<!DOCTYPE html>
<html>
<head>
<title><?=$title?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?=$description?>">
<link href="./assets/css/style.css?v=1.0?>" type="text/css" rel="stylesheet">
<link href="/assets/img/favicon.png" type="image/png" rel="icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="site">
	<header class="header">
		<div class="container">
			<a href="/">
				<img src="./assets/img/leandro-boari-blue-logo.png" alt="Leandro Boari" class="logo">
			</a>
			<nav>
				<a href="/portfolio" class="<?=$currentRoute=="portfolio"?"active":""?>">
					Portfólio
				</a>
				<a href="/contato" class="<?=$currentRoute=="contato"?"active":""?>">
					Contato
				</a>
			</nav>
		</div>
	</header>