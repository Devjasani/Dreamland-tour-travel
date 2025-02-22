<?php
// Function to sanitize form inputs
function clean_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
$servername = "localhost";
$username = "root";
$password = "";
$database = "booking_dp";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data

    $id = clean_input($_POST["id"]);
    $name = clean_input($_POST["name"]);
    $email = clean_input($_POST["email"]);
    $phone = clean_input($_POST["phone"]);
    $address = clean_input($_POST["address"]);
    $location = clean_input($_POST["location"]);
    $price = clean_input($_POST["price"]);
    $guests = clean_input($_POST["guests"]);
    $night = clean_input($_POST["night"]);
    $total = clean_input($_POST["total"]);
    $arrivals = clean_input($_POST["arrivals"]);
    $leaving = clean_input($_POST["leaving"]);
    $nameOnCard = clean_input($_POST["nameOnCard"]);
    $cardNumber = clean_input($_POST["cardNumber"]);
    $expMonth = clean_input($_POST["expMonth"]);
    $expYear = clean_input($_POST["expYear"]);
    $cvv = clean_input($_POST["cvv"]);
    $payerEmail = clean_input($_POST["payerEmail"]);
    $payerAddress = clean_input($_POST["payerAddress"]);
    $payerCity = clean_input($_POST["payerCity"]);
    $payerState = clean_input($_POST["payerState"]);
    $payerZipCode = clean_input($_POST["payerZipCode"]);

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO payment_mastar (booking_id,name, nameOnCard, cardNumber,expMonth,expYear, cvv, payerEmail, payerAddress, payerCity, payerState, payerZipCode) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)");
    $stmt->bind_param("issiiiissssi", $id, $name, $nameOnCard, $cardNumber, $expMonth, $expYear, $cvv, $payerEmail, $payerAddress, $payerCity, $payerState, $payerZipCode,);
    if ($stmt->execute()) {
    } else {
        header("Location: payment.php");
    }

    // Set the include path to the TCPDF library
    set_include_path(get_include_path() . PATH_SEPARATOR . 'TCPDF-main');

    // Include the TCPDF library (Ensure the path to TCPDF.php is correct)
    require_once('tcpdf.php');

    // Create new TCPDF instance
    $pdf = new TCPDF();
    $pdf->AddPage();

    // Set page border
    $pdf->SetLineStyle(array('width' => 0.5, 'color' => array(0, 0, 0)));
    $pdf->Rect(5, 5, 200, 287); // Adjust the values as needed


    // Add header with logo and slogan
    $css_styles = "
    .header {
        text-align: center;
        background-color: #f0f0f0;
        padding: 10px;
    }

    .header img {
        width: 100px;
        display: block;
        margin: 0 auto;
    }

    .header h3 {
        color: #031e3a;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid red; /* changed border color to red */
        padding: 8px;
        text-align: left;
    }

    ";

    $header_html = "
    <style>$css_styles</style>
    <div class='header'>
        <img src='logo2.jpg' alt='Your Logo'/>
        <h3>DREAMLAND TOUR & TRAVEL</h3>
        <h3>Journey Beyond Imagination</h3>
    </div>
    <hr>
    ";


    $pdf->writeHTML($header_html, true, false, true, false, '');


    // Add first table for displaying name to leaving data
    $table1_html = "
<br>
    <h3> Tourpackage details:- </h3><br>

<table>
    <tr>
        <td><b>Name:</b></td>
        <td>$name</td>
    </tr>
    <tr>
        <td><b>Email:</b></td>
        <td>$email</td>
    </tr>
    <tr>
        <td><b>Phone:</b></td>
        <td>$phone</td>
    </tr>
    <tr>
        <td><b>Address:</b></td>
        <td>$address</td>
    </tr>
    <tr>
        <td><b>Location:</b></td>
        <td>$location</td>
    </tr>
    <tr>
        <td><b>Price:</b></td>
        <td>$price</td>
    </tr>
    <tr>
        <td><b>Number of Guests:</b></td>
        <td>$guests</td>
    </tr>
    <tr>
        <td><b>Total Nights:</b></td>
        <td>$night</td>
    </tr>
    <tr>
        <td><b>Total Bill:</b></td>
        <td>$total</td>
    </tr>
    <tr>
        <td><b>Arrival Date:</b></td>
        <td>$arrivals</td>
    </tr>
    <tr>
        <td><b>Leaving Date:</b></td>
        <td>$leaving</td>
    </tr>
</table>
";


    $pdf->writeHTML($table1_html, true, false, true, false, '');


    // Add second table for displaying nameOnCard to payerZipCode data
    $table2_html = "

    <h3>Payment details:- </h3>
<table>
    <tr>
        <td><b>Name on Card:</b></td>
        <td>$nameOnCard</td>
    </tr>
    <tr>
        <td><b>Credit Card Number:</b></td>
        <td>$cardNumber</td>
    </tr>
    <tr>
        <td><b>Expiration Month:</b></td>
        <td>$expMonth</td>
    </tr>
    <tr>
        <td><b>Expiration Year:</b></td>
        <td>$expYear</td>
    </tr>
    <tr>
        <td><b>CVV:</b></td>
        <td>$cvv</td>
    </tr>
    <tr>
        <td><b>Payer Email:</b></td>
        <td>$payerEmail</td>
    </tr>
    <tr>
        <td><b>Payer Address:</b></td>
        <td>$payerAddress</td>
    </tr>
    <tr>
        <td><b>Payer City:</b></td>
        <td>$payerCity</td>
    </tr>
    <tr>
        <td><b>Payer State:</b></td>
        <td>$payerState</td>
    </tr>
    <tr>
        <td><b>Payer Zip Code:</b></td>
        <td>$payerZipCode</td>
    </tr>
</table>
";

    $pdf->writeHTML($table2_html, true, false, true, false, '');

    // Add footer with real-time date and time and note
    $footer_html = "
    <br>
<div style='text-align: center; font-size: 20px;'>Date and Time: " . date('Y-m-d H:i:s') . "</div>

<div style='font-size: 20px; text-align: justify;'>
    <strong>Note:</strong><br><br>
    - If your payment is successfully completed, you will receive an email within 24 hours. Otherwise, our customer care team will contact you via phone or email. Please cooperate with them.<br>
    - If any tourist wishes to cancel the tour package, they must call this number +91 8155-888063 at least 15 days before the tour date.<br>
    - In case of emergencies such as death or hospitalization, users are eligible to cancel the tour package. However, for this process, they also need to call +91 8155-888063.<br>
    - For any further transaction-related queries or other issues, users can call +91 8128 681683.<br>
</div>

";
    $pdf->SetY(295);
    $pdf->writeHTML($footer_html, true, false, true, false, '');

    // Output PDF directly to the browser
    $pdf->Output('invoice.pdf', 'I'); // 'I' for inline display

    // Exit to prevent further output
    exit;
}
