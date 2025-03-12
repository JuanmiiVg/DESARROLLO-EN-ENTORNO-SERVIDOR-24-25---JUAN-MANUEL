const chatbotToggler = document.querySelector(".chatbot-toggler");
const closeBtn = document.querySelector(".close-btn");
const chatbox = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");

let userMessage = null; // Variable para almacenar el mensaje del usuario
const API_KEY = "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"; 
const inputInitHeight = chatInput.scrollHeight;

const createChatLi = (message, className) => {
    // Crea un elemento de chat <li> con el mensaje pasado y el nombre de clase
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", `${className}`);
    let chatContent = className === "outgoing" ? `<p></p>` : `  <span><img src="https://img.icons8.com/?size=256&id=37410&format=png" alt=""></span><p></p>`;
    chatLi.innerHTML = chatContent;
    chatLi.querySelector("p").textContent = message;
    return chatLi; // devolver elemento de chat <li>
}

const generateResponse = (chatElement) => {
    const API_URL = "https://api.openai.com/v1/chat/completions";
    const messageElement = chatElement.querySelector("p");

    // Definir las propiedades y el mensaje para la solicitud de API
    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${API_KEY}`
        },
        body: JSON.stringify({
            model: "gpt-3.5-turbo",
            messages: [{role: "user", content: userMessage}],
        })
    };

    // Verificar la API_KEY y los datos antes de enviar la solicitud
    console.log("API_KEY:", API_KEY);
    console.log("Solicitud RequestOptions:", requestOptions);

    // Enviar solicitud POST a API, obtener respuesta y establecer la respuesta como texto de párrafo
    fetch(API_URL, requestOptions)
        .then(res => res.json())
        .then(data => {
            console.log("Respuesta de la API:", data); // Mostrar respuesta de la API
            messageElement.textContent = data.choices[0].message.content.trim();
        })
        .catch(error => {
            console.log("Error en la solicitud:", error); // Capturar y mostrar cualquier error
            messageElement.classList.add("error");
            messageElement.textContent = "Algo salió mal !!";
        })
        .finally(() => chatbox.scrollTo(0, chatbox.scrollHeight));
}

const handleChat = () => {
    userMessage = chatInput.value.trim(); // Recibe el mensaje ingresado por el usuario y elimina los espacios en blanco adicionales
    if(!userMessage) return;

    // Borra el área de texto de entrada y establece su altura por defecto
    chatInput.value = "";
    chatInput.style.height = `${inputInitHeight}px`;

    // Agrega el mensaje del usuario al chatbox
    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatbox.scrollTo(0, chatbox.scrollHeight);
    
    setTimeout(() => {
        // Muestra el mensaje "Pensando..." mientras espera la respuesta
        const incomingChatLi = createChatLi("...", "incoming");
        chatbox.appendChild(incomingChatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
        generateResponse(incomingChatLi);
    }, 600);
}

chatInput.addEventListener("input", () => {
    // Ajusta la altura del área de texto de entrada según su contenido
    chatInput.style.height = `${inputInitHeight}px`;
    chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener("keydown", (e) => {
    // Si se presiona la tecla Enter sin la tecla Shift y la ventana
    // el ancho es mayor a 800px, maneja el chat
    if(e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
        e.preventDefault();
        handleChat();
    }
});

sendChatBtn.addEventListener("click", handleChat);
closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
