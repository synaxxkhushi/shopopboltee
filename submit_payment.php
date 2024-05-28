<?php
// Telegram bot settings
$bot_token = '7126145060:AAHNE5As18facj1bE5mwW8iDCnuGwhkKSHc';
$chat_id = '1836040684'; // Owner's chat ID

// Get email, telegram username, item, and price and validate
$email = $_POST['email'];
$telegram = $_POST['telegram'];
$item = $_POST['item'];
$price = $_POST['price'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email address.');
}

// Check if file was uploaded without errors
if(isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0){
    $file_name = $_FILES['screenshot']['name'];
    $temp_name = $_FILES['screenshot']['tmp_name'];
    $file_size = $_FILES['screenshot']['size'];
    $file_type = $_FILES['screenshot']['type'];
    
    // Read file contents
    $fp = fopen($temp_name, 'r');
    $file_content = fread($fp, filesize($temp_name));
    fclose($fp);
    
    // Prepare message with email, telegram username, item, price, and payment screenshot
    $message = "New payment received!\n\n";
    $message .= "Email: $email\n";
    $message .= "Telegram Username: $telegram\n";
    $message .= "Item: $item\n";
    $message .= "Price: $price\n\n";
    $message .= "Payment Screenshot:";
    
    // Prepare screenshot as attachment
    $telegram_params = [
        'chat_id' => $chat_id,
        'caption' => $message,
        'photo' => new CURLFile($temp_name, $file_type, $file_name)
    ];
    
    // Send request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot{$bot_token}/sendPhoto");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $telegram_params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Check if message sent successfully
    if (!$response) {
        die('Error sending message.');
    }

    // Echo HTML for "Waiting for Order" message
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting for Order</title>
    <style>
        /* CSS styles */
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            text-shadow: 0 0 10px #fff, 0 0 20px #00f;
        }

        .neon-text {
            animation: neon 1.5s ease-in-out infinite alternate;
        }

        @keyframes neon {
            from {
                text-shadow: 0 0 10px #fff, 0 0 20px #00f, 0 0 30px #0ff, 0 0 40px #0f0, 0 0 70px #0f0, 0 0 80px #0f0, 0 0 100px #0f0;
            }
            to {
                text-shadow: 0 0 5px #fff, 0 0 10px #00f, 0 0 15px #0ff, 0 0 20px #0f0, 0 0 35px #0f0, 0 0 40px #0f0, 0 0 50px #0f0;
            }
        }
    </style>
</head>
<body>
    <h1 class="neon-text">Waiting for Order</h1>
    <p>Please wait some time for your order. It may take up to 24 hours for your order to be processed.</p>
</body>
</html>
HTML;
} else {
    // Error message if file upload failed
    echo 'Error uploading file.';
}
?>
