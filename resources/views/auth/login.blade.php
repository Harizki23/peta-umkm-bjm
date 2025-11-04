<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        .container {
            width: 80%;
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        input[type="email"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            display: inline-block;
            width: 100%;
            padding: 12px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .admin-login {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .admin-login a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .admin-login a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin-top: auto;
        }
    </style>
</head>

<body>
    <header>
        <h1>SIGAP UMKM</h1>
    </header>

    <div class="container">
        <h2>Login</h2>
        <p id="errorMessage" style="color: red;"></p>
        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="" onsubmit="login()">
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
        <div class="admin-login">
            <a href="{{ route('login2') }}">Login Sebagai Admin</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 All rights reserved.</p>
    </footer>

    <script>
        function login() {
            var expiryDate = new Date();
            expiryDate.setTime(expiryDate.getTime() + (10 * 60 * 1000));;

            document.cookie = "session=loggedIn; expires=" + expiryDate.toUTCString() + "; path=/;";
            window.location.href = "/dashboard";
        }
    </script>
</body>

</html>