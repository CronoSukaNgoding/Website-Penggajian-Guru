<!-- app/Views/reset_password.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="password"] {
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form action="reset_password/update_password" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <label for="password">Password Baru:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Konfirmasi Password Baru:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <?php if (isset($error)) : ?>
            <div class="error"><?= $error ?></div>
            <?php endif ?>
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>

</html>