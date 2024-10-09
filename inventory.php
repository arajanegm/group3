<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1)
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include_once('dbconnect1.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafero - Inventory</title>
    <style>
        /* Basic styling for the inventory table */
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 20px;
    background: url(aa.webp)
}

.wrapper {
    max-width: 900px;
    margin: 0 auto;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.header h2 {
    margin: 0;
    color: #333;
}

.header a {
    text-decoration: none;
    color: #333;
    padding: 8px 16px;
    background-color: #f2f2f2;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.header a:hover {
    background-color: #ddd;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #A0522D; /* Light brown color */
    color: white;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #e0e0e0;
}

.add-item {
    margin-top: 20px;
    display: inline-block;
    text-decoration: none;
    padding: 10px 20px;
    background-color: #A0522D; /* Light brown color */
    color: white;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.add-item:hover {
    background-color: #8B4513; 
}

.message {
    margin-top: 20px;
    font-size: 16px;
    color: red;
    text-align: center;
}

.action-link {
    margin-right: 15px;
    text-decoration: none;
    color: blue;
    text-decoration: underline;
}
body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 20px;
    background: url(aa.webp)
}

.wrapper {
    max-width: 900px;
    margin: 0 auto;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.header h2 {
    margin: 0;
    color: #333;
}

.header a {
    text-decoration: none;
    color: #333;
    padding: 8px 16px;
    background-color: #f2f2f2;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.header a:hover {
    background-color: #ddd;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}


table th {
    background-color: #A0522D !important;  /* Light brown */
    color: white;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #e0e0e0;
}

/* Specifically target the add-item button with higher specificity */
.add-item {
    margin-top: 20px;
    display: inline-block;
    text-decoration: none;
    padding: 10px 20px;
    background-color: #A0522D !important; /* Light brown */
    color: white;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.add-item:hover {
    background-color: #8B4513 !important; /* Darker brown on hover */
}

.message {
    margin-top: 20px;
    font-size: 16px;
    color: red;
    text-align: center;
}

.action-link {
    margin-right: 15px;
    text-decoration: none;
    color: blue;
    text-decoration: underline;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 20px;
    background: url(aa.webp);
}

.wrapper {
    max-width: 900px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.8); /* Wrapper with slight transparency */
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    backdrop-filter: blur(10px); /* Adds blur to the wrapper background */
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.header h2 {
    margin: 0;
    color: #333;
}

.header a {
    text-decoration: none;
    color: #333;
    padding: 8px 16px;
    background-color: #f2f2f2;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.header a:hover {
    background-color: #ddd;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: rgba(210, 180, 140, 0.7); /* Light brown background with transparency */
    backdrop-filter: blur(8px); /* Adds blur effect to the table background */
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: rgba(160, 82, 45, 0.9); /* Darker brown for table headers */
    color: white;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: rgba(242, 242, 242, 0.5); /* Transparent rows */
}

tr:hover {
    background-color: rgba(224, 224, 224, 0.5); /* Transparent hover effect */
}

.add-item {
    margin-top: 20px;
    display: inline-block;
    text-decoration: none;
    padding: 10px 20px;
    background-color: rgba(160, 82, 45, 0.9); /* Light brown button */
    color: white;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.add-item:hover {
    background-color: rgba(139, 69, 19, 0.9); /* Darker brown on hover */
}

.message {
    margin-top: 20px;
    font-size: 16px;
    color: red;
    text-align: center;
}

.action-link {
    margin-right: 15px;
    text-decoration: none;
    color: blue;
    text-decoration: underline;
}



    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h2>Supplies</h2>
            <div>
                <span>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</span>
                <a href="logout.php">Logout</a>
            </div>
        </div>

        <?php
        
        $sql = "SELECT id, item_name, quantity, price, expiration_date, delivery_time FROM inventory";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Item Name</th>";
                echo "<th>Quantity</th>";
                echo "<th>Price</th>";
                echo "<th>Expiration Date</th>";
                echo "<th>Delivery Date/Time</th>"; 
                echo "<th>Actions</th>";
                echo "</tr>";
                
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                    echo "<td>₱" . htmlspecialchars(number_format($row['price'], 2)) . "</td>";
                    echo "<td>" . htmlspecialchars(date('Y-m-d', strtotime($row['expiration_date']))) . "</td>"; 
                    echo "<td>" . htmlspecialchars(date('Y-m-d H:i:s', strtotime($row['delivery_time']))) . "</td>"; 
                    echo "<td>";
                    echo '<a href="edit_item.php?id=' . urlencode($row['id']) . '" class="action-link">Edit</a>';
                    echo '<a href="delete_item.php?id=' . urlencode($row['id']) . '" class="action-link" onclick="return confirm(\'Are you sure you want to delete this item?\')">Delete</a>';
                    echo "</td>";
                    echo "</tr>";
                }

                echo "</table>";
        
                mysqli_free_result($result);
            } else {
                echo "<p class='message'>No inventory items found.</p>";
            }
        } else {
            echo "<p class='message'>ERROR: Could not execute $sql. " . mysqli_error($conn) . "</p>";
        }

        
        mysqli_close($conn);
        ?>

        <a href="add_item.php" class="add-item">Add New Item</a>
    </div>    
</body>
</html>
 




























<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


error_reporting(E_ALL);
ini_set('display_errors', 1);


if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
    
include_once('dbconnect2.php');


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafero - Beverages Inventory</title>
    <style>
        /* Basic styling for the inventory table */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
        }

        .wrapper {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #333;
        }

        .header a {
            text-decoration: none;
            color: #333;
            padding: 8px 16px;
            background-color: #f2f2f2;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .header a:hover {
            background-color: #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .add-item {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .add-item:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
            color: red;
            text-align: center;
        }

        .action-link {
            margin-right: 15px;
            text-decoration: none;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="wrapper">
        <div class="header">
            <h2>Beverages</h2>
            <div>            </div>
        </div>

        <?php
        // Fetch inventory data from the beverages table
        $sql = "SELECT id, item_name, quantity, price, expiration_date, delivery_time FROM beverages";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Item Name</th><th>Quantity</th><th>Price</th><th>Expiration Date</th><th>Delivery Date/Time</th><th>Actions</th></tr>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                    echo "<td>₱" . htmlspecialchars(number_format($row['price'], 2)) . "</td>";
                    echo "<td>" . htmlspecialchars(date('Y-m-d', strtotime($row['expiration_date']))) . "</td>";
                    echo "<td>" . htmlspecialchars(date('Y-m-d H:i:s', strtotime($row['delivery_time']))) . "</td>";
                    echo "<td><a href='edit_item.php?id=" . urlencode($row['id']) . "'>Edit</a> <a href='delete_item.php?id=" . urlencode($row['id']) . "' onclick=\"return confirm('Are you sure you want to delete this item?')\">Delete</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            } else {
                echo "<p class='message'>No inventory items found.</p>";
            }
        } else {
            echo "<p class='message'>ERROR: Could not execute $sql. " . mysqli_error($conn) . "</p>";
        }

        // Close the connection properly
        mysqli_close($conn);
        ?>

        <a href="add_item1.php" class="add-item">Add New Item</a>
    </div>    
</body>
</html>















<?php
// Initialize the session only if it's not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include the database connection file
include_once('dbconnect3.php');

// Check if the connection is still valid
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafero - Baked Goods</title>
    <style>
        /* Basic styling for the inventory table */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
        }

        .wrapper {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #333;
        }

        .header a {
            text-decoration: none;
            color: #333;
            padding: 8px 16px;
            background-color: #f2f2f2;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .header a:hover {
            background-color: #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .add-item {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .add-item:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
            color: red;
            text-align: center;
        }

        .action-link {
            margin-right: 15px;
            text-decoration: none;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h2>Baked Goods</h2>
        <div>
            
        </div>
    </div>

    <?php
    // Fetch inventory data from the baked_goods table
    // Fetch inventory data from the baked_goods table
$sql = "SELECT id, item_name, quantity, price, expiration_date, delivery_time FROM baked_goods";

// Check if the connection is still open before querying
if ($conn) {
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Item Name</th><th>Quantity</th><th>Price</th><th>Expiration Date</th><th>Delivery Date/Time</th><th>Actions</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td>₱" . htmlspecialchars(number_format($row['price'], 2)) . "</td>";
                echo "<td>" . htmlspecialchars(date('Y-m-d', strtotime($row['expiration_date']))) . "</td>";
                echo "<td>" . htmlspecialchars(date('Y-m-d H:i:s', strtotime($row['delivery_time']))) . "</td>";
                echo "<td><a href='edit_item.php?id=" . urlencode($row['id']) . "'>Edit</a> <a href='delete_item.php?id=" . urlencode($row['id']) . "' onclick=\"return confirm('Are you sure you want to delete this item?')\">Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "<p class='message'>No baked goods found.</p>";
        }
    } else {
        echo "<p class='message'>ERROR: Could not execute $sql. " . mysqli_error($conn) . "</p>";
    }
}

    ?>

    <a href="add_item2.php" class="add-item">Add New Item</a>
</div>    
</body>
</html>










<?php
// Initialize the session only if it's not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include the database connection file
include_once('dbconnect4.php');

// Check if the connection is still valid
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafero - Condiments</title>
    <style>
        /* Basic styling for the inventory table */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
        }

        .wrapper {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #333;
        }

        .header a {
            text-decoration: none;
            color: #333;
            padding: 8px 16px;
            background-color: #f2f2f2;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .header a:hover {
            background-color: #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .add-item {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .add-item:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
            color: red;
            text-align: center;
        }

        .action-link {
            margin-right: 15px;
            text-decoration: none;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="wrapper">
        <div class="header">
            <h2>Condiments</h2>
            <div>
            </div>
        </div>

        <?php
        // Fetch inventory data from the beverages table
        $sql = "SELECT id, item_name, quantity, price, expiration_date, delivery_time FROM condiments";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Item Name</th><th>Quantity</th><th>Price</th><th>Expiration Date</th><th>Delivery Date/Time</th><th>Actions</th></tr>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                    echo "<td>₱" . htmlspecialchars(number_format($row['price'], 2)) . "</td>";
                    echo "<td>" . htmlspecialchars(date('Y-m-d', strtotime($row['expiration_date']))) . "</td>";
                    echo "<td>" . htmlspecialchars(date('Y-m-d H:i:s', strtotime($row['delivery_time']))) . "</td>";
                    echo "<td><a href='edit_item.php?id=" . urlencode($row['id']) . "'>Edit</a> <a href='delete_item.php?id=" . urlencode($row['id']) . "' onclick=\"return confirm('Are you sure you want to delete this item?')\">Delete</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            } else {
                echo "<p class='message'>No inventory items found.</p>";
            }
        } else {
            echo "<p class='message'>ERROR: Could not execute $sql. " . mysqli_error($conn) . "</p>";
        }

        // Close the connection properly
        mysqli_close($conn);
        ?>

        <a href="add_item.php" class="add-item">Add New Item</a>
    </div>    
</body>
</html>





<?php
// Initialize the session only if it's not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include the database connection file
include_once('dbconnect5.php');

// Check if the connection is still valid
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafero - Equipment</title>
    <style>
        /* Basic styling for the inventory table */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
        }

        .wrapper {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #333;
        }

        .header a {
            text-decoration: none;
            color: #333;
            padding: 8px 16px;
            background-color: #f2f2f2;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .header a:hover {
            background-color: #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .add-item {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .add-item:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
            color: red;
            text-align: center;
        }

        .action-link {
            margin-right: 15px;
            text-decoration: none;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="wrapper">
        <div class="header">
            <h2>Equipments</h2>
            <div>
            </div>
        </div>

        <?php
        // Fetch inventory data from the equipment table without expiration_date
        $sql = "SELECT id, item_name, quantity, price, delivery_time FROM equipment";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Item Name</th><th>Quantity</th><th>Price</th><th>Delivery Date/Time</th><th>Actions</th></tr>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                    echo "<td>₱" . htmlspecialchars(number_format($row['price'], 2)) . "</td>";
                    echo "<td>" . htmlspecialchars(date('Y-m-d H:i:s', strtotime($row['delivery_time']))) . "</td>";
                    echo "<td><a href='edit_item.php?id=" . urlencode($row['id']) . "'>Edit</a> <a href='delete_item.php?id=" . urlencode($row['id']) . "' onclick=\"return confirm('Are you sure you want to delete this item?')\">Delete</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            } else {
                echo "<p class='message'>No inventory items found.</p>";
            }
        } else {
            echo "<p class='message'>ERROR: Could not execute $sql. " . mysqli_error($conn) . "</p>";
        }

        // Close the connection properly
        mysqli_close($conn);
        ?>

        <a href="add_item.php" class="add-item">Add New Item</a>
    </div>    
</body>
</html>





<?php
// Initialize the session only if it's not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include the database connection file
include_once('dbconnect6.php');

// Check if the connection is still valid
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafero - Cleaning Supplies</title>
    <style>
        /* Basic styling for the inventory table */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
        }

        .wrapper {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #333;
        }

        .header a {
            text-decoration: none;
            color: #333;
            padding: 8px 16px;
            background-color: #f2f2f2;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .header a:hover {
            background-color: #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .add-item {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .add-item:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
            color: red;
            text-align: center;
        }

        .action-link {
            margin-right: 15px;
            text-decoration: none;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="wrapper">
        <div class="header">
            <h2>Cleaning Supplies</h2>
            <div>
            </div>
        </div>

        <?php
        // Fetch inventory data from the equipment table without expiration_date
        $sql = "SELECT id, item_name, quantity, price, delivery_time FROM cleaning_supplies";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Item Name</th><th>Quantity</th><th>Price</th><th>Delivery Date/Time</th><th>Actions</th></tr>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                    echo "<td>₱" . htmlspecialchars(number_format($row['price'], 2)) . "</td>";
                    echo "<td>" . htmlspecialchars(date('Y-m-d H:i:s', strtotime($row['delivery_time']))) . "</td>";
                    echo "<td><a href='edit_item.php?id=" . urlencode($row['id']) . "'>Edit</a> <a href='delete_item.php?id=" . urlencode($row['id']) . "' onclick=\"return confirm('Are you sure you want to delete this item?')\">Delete</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            } else {
                echo "<p class='message'>No inventory items found.</p>";
            }
        } else {
            echo "<p class='message'>ERROR: Could not execute $sql. " . mysqli_error($conn) . "</p>";
        }

        // Close the connection properly
        mysqli_close($conn);
        ?>

        <a href="add_item.php" class="add-item">Add New Item</a>
    </div>    
</body>
</html>
