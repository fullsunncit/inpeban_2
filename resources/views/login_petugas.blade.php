<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - INPEBAN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F6FFF8;
        }

        /* 🔹 Center Page */
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* 🔹 Card */
        .login-card {
            background-color: #EAF4F4;
            padding: 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        /* 🔹 Title */
        .login-card h1 {
            color: #6B9080;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
        }

        /* 🔹 Input */
        .form-control {
            background-color: #CCE3DE;
            border: none;
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 15px;
        }

        .form-control:focus {
            box-shadow: none;
            border: 2px solid #6B9080;
        }

        /* 🔹 Button */
        .btn-login {
            background-color: #6B9080;
            color: white;
            font-weight: 600;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: none;
        }

        .btn-login:hover {
            background-color: #5a7a6c;
        }

        /* 🔹 Error box */
        .alert-danger {
            background-color: #ffe5e5;
            border: none;
            color: #6B9080;
            border-radius: 10px;
            font-size: 14px;
        }

        /* 🔹 Responsive tweak */
        @media (max-width: 576px) {
            .login-card {
                padding: 25px;
            }

            .login-card h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">

        <div class="login-card">

            <h1>LOGIN PETUGAS</h1>

            <!-- 🔹 ERROR VALIDATION -->
            @if ($errors->any())
                <div class="alert alert-danger py-2 px-3 mb-3">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- 🔹 FORM -->
            <form method="POST" action="/login_petugas">
                @csrf

                <input type="text" name="username" class="form-control" placeholder="Username" required>

                <input type="password" name="password" class="form-control" placeholder="Password" required>

                <button type="submit" class="btn btn-login mt-2">
                    Login Petugas
                </button>
                <div class="text-center mt-3">
                    <a href="/" class="text-decoration-none" style="color: #6B9080;">
                        Kembali ke Home
                    </a>
                </div>

                @if (session('error'))
                    <p style="color:red">{{ session('error') }}</p>
                @endif
            </form>

        </div>

    </div>

</body>

</html>
