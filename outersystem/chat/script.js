// Toggle chatbot visibility
function toggleChat() {
    const chatbot = document.getElementById('chatbot-container');
    const openButton = document.getElementById('open-chat');
    if (chatbot.style.display === 'none' || chatbot.style.display === '') {
        chatbot.style.display = 'flex';
        openButton.style.display = 'none';
    } else {
        chatbot.style.display = 'none';
        openButton.style.display = 'block';
    }
}

// Handle user message submission
async function sendMessage(event) {
    event.preventDefault();
    const userInput = document.getElementById('user-input');
    const message = userInput.value.trim();
    if (message) {
        displayMessage(message, 'user-message');
        userInput.value = '';

        try {
            const response = await fetch('http://localhost:5000/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message }),
            });

            if (response.ok) {
                const data = await response.json();
                displayMessage(data.reply, 'bot-message');
            } else {
                displayMessage('Error: Unable to get a response from the server.', 'bot-message');
            }
        } catch (error) {
            displayMessage('Error: Could not connect to the server.', 'bot-message');
        }
    }
}


// Display messages in chat
function displayMessage(message, className) {
    const chatMessages = document.getElementById('chat-messages');
    const messageDiv = document.createElement('div');
    messageDiv.className = className;
    messageDiv.textContent = message;
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll
}

// Simple bot response logic
function generateBotResponse(userMessage) {
    const responses = {
        hello: 'Hi there! How can I assist you today?',
        help: 'Sure, I am here to help. What do you need assistance with?',
        default: 'I am not sure I understand. Can you rephrase?',
    };
    const key = userMessage.toLowerCase();
    return responses[key] || responses.default;
}
