const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');
const axios = require('axios');

const app = express();
const PORT = 5000;
let requestCount = 0;
const RATE_LIMIT = 5; // Max requests per minute
const RATE_LIMIT_TIME = 60000; // 1 minute in milliseconds


const { Configuration, OpenAIApi } = require("openai");

const configuration = new Configuration({
  apiKey: process.env.OPENAI_API_KEY,
});

const openai = new OpenAIApi(configuration);


setInterval(() => {
    requestCount = 0; // Reset count every minute
}, RATE_LIMIT_TIME);

// Middleware
app.use(cors());
app.use(bodyParser.json());

// OpenAI API Configuration
const OPENAI_API_KEY = 'asst_8qtakNXNprg9mRNzkXLTtQgC';

app.post('/chat', async (req, res) => {
    const { message } = req.body;

    try {
        const response = await axios.post(
            'https://api.openai.com/v1/chat/completions',
            {
                model: 'gpt-3.5-turbo',
                messages: [{ role: 'user', content: message }],
            },
            {
                headers: {
                    'Authorization': `Bearer ${OPENAI_API_KEY}`,
                    'Content-Type': 'application/json',
                },
            }
        );

        const botMessage = response.data.choices[0].message.content;
        res.json({ reply: botMessage });
    } catch (error) {
        console.error('Error communicating with OpenAI API:', error.message);
        res.status(500).json({ error: 'Failed to get response from AI' });
    }
});

app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
