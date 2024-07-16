<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="max-w-lg mx-auto mt-4">
        <a href="{{ url('login/google') }}" class="flex items-center justify-center bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            <svg class="w-6 h-6 mr-2" viewBox="0 0 48 48">
                <path fill="#4285F4" d="M24 9.5c1.1 0 2.2.1 3.3.4V4.3h7.9V16h-9c-.3-.8-.8-1.4-1.5-1.9V9.5z"/>
                <path fill="#34A853" d="M31.8 22.4l.1 3.7h-7.9v-7.3h4.6c-.5-1.1-1.1-2.1-1.8-3h-5.2V5h5.2c1.4 1.3 2.7 2.8 3.9 4.5C32.7 12.4 34 16.1 34 20s-1.3 7.6-3.2 10.7c-1.2 1.7-2.5 3.2-3.9 4.5h-5.2v-7.3h5.2c.6-.9 1.1-1.9 1.5-2.9H31.8z"/>
                <path fill="#FBBC05" d="M24 38.5c4.3 0 7.9-1.5 10.5-3.9l6.5 6.5C35.1 45.3 29.9 48 24 48c-4.9 0-9.6-1.6-13.5-4.4L7 36.6c2.5 2 5.6 3.4 9 4.2 1.5.2 3.1.3 4.6.3v-7.3h-.6c-2.3 0-4.5-.6-6.4-1.7l-4.5-4.5 6.3-6.3 4.5 4.5c.6.6 1.4 1 2.2 1.3v5.7c1.8.4 3.5.6 5.2.6z"/>
                <path fill="#EA4335" d="M7.6 20.5h-5.2v-5h5.2v5zM5 20.5H.3c.6-2.3 1.8-4.3 3.5-6l4.5 4.5-3.3 1.5V20.5zM14.5 10.5L7.6 3.6c2.9-2.2 6.2-3.7 9.9-4.3L14.5 10.5zM9 14.5c1.6 1.6 3.4 2.9 5.3 3.8V19.3L7.7 23 9 14.5z"/>
            </svg>
            Login with Google
        </a>
    </div>
</body>

</html>
