<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Diblokir Sementara</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f8d7da;
            color: #721c24;
            text-align: center;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            border: 2px solid #f5c6cb;
        }

        h2 {
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        #countdown {
            font-size: 20px;
            font-weight: bold;
            color: #dc3545;
            animation: pulse 1s infinite alternate;
        }

        @keyframes pulse {
            from { opacity: 1; }
            to { opacity: 0.6; }
        }

        .btn {
            display: inline-block;
            background: #dc3545;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 15px;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #c82333;
        }
    </style>
    <script>
        function startCountdown(seconds) {
            let countdownElement = document.getElementById("countdown");
            let remainingTime = seconds;

            function updateCountdown() {
                countdownElement.textContent = remainingTime + " detik";
                if (remainingTime > 0) {
                    remainingTime--;
                    setTimeout(updateCountdown, 1000);
                } else {
                    window.location.href = "{{ route('auth.login.form') }}";
                }
            }

            updateCountdown();
        }
    </script>
</head>
<body onload="startCountdown({{ $remainingTime }})">
    <div class="container">
        <h2>Anda Diblokir Sementara</h2>
        <p>Anda telah melebihi batas percobaan login. Silakan coba lagi dalam <span id="countdown"></span>.</p>
        <a href="{{ route('auth.login.form') }}" class="btn">Coba Login Sekarang</a>
    </div>
</body>
</html>
