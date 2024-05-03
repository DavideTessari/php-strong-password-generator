<?php
session_start();

if(isset($_SESSION['generated_password'])) {
    $generatedPassword = $_SESSION['generated_password'];
    unset($_SESSION['generated_password']);
} else {
    $_SESSION['error_message'] = "Nessuna password generata.";
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generata</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h2>Password Generata</h2>
        <div class="password"><?php echo $generatedPassword; ?></div>
    </div>
</body>
</html>
