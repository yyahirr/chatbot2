<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: view/sesion/formularioLogin.php');
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastón Chatbot</title>
    <link rel="stylesheet" href="css/diseñoIndex.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="scripts/enviarDatos.js"></script>
    
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
</svg>

</head>
<body>
    <header>
        <h1></h1>
        <nav>
            <a href="menuGestion.html">Gestión General</a>
            <span class="texto2">Chatbot</span>
            <form action="view/sesion/logout.php" method="post">
                <button>
                <i class="bi bi-box-arrow-left"></i>
                </button>
            </form>
        </nav>
        <div>

        </div>
    </header>

    <main>
        <div class="wrapper">
            <div class="title">Chatea con Gastón</div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon"><i class="fas fa-robot"></i></div>
                    <div class="msg-header"><p>Hola, soy Gastón, ¿cómo puedo ayudarte?</p></div>
                </div>
            </div>
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Escribe algo aquí.." required>
                    <button id="send-btn">Enviar</button>
                </div>
            </div>
        </div>
    </main>
</body>