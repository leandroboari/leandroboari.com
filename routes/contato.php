<?php
include __DIR__."/../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if($_POST) {
	$response = [];
	$errors = [];

	$name = isset($_POST["name"]) ? $_POST["name"] : "";
	if(strlen($name) < 4)
		$errors[] = ["input" => "name", "message" => "Nome inválido."];
	
	$email = isset($_POST["email"]) ? $_POST["email"] : "";
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		$errors[] = ["input" => "email", "message" => "E-mail inválido."];

	$message = isset($_POST["message"]) ? $_POST["message"] : "";
	if(strlen($message) < 4)
		$errors[] = ["input" => "message", "message" => "Mensagem inválida."];

	$captcha = isset($_POST["g-recaptcha-response"]) ? $_POST["g-recaptcha-response"] : "";

	$secretKey = "6Lf5AmQpAAAAAIfasQkZUTFRM6LZZAXM1WMqRTmD";
	$ip = $_SERVER['REMOTE_ADDR'];

	$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
	$response = file_get_contents($url);
	$responseKeys = json_decode($response,true);
	if(!$responseKeys["success"]) {
		$errors[] = ["input" => "other", "message" => "Você não está habilitado para enviar esta mensagem."];
	}

	$response["response"]["name"] = $name;
	$response["response"]["email"] = $email;
	$response["response"]["message"] = $message;

	if(sizeof($errors) == 0) {
		$mail = new PHPMailer(true);
		try {
			$mail->isSMTP();
			$mail->Host = SMTP_HOST;
			$mail->SMTPAuth = true;
			$mail->Username = SMTP_USER;
			$mail->Password = SMTP_PASS;
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = SMTP_PORT;
			$mail->setFrom(MAIL_FROM, MAIL_NAME);
			$mail->addAddress(CONTACT_RECIPIENT);
			$mail->isHTML(true);
			$mail->CharSet = 'UTF-8';
			$mail->Subject = "Contato LeandroBoari.com";
			$header = "<html><body>";
			$date = date("d/m/Y H:i:s");
			$body = "Alguém enviou pelo site solicitando atendimento:<br /><br />";
			$body .= "Nome: $name <br />";
			$body .= "E-mail: $email <br />";
			$body .= "Mensagem: $message<br /><br />";
			$body .= "Data e horário: $date<br /><br />";
			$footer = "</body></html>";
			$message = $header.$body.$footer;
			$mail->Body = $message;
			$response["success"] = "Enviado com sucesso!";
		} catch (Exception $e) {
			$errors[] = ["input" => "other", "message" => "Erro no sistema."];
		}
	} else {
		$response["errors"] = $errors;
	}

	die(json_encode($response));
}
$title = "Contato - Leandro Boari";
$description = "Entre em contato para transformarmos suas ideias em realidade. Estou disponível para novas oportunidades e ansioso para contribuir para o sucesso do seu projeto!";
$currentRoute = "contato";
include "./template/header.php";
?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<div class="loading"></div>
<div class="page-header">
	<div class="icon">✉️</div>
	<h1>Contato</h1>
	<h2>Entre em contato para transformarmos suas ideias em realidade. Estou disponível para novas oportunidades e ansioso para contribuir para o sucesso do seu projeto!</h2>
</div>
<form class="contact">
	<div class="row">
		<label for="name">Nome</label>
		<input type="text" name="name" id="name">
		<div class="helper error" id="nameHelper"></div>
	</div>
	<div class="row">
		<label for="email">E-mail</label>
		<input type="text" name="email" id="email">
		<div class="helper error" id="emailHelper"></div>
	</div>
	<div class="row">
		<label for="message">Mensagem</label>
		<textarea name="message" id="message"></textarea>
		<div class="helper error" id="messageHelper"></div>
	</div>
	<div class="helper success" id="buttonHelper"></div>
	<button type="submit" class="g-recaptcha" data-sitekey="6Lf5AmQpAAAAAFQIlp51m6EX_1M6oPUGHPSPHlyg" data-callback="onSubmit" data-action="submit">Enviar</button>
</form>
<script>
const form = document.querySelector("form");
const loading = document.querySelector(".loading");
function setLoading(active) {
	if(active) loading.classList.add("active");
	else loading.classList.remove("active");
}
form.addEventListener("submit", (event) => {
	event.preventDefault();
	setLoading(true);
	document.querySelectorAll(".helper").forEach(item => {
		item.classList.remove("active");
		item.innerText = "";
	});
	var formData = new FormData(form);
	var request = new XMLHttpRequest();
	request.open("POST", "", true);
	request.onload = () => {
		if (request.status >= 200 && request.status < 300) {
			var response = JSON.parse(request.responseText);
			if(response.errors) {
				response.errors.forEach(item => {
					var input = document.querySelector("#"+item.input+"Helper");
					input.innerText = item.message;
					input.classList.add("active")
				});
			}
			if(response.success) {
				var input = document.querySelector("#buttonHelper");
				input.innerText = response.success;
				input.classList.add("active");
			}
		}
		setTimeout(() => {
			setLoading(false);
		}, 300);
	};
	request.send(formData);
});
</script>
<?php
include "./template/footer.php";
?>