<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión</title>
    <link rel="stylesheet" href="css/diseñoMenu.css">
</head>
<body>
    <header>
        <h1>Gestión del Chatbot</h1>
    </header>
    <main class="menu-main">
        <article class="menu-section">
            <h3 class="menu-subtitle">Preguntas</h3>
            <a class="menu-link" href="view/pregunta/listarPregunta.php">Listar preguntas</a>
            <a class="menu-link" href="view/pregunta/formAltaPregunta.php">Añadir pregunta</a>
        </article>
        <article class="menu-section">
            <h3 class="menu-subtitle">Respuestas</h3>
            <a class="menu-link" href="view/respuesta/listarRespuesta.php">Listar respuestas</a>
            <a class="menu-link" href="view/respuesta/formAltaRespuesta.php">Añadir respuesta</a>
        </article>
        <article class="menu-section">
            <h3 class="menu-subtitle">Conversación</h3>
            <a class="menu-link" href="view/conversacion/listarConversacion.php">Listar conversaciones</a>
        </article>
    </main>
    <footer>
        <a class="chatbotVolver"href="index.php" class="menu-back">Volver al Chatbot</a>
    </footer>
</body>
</html>