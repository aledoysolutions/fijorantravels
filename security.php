<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Error - Suspicious Activity Detected</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .error-404 {
            text-align: center;
            margin-top: 100px;
        }
        .error-404 h1 {
            font-size: 150px;
            font-weight: bold;
            color: #333;
        }
        .error-404 p {
            font-size: 20px;
            color: #666;
        }
        .error-404 a {
            background-color: #337ab7;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-404">
            <h1>403</h1>
            <p></p>
            <p><?= $message;?> </p>
            <a href="solve-captcha">I'm not a robot</a>
        </div>
    </div>
</body>
</html>