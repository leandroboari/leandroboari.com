<?php
$title = "Portfólio - Leandro Boari";
$description = "Sou apaixonado por transformar ideias em realidade, e como programador e designer, trago uma combinação única de criatividade e desempenho para meus projetos.";
$currentRoute = "portfolio";
include "./template/header.php";
$portfolio = [
	[
		"logo" => [
			"image" => "/assets/img/portfolio/pedreira-bastos/pedreira-bastos-logo.png",
			"height" => "40px"
		],
		"service" => "Website Corporativo",
		"description" => "Desenvolvimento de landing page para empresa de mineração.",
		"image" => "/assets/img/portfolio/pedreira-bastos/pedreira-bastos-landing-page.png"
	],
	[
		"logo" => [
			"image" => "/assets/img/portfolio/lanchashb/lanchashb-logo.png",
			"height" => "70px"
		],
		"service" => "Website Corporativo",
		"description" => "Desenvolvimento de landing page para empresa de turismo náutico.",
		"image" => "/assets/img/portfolio/lanchashb/lanchashb-landing-page.png"
	],
	[
		"logo" => [
			"image" => "/assets/img/portfolio/ctienglish/cti-logo.png",
			"height" => "30px"
		],
		"service" => "Website Corporativo",
		"description" => "Desenvolvimento de landing page para escola de idiomas.",
		"image" => "/assets/img/portfolio/ctienglish/ctienglish-landing-page.png"
	],
	[
		"logo" => [
			"image" => "/assets/img/portfolio/webits/webits-logo.png",
			"height" => "25px"
		],
		"service" => "Website Corporativo",
		"description" => "Desenvolvimento de landing page para empresa de desenvolvimento de software.",
		"image" => "/assets/img/portfolio/webits/webits-landing-page.png"
	],
	[
		"logo" => [
			"image" => "/assets/img/portfolio/stemizer/stemizer-logo.png",
			"height" => "35px"
		],
		"service" => "Website Corporativo",
		"description" => "Desenvolvimento de landing page para empresa do setor de robótica educacional.",
		"image" => "/assets/img/portfolio/stemizer/stemizer-landing-page.png"
	],
	[
		"logo" => [
			"image" => "/assets/img/portfolio/towin/towin-logo.png",
			"height" => "30px"
		],
		"service" => "Design UI/UX",
		"description" => "Desenvolvimento da interface e experiência de usuário para um sistema de monitoramento com inteligência artificial, visão computacional e hiperautomação.",
		"image" => "/assets/img/portfolio/towin-eagle/towin-eagle-mockup.png"
	],
	[
		"logo" => [
			"image" => "/assets/img/portfolio/towin/towin-logo.png",
			"height" => "30px"
		],
		"service" => "Website Corportativo",
		"description" => "Desenvolvimento e hospedagem de landing page no setor de desenvolvimento de software, com foco em soluções de segurança, inteligência artificial e visão computacional.",
		"image" => "https://webits.com.br/static/img/portfolio/towin-landing-page.png"
	],
	[
		"logo" => [
			"image" => "/assets/img/portfolio/kaixinhas/kaixinhas-logo.png",
			"height" => "45px"
		],
		"service" => "Website Corportativo",
		"description" => "Desenvolvimento de landing page para empresa do setor de logística e transportes, com sistemas de rastreamento de encomendas e gerenciamento logístico.",
		"image" => "https://webits.com.br/static/img/portfolio/kaixinhas-landing-page.png"
	],
	[
		"logo" => [
			"image" => "/assets/img/portfolio/unique/unique-logo.png",
			"height" => "40px"
		],
		"service" => "Website Corportativo",
		"description" => "Desenvolvimento de landing page para empresa do setor imobiliário com atuação na compra e venda de imóveis.",
		"image" => "https://webits.com.br/static/img/portfolio/unique-landing-page.png"
	]
];
?>
<div class="page-header">
	<div class="icon">💎</div>
	<h1>Portfólio</h1>
	<h2>Sou apaixonado por transformar ideias em realidade, e como programador e designer, trago uma combinação única de criatividade e desempenho para meus projetos.</h2>
</div>
<div class="portfolio">
<?php
foreach ($portfolio as $item) {
?>
	<div class="item">
		<div class="preview" style="background-image: url(<?=$item["image"]?>)"></div>
		<div class="info">
			<img src="<?=$item["logo"]["image"]?>" height="<?=$item["logo"]["height"]?>" class="logo">
			<h1><?=$item["service"]?></h1>
			<p><?=$item["description"]?></p>
		</div>
	</div>
<?php
}
?>
</div>
<?php
include "./template/footer.php";
?>