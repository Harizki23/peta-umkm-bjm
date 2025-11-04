<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        header {
            background: rgba(0, 0, 0, 0.8);
            width: 100%;
            text-align: center;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            color: #00ff99;
            text-shadow: 0 0 5px #00ff99, 0 0 10px #00ff99;
        }

        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            margin: 100px auto;
            box-shadow: 0 0 15px rgba(0, 255, 153, 0.5);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #00ff99;
            margin-bottom: 20px;
            text-shadow: 0 0 5px #00ff99, 0 0 10px #00ff99;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #00ff99;
            text-shadow: 0 0 5px #00ff99, 0 0 10px #00ff99;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            outline: none;
            box-shadow: 0 0 10px rgba(0, 255, 153, 0.5);
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        button[type="submit"] {
            background: #00ff99;
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        button[type="submit"]:hover {
            background: #00cc77;
        }

        footer {
            position: absolute;
            bottom: 20px;
            text-align: center;
            width: 100%;
            color: #fff;
        }

        footer p {
            margin: 0;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <header>
        <h1>SIGAP UMKM</h1>
    </header>

    <div class="container">
        <h2>Login Admin</h2>
        <p id="errorMessage" style="color: red;"></p>
        <form method="POST" action="{{ route('login2') }}" class="needs-validation" novalidate="" onsubmit="login()">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input id="email" type="email"
                    class="form-control @error('email')
                        is-invalid
                    @enderror"
                    name="email" tabindex="1" autofocus>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password:</label>
                <input id="password" type="password"
                    class="form-control @error('password')
                    is-invalid
                @enderror"
                    name="password" tabindex="2">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 All rights reserved.</p>
    </footer>

    <script>
        function login() {
            var expiryDate = new Date();
            expiryDate.setTime(expiryDate.getTime() + (60 * 60 * 1000));

            document.cookie = "session=loggedIn; expires=" + expiryDate.toUTCString() + "; path=/;";
            window.location.href = "/presensi";
        }
    </script>
</body>

</html>