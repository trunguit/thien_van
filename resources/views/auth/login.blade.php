
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-image: url('https://raw.githubusercontent.com/CiurescuP/LogIn-Form/main/bg.jpg');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="bg-white bg-opacity-20 backdrop-blur-md rounded-lg p-8 w-full max-w-md">
        <h2 class="text-3xl font-bold text-white mb-6 text-center">Login Here</h2>
        <form action="{{route('postLogin')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-white text-lg mb-2" for="username">Email</label>
                <input name="email" class="w-full p-3 rounded bg-gray-800 bg-opacity-50 text-white placeholder-gray-400" type="text" id="username" placeholder="Email or Phone">
            </div>
            <div class="mb-6">
                <label class="block text-white text-lg mb-2" for="password">Mật khẩu</label>
                <input name="password" class="w-full p-3 rounded bg-gray-800 bg-opacity-50 text-white placeholder-gray-400" type="password" id="password" placeholder="Password">
            </div>
            <button class="w-full p-3 bg-gray-800 bg-opacity-50 text-white rounded hover:bg-gray-700">Log In</button>
        </form>
        
    </div>
</body>
</html>