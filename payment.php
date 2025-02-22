<?php
// Change these to match your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "booking_dp";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define arrays to store data
$usernames = array();
$emails = array();
if (!empty($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $sql = "SELECT * FROM book_form WHERE id = " . $id . "";
    $result = $conn->query($sql);
}
// SQL query to fetch data



// Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Fetch each row and store data in arrays

    while ($row = $result->fetch_assoc()) {
        $Data['id'] = $row['id'];
        $Data['name'] = $row['name'];
        $Data['email'] = $row['email'];
        $Data['phone'] = $row['phone'];
        $Data['address'] = $row['address'];
        $Data['location'] = $row['location'];
        $Data['price'] = $row['price'];
        $Data['guests'] = $row['guests'];
        $Data['total'] = $row['total'];
        $Data['night'] = $row['night'];
        $Data['arrivals'] = $row['arrivals'];
        $Data['leaving'] = $row['leaving'];
        $Data['payment'] = $row['payment'];
    }
} else {
    echo "No records found";
}

// Close connection
$conn->close();

// Now $usernames and $emails arrays contain the data fetched from the database
?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>payment</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-transform: capitalize;
            transition: all .2s linear;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
            min-height: 100vh;
            background: linear-gradient(90deg, #09213B 60%, #FD8234 40.1%);
        }

        .container form {
            padding: 20px;
            width: 900px;
            background: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);

            /* scroll bar */
            height: 850px;
            overflow-y: auto;
        }

        /* scroll bar */
        .container form::-webkit-scrollbar {
            width: 1rem;
        }

        .container form::-webkit-scrollbar-track {
            background-color: #FD8234;
        }

        .container form::-webkit-scrollbar-thumb {
            background-color: #031e3a;
        }




        .container form .row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .container form .row .col {
            flex: 1 1 250px;
        }

        .container form .row .col .title {
            font-size: 20px;
            color: #09213a;
            padding-bottom: 5px;
            text-transform: uppercase;
        }

        .container form .row .col .inputBox {
            margin: 15px 0;
        }

        .container form .row .col .inputBox span {
            margin-bottom: 10px;
            display: block;
        }

        .container form .row .col .inputBox input {
            width: 100%;
            border: 1px solid #ccc;
            padding: 10px 15px;
            font-size: 15px;
            text-transform: none;
        }

        .container form .row .col .inputBox input:focus {
            border: 1px solid #000;
        }

        .container form .row .col .flex {
            display: flex;
            gap: 15px;
        }

        .container form .row .col .flex .inputBox {
            margin-top: 5px;
        }

        .container form .row .col .inputBox img {
            height: 34px;
            margin-top: 5px;
            filter: drop-shadow(0 0 1px #000);
        }

        .container form .submit-btn {
            width: 100%;
            padding: 12px;
            font-size: 17px;
            background: #09213B;
            color: #fff;
            margin-top: 5px;
            cursor: pointer;
        }

        .container form .submit-btn:hover {
            background: #FD8234;
            border-radius: 2rem;
        }

        .inputBox {
            margin-bottom: 20px;
        }

        .error-message {
            color: #09213B;
            font-weight: 400;
            font-size: medium;
        }
    </style>

</head>

<body>

    <div class="container">

        <form id="paymentForm" action="invoice.php" method="post">


            <div style="margin: 1rem; padding:1rem; display:flex; justify-content:center;">
                <img src="logo2.JPG" style="width: 5rem; border-radius:2.5rem;">
                <p style="color: #031e3a; font-weight:600; padding-left:1rem; padding-top:1rem;">
                    <span class="logo-text" style="color: #FD8234; font-weight: 550; padding-left: 0.10rem;">
                        Dreamland:
                    </span>
                    <br>
                    Journey Beyond Imagination.
                </p>
                <hr style="width: 1rem; ">
            </div>


            <div class="row">

                <div class="col">

                    <h3 class="title">Tour package details</h3>

                    <div class="inputBox">
                        <span>Name:</span>
                        <input readonly value="<?php echo $Data['name']; ?>" type="text" pattern="[a-zA-Z\s]+" placeholder="Enter your name" id="name" name="name" required>
                    </div>

                    <div class="inputBox">
                        <span>Email:</span>
                        <input readonly value="<?php echo $Data['email']; ?>" type="email" placeholder="Abc@gmail.com" id="email" name="email" required>
                    </div>

                    <div class="inputBox">
                        <span>Phone:</span>
                        <input readonly value="<?php echo $Data['phone']; ?>" type="tel" pattern="[0-9]{10}" inputmode="numeric" minlength="10" maxlength="10" placeholder="Enter phone number" id="phone" name="phone" required>
                        <span class="error-message" style="color: #09213B; font-weight: 400; font-size: medium;"></span>
                    </div>

                    <div class="inputBox">
                        <span>Address:</span>
                        <input readonly value="<?php echo $Data['address']; ?>" type="text" placeholder="enter your address" id="address" name="address" required>
                    </div>


                    <div class="inputBox">
                        <span>Where to:</span>
                        <input readonly value="<?php echo $Data['location']; ?>" type="text" placeholder="Place wants to visit." id="location" name="location" required readonly>
                        <span id="locationMessage" style="color: #09213B; font-weight: 400; font-size: medium;"></span>

                    </div>

                    <div class="inputBox">
                        <span>Price:</span>
                        <input readonly value="<?php echo $Data['price']; ?>" type="number" placeholder="Total price per person for one day." id="price" name="price" required readonly>
                        <span id="priceMessage" style="color: #09213B; font-weight: 400; font-size: medium;"></span>
                    </div>

                    <div class="inputBox">
                        <span>How many:</span>
                        <input readonly value="<?php echo $Data['guests']; ?>" type="number" min="1" placeholder="Number of tourists" id="guests" name="guests" required>
                    </div>


                    <div class="inputBox">
                        <span>Total night:</span>
                        <input readonly value="<?php echo $Data['night']; ?>" type="number" min="1" placeholder="Day wants to stay" id="night" name="night" required>
                    </div>


                    <div class="inputBox">
                        <span>Total Bills:</span>
                        <input readonly value="<?php echo $Data['total']; ?>" type="number" min="1" placeholder="Total bill" id="total" name="total">
                    </div>

                    <div class="inputBox">
                        <span>Arrivals:</span>
                        <input readonly value="<?php echo $Data['arrivals']; ?>" type="date" name="arrivals" required onchange="updateLeavingMin()">
                        <input readonly value="<?php echo $Data['arrivals']; ?>" type="hidden" id="arrivals-date" name="arrivals_date" value="">
                    </div>

                    <!-- Leaving input -->
                    <div class="inputBox">
                        <span>Leaving:</span>
                        <input readonly value="<?php echo $Data['leaving']; ?>" type="date" id="leaving-date" name="leaving" min="" required>
                    </div>



                </div>


                <!-- written stop -->

                <div class="col" style="border: 0.10rem solid  #09213B;  padding:1rem;">

                    <h3 class="title">payment</h3>

                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="https://wpassets.adda247.com/wp-content/uploads/multisite/sites/5/2022/11/24190220/article-2142975-0EF9ACF900000578-920_1024x615_large.jpg" alt="">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span>
                        <input type="hidden" name="id" value="<?php echo $Data['id'] ?>">
                        <input type="text" placeholder="card holder name" id="nameOnCard" name="nameOnCard" oninput="validateName(this)">
                        <div id="nameErrorMessage" style="color: #09213B; font-weight:400; font-size:medium; display: none;">Numbers and symbols are not allowed!</div>
                    </div>

                    <script>
                        function validateName(input) {
                            var value = input.value;
                            var cleanValue = value.replace(/[^a-zA-Z\s]/g, ''); // Allow only alphabets and spaces
                            if (value !== cleanValue) {
                                document.getElementById("nameErrorMessage").style.display = "block";
                                input.value = cleanValue;
                            } else {
                                document.getElementById("nameErrorMessage").style.display = "none";
                            }
                        }
                    </script>


                    <div class="inputBox">
                        <span>Credit card number :</span>
                        <input type="text" placeholder="1111-2222-3333-4444" id="cardNumber" name="cardNumber" minlength="16" oninput="validateCard()">
                        <div class="error-message" id="errorMessage"></div>
                    </div>

                    <script>
                        var errorMessage = document.getElementById("errorMessage");

                        function validateCard() {
                            var cardInput = document.getElementById("cardNumber");
                            var cardNumber = cardInput.value.replace(/[^\d]/g, ''); // Remove non-digit characters

                            // Remove non-digit characters immediately
                            cardInput.value = cardNumber;

                            // Check if input length is less than 16
                            if (cardNumber.length < 16) {
                                errorMessage.textContent = "Your card number must be 16 digits.";
                            } else if (cardNumber.length > 16) {
                                // Check if input length is more than 16
                                cardInput.value = cardInput.value.slice(0, 16); // Truncate input to 16 digits
                                errorMessage.textContent = "Only 16 digits allowed.";
                            } else {
                                // Clear error message if input is valid
                                errorMessage.textContent = "";

                                // Format the card number with spaces after every 4 digits
                                // var formattedCardNumber = '';
                                // for (var i = 0; i < cardNumber.length; i++) {
                                //     if (i > 0 && i % 4 === 0) {
                                //         formattedCardNumber += '-';
                                //     }
                                //     formattedCardNumber += cardNumber[i];
                                // }

                                // Update input value with formatted card number
                                cardInput.value = formattedCardNumber;
                            }
                        }
                    </script>


                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" id="expMonthInput" placeholder="Select Month" readonly>
                        <select name="expMonth" id="expMonthSelect">
                            <option value="">Select Month</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="text" id="expYearInput" placeholder="Select Year" readonly>
                            <select name="expYear" id="expYearSelect">
                                <option value="">Select Year</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                            </select>
                            <div id="expYearError" class="error-message" style="display: none;">Enter valid month or your card has expired</div>
                        </div>

                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" placeholder="123" id="cvv" name="cvv">
                            <div id="cvvError" class="error-message" style="display: none;">Only numeric values are allowed in CVV, and maximum length is 3</div>
                        </div>
                    </div>

                    <script>
                        document.getElementById("expMonthSelect").addEventListener("change", function() {
                            var selectedOption = this.options[this.selectedIndex];
                            document.getElementById("expMonthInput").value = selectedOption.text;
                            validateExpiration();
                        });

                        document.getElementById("expYearSelect").addEventListener("change", function() {
                            var selectedOption = this.options[this.selectedIndex];
                            document.getElementById("expYearInput").value = selectedOption.text;
                            validateExpiration();
                        });

                        document.getElementById("cvv").addEventListener("input", function() {
                            var cvvInput = this.value;
                            var cvvError = document.getElementById("cvvError");

                            if (!/^\d+$/.test(cvvInput) || cvvInput.length > 3) {
                                cvvError.style.display = "block";
                                this.value = cvvInput.slice(0, -1); // Remove the last character
                            } else {
                                cvvError.style.display = "none";
                            }
                        });

                        function validateExpiration() {
                            var today = new Date();
                            var currentMonth = today.getMonth() + 1; // Months are zero-based
                            var currentYear = today.getFullYear();
                            var selectedMonth = parseInt(document.getElementById("expMonthSelect").value);
                            var selectedYear = parseInt(document.getElementById("expYearSelect").value);
                            var expYearError = document.getElementById("expYearError");

                            if (selectedYear < currentYear || (selectedYear === currentYear && selectedMonth < currentMonth)) {
                                expYearError.style.display = "block";
                            } else {
                                expYearError.style.display = "none";
                            }
                        }
                    </script>

                    <div class="inputBox">
                        <span>payer email :</span>
                        <input type="email" placeholder="example@example.com" id="payerEmail" name="payerEmail">
                    </div>
                    <div class="inputBox">
                        <span>payer address :</span>
                        <input type="text" placeholder="room - street - locality" id="payerAddress" name="payerAddress">
                    </div>


                    <div class="inputBox">
                        <span>payer city :</span>
                        <input type="text" placeholder="present living city" id="payerCity" name="payerCity">
                        <div id="cityError" class="error-message" style="display: none;">City name cannot contain numbers or symbols</div>
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>payer state :</span>
                            <input type="text" placeholder="present living state" id="payerState" name="payerState">
                            <div id="stateError" class="error-message" style="display: none;">State name cannot contain numbers or symbols</div>
                        </div>

                        <div class="inputBox">
                            <span>payer Pin code :</span>
                            <input type="text" placeholder="123 456" id="payerZipCode" name="payerZipCode">
                            <div id="zipCodeError" class="error-message" style="display: none;">Enter a valid pin code (maximum 6 digits)</div>
                        </div>
                    </div>

                    <script>
                        document.getElementById("payerCity").addEventListener("input", function() {
                            var cityInput = this.value;
                            var cityError = document.getElementById("cityError");

                            if (/[\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(cityInput)) {
                                cityError.style.display = "block";
                                this.value = cityInput.replace(/[\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '');
                            } else {
                                cityError.style.display = "none";
                            }
                        });

                        document.getElementById("payerState").addEventListener("input", function() {
                            var stateInput = this.value;
                            var stateError = document.getElementById("stateError");

                            if (/[\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(stateInput)) {
                                stateError.style.display = "block";
                                this.value = stateInput.replace(/[\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g, '');
                            } else {
                                stateError.style.display = "none";
                            }
                        });

                        document.getElementById("payerZipCode").addEventListener("input", function() {
                            var zipCodeInput = this.value;
                            var zipCodeError = document.getElementById("zipCodeError");

                            if (!/^\d{0,6}$/.test(zipCodeInput)) {
                                zipCodeError.style.display = "block";
                                this.value = zipCodeInput.slice(0, 6); // Restrict to 6 digits
                            } else {
                                zipCodeError.style.display = "none";
                            }
                        });
                    </script>

                </div>

            </div>

            <input type="submit" value="proceed to checkout" class="submit-btn">

        </form>

    </div>


</body>




</html>