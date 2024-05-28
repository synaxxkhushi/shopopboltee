<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #00f;
            border-radius: 10px;
        }

        img {
            max-width: 100%;
            margin-top: 20px;
        }

        a {
            color: #00f;
        }

        input[type="email"],
        input[type="text"],
        input[type="file"],
        input[type="submit"] {
            margin-top: 10px;
            padding: 10px;
            width: 100%;
            border: none;
            background-color: #00f;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="file"] {
            background-color: transparent;
        }

        input[type="submit"]:hover {
            background-color: #005;
        }
    </style>
</head>
<body>
    <h1 class="neon-text">Payment Details</h1>
    <div class="container">
        <!-- Order Summary -->
        <h2>Order Summary</h2>
        <div id="order-summary">
            <?php
            if (isset($_GET['item']) && isset($_GET['price'])) {
                $item = $_GET['item'];
                $price = $_GET['price'];
                echo "<p>Item: $item</p>";
                echo "<p>Price: $price</p>";
            } else {
                echo "<p>No item selected.</p>";
            }
            ?>
        </div>

        <!-- Digibyte Payment -->
        <h2>Digibyte Payment</h2>
        <p>Please send the payment to the following Digibyte address:</p>
        <p>DGB Address: <strong>DD151SSFjK25tPU1NFBL2PYgGgtHNusSPs</strong></p>
        <div style="max-width: 200px; margin: 0 auto;">
            <img src="https://i.ibb.co/thdk9HW/file-10.jpg" alt="DGB QR Code">
        </div>

        <!-- Trust Wallet Link -->
        <p>Click <a href="https://link.trustwallet.com/send?coin=3&address=DD151SSFjK25tPU1NFBL2PYgGgtHNusSPs">here</a> to open Trust Wallet for payment.</p>

        <!-- Payment Confirmation Form -->
        <h2>Payment Confirmation</h2>
        <form action="submit_payment.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="item" value="<?php echo isset($_GET['item']) ? $_GET['item'] : ''; ?>">
            <input type="hidden" name="price" value="<?php echo isset($_GET['price']) ? $_GET['price'] : ''; ?>">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="telegram">Telegram Username:</label>
            <input type="text" id="telegram" name="telegram" required><br><br>
            <label for="screenshot">Upload Payment Screenshot:</label>
            <input type="file" id="screenshot" name="screenshot" accept="image/*" required><br><br>
            <input type="submit" value="Submit Payment">
        </form>
    </div>
</body>
</html>
