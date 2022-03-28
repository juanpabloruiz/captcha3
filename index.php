<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=CLAVE_PUBLICA"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('CLAVE_PUBLICA', {
            action: 'submit'
        }).then(function(token) {
            $("#token").val(token);
        });
    });
</script>
<form method="post">
    <input type="text" name="a">
    <input type="text" name="token" id="token">
    <button class="g-recaptcha" data-sitekey="" data-callback='onSubmit' data-action='submit'>Enviar</button>
</form>
<?php
if ($_POST) {
    $secret = 'CLAVE_PRIVADA';
    $token = $_POST['token'];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$token}");
    $response = json_decode($response);
    $response = (array) $response;
    if ($response['success']) {
        echo 'BIENnnnn';
    } else {
        echo 'MAL';
    }
}
?>