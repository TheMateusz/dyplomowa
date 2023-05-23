<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container mx-auto">
    <h1 class="text-2xl font-bold my-4">Chat</h1>

    <div id="messages" class="border border-gray-300 rounded p-4 mb-4 h-64 overflow-y-auto"></div>

    <form id="message-form" class="flex items-center mb-4">
        <input id="message-input" type="text" placeholder="Type a message..." class="border border-gray-300 rounded px-4 py-2 mr-2 flex-grow">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Send</button>
    </form>
</div>

@vite(['resources/js/chat.js'])
</body>
</html>
