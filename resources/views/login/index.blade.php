<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portal Berita</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #173a6e, #0d1a38);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #e3eafc;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(23,58,110,0.10);
            width: 100%;
            max-width: 400px;
            text-align: center;
            color: #173a6e;
        }
        h2 {
            margin-bottom: 25px;
            color: #173a6e;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #173a6e;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #173a6e;
            border-radius: 6px;
            font-size: 14px;
            color: #173a6e;
            background: #fff;
        }
        input:focus {
            outline: none;
            border-color: #173a6e;
            box-shadow: 0 0 6px rgba(23,58,110,0.15);
        }
        button {
            width: 100%;
            padding: 10px;
            background: linear-gradient(90deg, #173a6e 0%, #0d1a38 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px 0 rgba(13,26,56,0.15);
            transition: background 0.2s ease, transform 0.2s ease;
            font-family: 'Poppins', Arial, sans-serif;
        }
        button:hover {
            background: linear-gradient(90deg, #0d1a38 0%, #173a6e 100%);
            transform: translateY(-2px);
        }
        .error {
            color: #173a6e;
            font-size: 13px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
        .success {
            color: #173a6e;
            font-size: 13px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Portal Berita - Login</h2>

        {{-- Pesan error --}}
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Pesan sukses (misalnya setelah logout) --}}
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
