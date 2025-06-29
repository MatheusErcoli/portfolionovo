<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa = $_POST['empresa'] ?? '';
    $email = $_POST['email'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'matheusercoli@gmail.com';      
        $mail->Password   = 'qefj xmde hvfm txdt';           
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('matheusercoli@gmail.com', 'Contato do Site');
        $mail->addAddress('matheusercoli@gmail.com', 'Destino'); 

        $mail->isHTML(true);
        $mail->Subject = 'Nova mensagem do site';
        $mail->Body    = "
            <strong>Empresa:</strong> {$empresa}<br>
            <strong>Email:</strong> {$email}<br>
            <strong>Mensagem:</strong><br>" . nl2br($mensagem);

        $mail->send();
        echo "<div class='alert alert-success container'>Mensagem enviada com sucesso! Retornarei em breve</div>";
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Erro: {$mail->ErrorInfo}</div>";
    }
}
?>
<section class="container">
    <form action="" name="FormContato" method="post" class="needs-validation" novalidate>
        <fieldset>
            <div class="mb-3">
            <label for="empresa" class="form-label">Empresa:</label>
            <input type="text" class="form-control" id="empresa" name="empresa" required placeholder="Empresa interessada" size="50" maxlength="50" minlength="1">
            <div class="invalid-feedback">Por favor, insira o nome da empresa.</div>
            </div>
            <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Digite seu Email..." size="50" maxlength="50" autocomplete="on">
            <div class="invalid-feedback">Por favor, insira um e-mail válido.</div>
            </div>
            <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem: </label>
            <textarea class="form-control" name="mensagem" id="mensagem" rows="3" required minlength="5" placeholder="Digite sua Mensagem..."></textarea>
            <div class="invalid-feedback">Por favor, insira uma mensagem (pelo menos 5 caracteres).</div>
            </div>
            <button class="btn btn-success mt-3" type="submit">Enviar</button>
            <button class="btn btn-danger mt-3" type="reset">Redefinir</button>
        </fieldset>
    </form>
    <div class="mt-3">
            <ul class="flex-fila lista">
                <li><a href="https://www.instagram.com/matheus_ercoli/" target="_blank"><i class="fa-brands fa-instagram icon"></i></a></li>
                <li><a href="https://github.com/MatheusErcoli" target="_blank"><i class="fa-brands fa-github icon"></i></a></li>
                <li><a href="https://www.linkedin.com/feed/" target="_blank"><i class="fa-brands fa-linkedin icon"></i></a></li>
            </ul>
        </div>
</section>
<script>
(() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')

  
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>