<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAPTCHA Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
    /* Centering the form */
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .container {
        background: #fff;
        padding: 20px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        text-align: center;
        width: 300px;
    }

    img {
        display: block;
        margin: 10px auto;
        border-radius: 5px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        text-align: center;
    }

    .btn {
        width: 100%;
        padding: 10px;
        background: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn:hover {
        background: #218838;
    }

    .container img {
        font-weight: 900;
    }
    </style>
</head>

<body>

    <div class="container">
        <p class="text-danger">
            <?php if (isset($error)) {
                echo $error;
            } ?>
        </p>
        <form action="processCaptcha" method="POST">
            <h2>Solve this puzzle</h2>
            <img src="captcha">
            <input type="text" name="captcha" class="form-control" placeholder="Enter CAPTCHA" required>
            <button class="btn" type="submit">Submit</button>
        </form>
    </div>

</body>

</html>