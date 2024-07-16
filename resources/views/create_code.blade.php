<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Add custom styles here */
        .code {
            font-size: 24px;
            /* Adjust font size as needed */
            font-weight: bold;
            color: #333;
            /* Adjust color as needed */
        }
    </style>
    <script>
        async function handleEmailSubmit(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            const text = await response.text();
            try {
                const result = JSON.parse(text);
                showVerificationForm(result.code);
            } catch (error) {
                console.error('Error parsing JSON:', error);
                console.error('Response text:', text);
                alert('An error occurred. Please try again later.');
            }
        }

        function showVerificationForm(code) {
            document.getElementById('email-form').style.display = 'none';
            document.getElementById('verification-form').style.display = 'block';
            document.getElementById('verification-code').textContent = code;
        }

        function updateMailTo() {
            const email = document.getElementById('email').value;
            const code = document.getElementById('verification-code').textContent;
            const subject = encodeURIComponent('Verification Code');
            const body = encodeURIComponent(`Your verification code is: ${code}`);

            const mailToLink = `mailto:${email}?subject=${subject}&body=${body}`;
            window.location.href = mailToLink;
        }
    </script>
</head>

<body class="bg-gray-100">
    <div id="email-form" class="max-w-lg mx-auto mt-8 p-4 bg-white rounded-lg shadow-md text-center">
        <form action="{{ route('code.store') }}" method="post" onsubmit="handleEmailSubmit(event)">
            @csrf
            <div class="mb-4">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Generate
                    a new code</button>
            </div>
        </form>
    </div>

    <div id="verification-form" class="max-w-lg mx-auto mt-8 p-4 bg-white rounded-lg shadow-md text-center"
        style="display: none;">
        <form id="verification-form">
            <div class="mb-4">
                <label for="verification-code" class="block text-gray-700 text-sm font-bold mb-2">Verification
                    Code</label>
                <div id="verification-code" class="code text-4xl mb-4"></div>
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Enter Email</label>
                <input type="email" name="email" id="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-center"
                    required>
            </div>
            <a href="#"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                onclick="updateMailTo()">Send</a>
        </form>
    </div>
</body>

</html>
