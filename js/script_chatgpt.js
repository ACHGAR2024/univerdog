
        async function getChatbotResponse(userInput) {
            const url = 'https://api-inference.huggingface.co/models/Qiliang/bart-large-cnn-samsum-ChatGPT_v3'; // URL de l'API Hugging Face
            const apiKey = 'Bearer xxxxxx'; // Remplacez 'xxxxxx' par votre clé API Hugging Face

            const headers = {
                'Authorization': apiKey,
                'Content-Type': 'application/json'
            };

            const body = JSON.stringify({
                'inputs': userInput
            });

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: headers,
                    body: body
                });

                if (!response.ok) {
                    throw new Error(`Erreur HTTP! Statut: ${response.status}`);
                }

                const data = await response.json();
                return data[0].generated_text; // Assurez-vous de renvoyer le texte généré
            } catch (error) {
                console.error('Erreur lors de la requête à l\'API:', error);
                return "Désolé, il y a eu un problème technique. Veuillez réessayer plus tard.";
            }
        }

        async function sendMessage() {
            const userInput = document.getElementById('userInput').value;
            if (userInput.trim() === '') return;

            displayMessage(userInput, 'user');
            document.getElementById('userInput').value = '';

            const response = await getChatbotResponse(userInput);
            displayMessage(response, 'bot');
        }

        function displayMessage(message, sender) {
            const messageContainer = document.createElement('div');
            messageContainer.className = `${sender} message`;
            messageContainer.innerText = message;
            document.getElementById('chatlogs').appendChild(messageContainer);
            messageContainer.scrollIntoView();
        }

