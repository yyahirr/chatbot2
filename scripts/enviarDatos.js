$(document).ready(function() {
    $('#send-btn').click(function() {
        const text = $('#data').val().trim();
        if (!text) return;

        // Mensaje del usuario alineado a la derecha
        const userMsg = `
            <div class="user-inbox inbox">
              <div class="msg-header"><p>${text}</p></div>
            </div>`;
        $('.form').append(userMsg);
        $('#data').val('');

        // Petición AJAX al servidor
        $.ajax({
            url: 'controller.php',
            type: 'POST',
            data: { text },
            success: function(result) {
                // Mensaje del bot alineado a la izquierda
                const botMsg = `
                    <div class="bot-inbox inbox">
                      <div class="icon"><i class="fas fa-robot"></i></div>
                      <div class="msg-header"><p>${result}</p></div>
                    </div>`;
                $('.form').append(botMsg);
                $('.form').scrollTop($('.form')[0].scrollHeight);
            }
        });
    });
});