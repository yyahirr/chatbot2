$(document).ready(function () {

    function leerVoz(texto) {
        const speech = new SpeechSynthesisUtterance(texto);
        speech.lang = "es-AR";
        speech.pitch = 1;
        speech.rate = 1;
        window.speechSynthesis.speak(speech);
    }

    let recognition;
    if ('webkitSpeechRecognition' in window) {
        recognition = new webkitSpeechRecognition();
        recognition.lang = "es-AR";
        recognition.continuous = false;
        recognition.interimResults = false;

        recognition.onresult = function (event) {
            const voz = event.results[0][0].transcript;
            $("#data").val(voz);
            $("#send-btn").click();
        };

        recognition.onerror = function () {
            $("#voice-btn").removeClass("listening").attr("title", "Activar voz");
        };

        recognition.onend = function () {
            $("#voice-btn").removeClass("listening").attr("title", "Activar voz");
        };
    }

    $("#voice-btn").click(function () {
        if (!recognition) {
            alert("Tu navegador no soporta reconocimiento de voz.");
            return;
        }
        const $btn = $(this);
        if ($btn.hasClass("listening")) {
            try {
                recognition.stop();
            } catch (e) {
                console.warn(e);
            }
            $btn.removeClass("listening").attr("title", "Activar voz");
        } else {
            try {
                recognition.start();
                $btn.addClass("listening").attr("title", "Detener voz");
            } catch (e) {
                console.warn(e);
            }
        }
    });

    window.leerVoz = leerVoz;
});