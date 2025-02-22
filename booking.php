<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- font awesome sdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- css file link -->
    <link rel="stylesheet" href="travel.css">

    <!-- swiper link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <!-- css font link -->

    <style>
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

    <!-- header section start -->
    <header>


        <nav class="navbar">
            <div class="navbar-container">
                <div class="main-logo">
                    <a href="home.php" class="logo">
                        <img src="logo2.JPG">
                    </a>
                    <p class="logo-text">
                        <span class="logo-text" style="color: #FD8234; font-weight: 550; padding-left: 0.10rem;">
                            Dreamland:
                        </span>
                        <br>
                        Journey Beyond Imagination.
                    </p>
                </div>

                <button class="navbar-menu-btn">
                    <span class="navbar-menu-btn__burger"></span>
                </button>
                <ul class="nav navbar-menu">

                    <li class="nav-item">
                        <a href="Home.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="package.php" class="nav-link">Package</a>
                    </li>
                    <li class="nav-item">
                        <a href="booking.php" class="nav-link">Booking</a>
                    </li>
                </ul>
            </div>
        </nav>



    </header>

    <!-- header section end -->


    <div class="heading" style="background: url('main-image/image-05.jpg') no-repeat;">

        <h1>Book now</h1>

    </div>


    <!-- booking section start , page 4  -->

    <section class="booking">
        <h1 class="heading-title">Book your Dream Tour</h1>

        <form action="book_form.php" method="post" class="book-form">

            <div class="flex">

                <div class="inputBox">
                    <span>Name:</span>
                    <input type="text" placeholder="Enter your name" id="nameInput" name="name">
                    <div id="nameError" class="error-message" style="display: none;">Name can only contain alphabetic characters and spaces</div>
                </div>

                <script>
                    document.getElementById("nameInput").addEventListener("input", function() {
                        var nameInput = this.value;
                        var nameError = document.getElementById("nameError");

                        if (!/^[a-zA-Z\s]*$/.test(nameInput)) {
                            nameError.style.display = "block";
                            this.value = nameInput.replace(/[^a-zA-Z\s]/g, '');
                        } else {
                            nameError.style.display = "none";
                        }
                    });
                </script>

                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" placeholder="Abc@gmail.com" name="email" required>
                </div>

                <div class="inputBox">
                    <span>Phone:</span>
                    <input type="tel" pattern="[0-9]{10}" inputmode="numeric" minlength="10" maxlength="10" placeholder="Enter phone number" id="phoneInput" name="phone" required>
                    <span id="phoneError" class="error-message" style="display: none;">Please enter a valid 10-digit phone number</span>
                </div>

                <script>
                    var phoneInput = document.getElementById("phoneInput");
                    var phoneError = document.getElementById("phoneError");

                    phoneInput.addEventListener("input", function() {
                        var sanitizedValue = this.value.replace(/[^\d]/g, ''); // Remove non-numeric characters
                        this.value = sanitizedValue; // Update the input value

                        if (phoneInput.validity.patternMismatch || sanitizedValue.length !== 10) {
                            phoneError.style.display = "block";
                        } else {
                            phoneError.style.display = "none";
                        }
                    });

                    phoneInput.addEventListener("invalid", function() {
                        phoneError.style.display = "block";
                    });
                </script>



                <!-- part end -->


                <div class="inputBox">
                    <span>Address:</span>
                    <input type="text" placeholder="enter your address" name="address" required>
                </div>


                <div class="inputBox">
                    <span>Where to:</span>
                    <input type="text" placeholder="Place wants to visit." id="location" name="location" required readonly>
                    <span id="locationMessage" style="color:   #09213B; font-weight:400; font-size:medium; "></span>

                </div>

                <div class="inputBox">
                    <span>Price:</span>
                    <input type="number" placeholder="Total price per person for one day." id="price" name="price" required readonly>
                    <span id="priceMessage" style="color:   #09213B; font-weight:400; font-size:medium; "></span>
                </div>

                <!-- auto prize setner for location and prize  -->

                <script>
                    // Function to get query parameter by name
                    function getQueryParam(name) {
                        const urlParams = new URLSearchParams(window.location.search);
                        return urlParams.get(name);
                    }

                    // Set the value of the 'location' input box on page load
                    document.addEventListener('DOMContentLoaded', function() {
                        const locationValue = getQueryParam('location');
                        if (locationValue) {
                            document.getElementById('location').value = locationValue;
                            document.getElementById('locationMessage').innerText = ""; // Clear initial message if value is set
                        }
                    });

                    // Set the value of the 'price' input box on page load
                    document.addEventListener('DOMContentLoaded', function() {
                        const priceValue = getQueryParam('price');
                        if (priceValue) {
                            document.getElementById('price').value = priceValue;
                            document.getElementById('priceMessage').innerText = ""; // Clear initial message if value is set
                        }
                    });

                    // Show message if user clicks on the location box
                    document.getElementById('location').addEventListener('focus', function() {
                        if (!getQueryParam('location')) {
                            document.getElementById('locationMessage').innerText = "Please select the tour place from the tour package.";
                        } else {
                            document.getElementById('locationMessage').innerText = "You are not allowed to modify this field.";
                        }
                    });

                    // Show message if user clicks on the price box
                    document.getElementById('price').addEventListener('focus', function() {
                        if (!getQueryParam('price')) {
                            document.getElementById('priceMessage').innerText = "Please select the tour place from the tour package.";
                        } else {
                            document.getElementById('priceMessage').innerText = "You are not allowed to modify this field.";
                        }
                    });
                </script>


                <!-- auto prize setner for location and prize  -->

                <div class="inputBox">
                    <span>How many:</span>
                    <input type="number" min="1" placeholder="Number of tourists" id="guests" name="guests" required>
                </div>


                <div class="inputBox">
                    <span>Total night:</span>
                    <input type="number" min="1" placeholder="Day wants to stay" id="night" name="night" required>
                </div>


                <!-- calculater  -->
                <button onclick="calculate()" class="btn">calculate</button>

                <script>
                    function calculate() {
                        var field1 = document.getElementById("price").value;
                        var field2 = document.getElementById("guests").value;
                        var field3 = document.getElementById("night").value;

                        var result = parseFloat(field1) * parseFloat(field2) * parseFloat(field3);

                        if (!isNaN(result)) {
                            document.getElementById("total").value = result;
                        }
                    }
                </script>
                <!-- calculater -->

                <div class="inputBox">
                    <span>Total Bills:</span>
                    <input type="number" min="1" placeholder="Total bill" id="total" name="total" readonly>
                </div>

                <div class="inputBox">
                    <span>Arrivals:</span>
                    <input type="date" name="arrivals" min="<?php echo date('Y-m-d'); ?>" required onchange="updateLeavingMin()">
                    <input type="hidden" id="arrivals-date" name="arrivals_date" value="">
                </div>

                <!-- Leaving input -->
                <div class="inputBox">
                    <span>Leaving:</span>
                    <input type="date" id="leaving-date" name="leaving" min="" required>
                </div>

                <div class="inputBox">
                    <span>Payment type:</span>
                    <select id="payment" name="payment" style="width: 200px; padding: 8px; border:0.10rem solid #09213B;" required>
                        <option value="">Select payment option</option>
                        <option value="online">Online</option>
                        <!-- <option value="cash">Cash</option> -->
                        <option value="Inquire">Inquire</option>
                    </select>
                </div>


                <input type="submit" value="Submit" class="btn" name="send" onclick="showAlert()">
                <br>

                <!-- term and condition -->
                <div style="width:100%; padding:1.2rem 1.4rem; color:#031e3a; font-size:1.6rem; margin-top:1rem; font-weight:550;">
                    <input type="checkbox" id="agree-checkbox" name="agree-checkbox" required />
                    <label for="agree-checkbox">I have read and agree to the terms and conditions</label>
                </div>

                <div>
                    <p><a href="terms.php" style="width: 100%; padding: 1.2rem 1.4rem; color: #031e3a; font-size: 1.6rem; margin-top: 1rem; font-weight: 550; text-decoration: none;" onmouseover="this.style.color= '#FD8234'" onmouseout="this.style.color='#031e3a'">

                            To read terms and conditions click here </a></p>
                </div>





                <!-- pop/alert message -->

                <script>
                    function showAlert() {
                        var form = document.getElementById("book_form");
                        var agreeCheckbox = document.getElementById("agree-checkbox");
                        if (agreeCheckbox.checked) {
                            alert("Your data submitted successfully!");
                        } else {
                            alert("Please agree to the terms and conditions.");
                        }
                    }
                </script>




            </div>

        </form>
    </section>

    <!-- paremiters for arrivals and leving , after this permeters user not select past dates -->
    <script>
        function updateLeavingMin() {
            const arrivalsDate = document.querySelector('input[name="arrivals"]').value;
            const leavingDate = document.querySelector('#leaving-date');
            leavingDate.setAttribute('min', new Date(new Date(arrivalsDate) + 10 * 24 * 60 * 60 * 1000).toISOString().split('T')[0]);
            document.querySelector('#arrivals-date').value = arrivalsDate;
        }
        document.querySelector('input[name="arrivals"]').addEventListener('change', updateLeavingMin);
    </script>



    <!-- booking section end , page 4 -->

    <!-- footer section stsrt -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="home.php"><i class=" fas fa-angle-right"></i>home</a>
                <a href="about.php"><i class="fas fa-angle-right"></i>About</a>
                <a href="package.php"><i class="fas fa-angle-right"></i>Package</a>
                <a href="booking.php"><i class="fas fa-angle-right"></i>Booking</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="https://t.me/+S9nb8gvcfXY1MDI9"><i class="fas fa-angle-right"></i>ask questions</a>
                <a href="about.php"><i class="fas fa-angle-right"></i>about us</a>
                <a href="terms.php"><i class="fas fa-angle-right"></i>Terns and conditions</a>
                <a href="staff.php"><i class="fas fa-angle-right"></i>Staff details</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fas fa-phone"></i>+91 7878 85 6900</a>
                <a href="#"><i class="fas fa-phone"></i>+91 8128 68 1683</a>
                <a href="#"><i class="fas fa-phone"></i>+91 8155 88 8063</a>
                <a href="#"><i class="fas fa-envelope"></i>djasfirst@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i> surat , gujarat , india - 394101</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="https://www.facebook.com/profile.php?id=100083844196716"><i class="fab fa-facebook-f"></i>Facebook</a>
                <a href="https://t.me/+S9nb8gvcfXY1MDI9"><i class="fab fa-telegram"></i>Telegram</a>
                <a href="https://www.instagram.com/dreamlandmunnar?igsh=MWd1Z2phMGVqNWU0cQ=="><i class="fab fa-instagram"></i>instagram</a>

            </div>

        </div>

        <div class="credit">
            <marquee>Visit again</marquee>
            <br>
            Created by :- <span>Dev jasani , Urvish Koshiya , Dhvanil Bhigradiya</span> <br>|Further inquiries, contact us at the number|

        </div>

    </section>

    <!-- footer section end -->


    <!-- swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- js file  -->
    <script src="travel.js"></script>


</body>

</html>