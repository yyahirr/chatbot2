$(document).ready(function () {
    function enviarTexto() {
        const text = $('#data').val().trim();
        if (!text) return;

        const userMsg = `
            <div class="user-inbox inbox">
                <div class="msg-header"><p>${text}</p></div>
            </div>`;

        $(".form").append(userMsg);
        $('#data').val("");

        $.ajax({
            url: 'controller.php',
            type: 'POST',
            data: { text },
            success: function (result) {
                const botMsg = `
                    <div class="bot-inbox inbox">
                        <div class="icon"><i class="fas fa-robot"></i></div>
                        <div class="msg-header"><p>${result}</p></div>
                    </div>`;

                $(".form").append(botMsg);
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    }

    $('#send-btn').click(function () {
        enviarTexto();
    });

    $("#data").keypress(function (e) {
        if (e.which === 13) enviarTexto();
    });
});