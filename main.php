<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="chat-container">
        <div id="messages"></div>
        <input type="text" id="user-input" placeholder="Type your message..." />
        <button onclick="sendMessage()">Send</button>
    </div>

    <script>
        function sendMessage() {
            const userInput = document.getElementById("user-input").value;
            document.getElementById("user-input").value = "";

            fetch("apis.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ message: userInput }),
            })
                .then(response => response.json())
                .then(data => {
                    const chatResponse = data.reply;
                    document.getElementById("messages").innerHTML += `<p>User: ${userInput}</p><p>ChatGPT: ${chatResponse}</p>`;
                });
        }
    </script>

</body>

</html>