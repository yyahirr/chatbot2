<?php
function renderResponsePage(bool $success, string $message, string $returnUrl) {
    $cssHref = '../css/diseñoIndex.css';
    $statusClass = $success ? 'user-inbox' : 'bot-inbox';
    $color = $success ? '#d1fae5' : '#ffe4e6';
    $textColor = $success ? '#065f46' : '#831843';

    echo '<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Resultado</title>
<link rel="stylesheet" href="' . htmlspecialchars($cssHref, ENT_QUOTES, 'UTF-8') . '">
</head>
<body>
<header><h1>Chatbot</h1></header>
<div class="wrapper">
    <div class="title">Resultado de la operación</div>
    <div class="form">
        <div class="inbox ' . $statusClass . '">
            <div class="msg-header" style="background:' . $color . '; color:' . $textColor . ';">
                ' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '
            </div>
        </div>
        <div style="margin-top:12px;">
            <a href="' . htmlspecialchars($returnUrl, ENT_QUOTES, 'UTF-8') . '">Volver a la lista</a>
        </div>
    </div>
</div>
<footer><p>Powered by Chatbot</p></footer>
</body>
</html>';
    exit;
}
?>