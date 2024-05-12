<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Purchase!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.5s ease;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .logo {
            max-width: 150px;
            margin: 20px auto;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #45a049;
        }
        .order-details {
            text-align: left;
            margin-top: 40px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .order-details h2 {
            color: #333;
            margin-bottom: 10px;
        }
        .order-details p {
            color: #666;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="khalti.png" alt="Your Company/Project Logo" class="logo">
        <h1>Thank You for Your Purchase!</h1>
        <p>We appreciate your business.</p>
        <p>Your order details:</p>
        <div class="order-details">
            <h2>Order Summary</h2>
            <p><strong>Order ID:</strong> #123456789</p>
            <p><strong>Date:</strong> May 5, 2024</p>
            <p><strong>Total Amount:</strong> $50.00</p>
            <p><strong>Payment Method:</strong> Credit Card</p>
            <p><strong>Items Purchased:</strong></p>
            <ul>
                <li>Product A - $20.00</li>
                <li>Product B - $30.00</li>
            </ul>
        </div>
        <p>If you have any questions or need further assistance, please don't hesitate to contact us at <strong>Your Contact Information</strong>.</p>
        <p>Thanks again for choosing <strong>Your Company/Project Name</strong>!</p>
        <a href="contact.html" class="button">Contact Us</a>
    </div>
</body>
</html>
