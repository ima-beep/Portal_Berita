<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Portal Berita</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #173a6e 0%, #0d1a38 100%);
      font-family: 'Poppins', Arial, sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-container {
      width: 100%;
      max-width: 400px;
      margin: 60px auto;
      background: #e3eafc;
      box-shadow: 0 2px 16px 0 rgba(23, 58, 110, 0.10);
      padding: 32px 24px;
      border-radius: 16px;
      border: 1px solid #173a6e;
      text-align: center;
    }
    h2 {
      text-align: center;
      color: #173a6e;
      margin-bottom: 24px;
      font-weight: bold;
      font-family: 'Playfair Display', serif;
    }
    label {
      display: block;
      margin-bottom: 8px;
      color: #173a6e;
      font-weight: 500;
      text-align: left;
      max-width: 280px;
      margin-left: auto;
      margin-right: auto;
      font-family: 'Poppins', Arial, sans-serif;
    }
    input[type="text"], input[type="password"] {
      width: 100%;
      max-width: 280px;
      padding: 12px;
      margin-bottom: 18px;
      border: 1px solid #173a6e;
      border-radius: 8px;
      font-size: 15px;
      background: #fff;
      color: #173a6e;
      transition: 0.3s;
      display: block;
      margin-left: auto;
      margin-right: auto;
      font-family: 'Poppins', Arial, sans-serif;
    }
    input[type="text"]:focus, input[type="password"]:focus {
      border-color: #173a6e;
      box-shadow: 0 0 8px rgba(23, 58, 110, 0.15);
      outline: none;
    }
    button {
      width: 100%;
      max-width: 280px;
      padding: 12px;
      background: linear-gradient(135deg, #173a6e, #0d1a38);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: transform 0.2s ease, opacity 0.3s ease;
      display: block;
      margin: 0 auto;
    }
    button:hover {
      transform: translateY(-2px);
      opacity: 0.9;
      background: linear-gradient(135deg, #0d1a38, #173a6e);
    }
    .footer {
      text-align: center;
      margin-top: 18px;
      color: #173a6e;
      font-size: 14px;
    }
    .alert {
      max-width: 280px;
      margin: 0 auto 16px;
      padding: 10px;
      border-radius: 8px;
      font-size: 14px;
      background: #e3eafc;
      color: #173a6e;
    }
    .alert-error {
      background: #ffe5e5;
      color: #d93025;
      border: 1px solid #f5b5b5;
    }
    .alert-success {
      background: #e6ffed;
      color: #1e7e34;
      border: 1px solid #a3f7c2;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login Portal Berita</h2>

    {{-- Pesan error --}}
    @if($errors->has('login'))
      <div class="alert alert-error">{{ $errors->first('login') }}</div>
    @endif

    {{-- Pesan sukses --}}
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
      @csrf
      <label for="username">Username</label>
      <input type="text" id="username" name="username" value="{{ old('username') }}" required>
      
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Login</button>
    </form>

    <div class="footer">&copy; 2025 Portal Berita</div>
  </div>
</body>
</html>
