<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GoParcel - Price Rates</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./icon/favicon-16x16.png">
    <link rel="manifest" href="./icon/site.webmanifest">
</head>

<body>
    <div class="navbar">
        <a href="./index.html" class="Logo">
            <img src="./logo.png" alt="page icon">
        </a>
        <div class="dropdown">
            <button class="dropbtn">Services</button>
            <div class="dropdown-content">
                <a href="./shipping.html">Shipping</a>
                <a href="./Tracking.html">Track & Trace</a>
                <a href="./pricerates.html">Price Rates</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Support</button>
            <div class="dropdown-content">
                <a href="./about.html">About us</a>
                <a href="./contact.html">Contact</a>
                <a href="./faq.html">FAQ</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Join Us</button>
            <div class="dropdown-content">
                <a href="./career.html">Career</a>
            </div>
        </div>
        <div class="account-section">
        <a href="signin.html"><span class="btn signin">Sign In</span></a>
        </div>
    </div>
    <div class="content">
        <h1 style="color:#858585;"><b>Shipping Rates</b></h1>
        <div>
            <form action="pricerates.php">    
                <table>
                    <tr>
                        <td>
                            <label for="shipFrom"><span class="required">*</span>Postcode (FROM)</label>
                            <input type="text" id="shipFrom" name="shipFrom" value="<?php if (isset($_POST['stateFrom'])) echo $_POST['stateFrom']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="shipTo"><span class="required">*</span>Postcode (TO)</label>
                            <input type="text" id="shipTo" name="shipTo" value="<?php if (isset($_POST['stateTo'])) echo $_POST['stateTo']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="weight"><span class="required">*</span>Weight (KG)</label>
                            <input type="text" id="weight" name="weight" value="<?php if (isset($_POST['weight'])) echo $_POST['weight']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="shipment">Shipping Type</label>
                            <select name="shipmet" id="shipmet">
                                <option value="REG">Regular</option>
                                <option value="EXP">Next Day Delivery</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

<footer>
    <div>
        <h3>Services</h3>
        <a href="./shipping.html">Shipping</a>
        <a href="./Tracking.html">Track & Trace</a>
    </div>
    <div>
        <h3>Support</h3>
        <a href="./about.html">About us</a>
        <a href="./contact.html">Contact</a>
        <a href="./faq.html">FAQ</a>
    </div>
    <div>
        <h3>Join Us</h3>
        <a href="./career.html">Career</a>
    </div>
</footer>

</html>