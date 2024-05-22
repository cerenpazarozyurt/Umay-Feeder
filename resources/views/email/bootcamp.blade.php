<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Onayı</title>
    <style>

        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        img {
            max-width: 100%;
            height: auto;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 200px;
        }

        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('asset/image/umaylighter.png') }}" alt="Umay Feeder Logo">
        </div>
        <div class="content">
            <h1>{{ $details['title'] }}</h1>
            <p>{!! nl2br(e($details['body'])) !!}</p>
        </div>
        <div class="footer">
            <p>Teşekkür ederiz!</p>
        </div>
    </div>
</body>
</html>
