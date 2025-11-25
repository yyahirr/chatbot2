import speech_recognition as sr #entrada de data
import pyttx3 #salida de data
import sys

def recognize_speech():
    # Inicializamos el reconocedor de voz
    recognizer = sr.Recognizer()

    # Usamos el micrófono como fuente
    with sr.Microphone() as source:
        print("Escuchando...")
        audio = recognizer.listen(source)

    try:
        # Reconocemos el audio
        print("Reconociendo...")
        text = recognizer.recognize_google(audio)
        print("Has dicho: " + text)
        return text
    except sr.UnknownValueError:
        print("No pude entender el audio")
        return None
    except sr.RequestError as e:
        print(f"Error con el servicio de reconocimiento de voz; {e}")
        return None

def text_to_speech(text):
    engine = pyttsx3.init()
    engine.say(text)
    engine.runAndWait()

if __name__ == "__main__":
    if len(sys.argv) > 1:
        # Si pasamos un texto desde PHP (como argumento)
        user_input = sys.argv[1]
        text_to_speech(user_input)
    else:
        # De lo contrario, hacemos que el bot escuche lo que el usuario dice
        user_input = recognize_speech()
        if user_input:
            text_to_speech(f"Has dicho: {user_input}")
