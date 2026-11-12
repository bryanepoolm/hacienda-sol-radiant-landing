<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');

function respond(int $status, bool $success, string $message): void {
    http_response_code($status);
    echo json_encode(['success' => $success, 'message' => $message], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    respond(405, false, 'Método no permitido.');
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$message = $_POST['message'] ?? '';

if (!is_string($name) || !is_string($email) || !is_string($phone) || !is_string($message)) {
    respond(422, false, 'Revisa los datos del formulario.');
}

$name = trim($name);
$email = trim($email);
$phone = trim($phone);
$message = trim($message);

if ($name === '' || $email === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(422, false, 'Completa tu nombre, un correo válido y el mensaje.');
}
if (strlen($name) > 120 || strlen($email) > 180 || strlen($phone) > 40 || strlen($message) > 4000) {
    respond(422, false, 'Uno de los campos supera la longitud permitida.');
}

$name = preg_replace('/[\r\n]+/', ' ', $name);
$phone = preg_replace('/[\r\n]+/', ' ', $phone);
$recipient = 'global.sales@haciendasolradiante.mx';
$subject = 'Nueva consulta de aceites - Hacienda Sol Radiante';
$body = "Nombre: $name\nCorreo: $email\nTeléfono: $phone\n\nMensaje:\n$message";
$headers = [
    'From: Hacienda Sol Radiante <' . $recipient . '>',
    'Reply-To: ' . $email,
    'Content-Type: text/plain; charset=UTF-8',
    'X-Mailer: PHP/' . PHP_VERSION,
];

if (@mail($recipient, $subject, $body, implode("\r\n", $headers))) {
    respond(200, true, 'Mensaje enviado.');
}

respond(503, false, 'No pudimos enviar tu mensaje. Intenta de nuevo o escríbenos por correo.');
