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

// SQL query to fetch data
$sql = "SELECT * FROM package ORDER BY Rating DESC LIMIT 3";
$result = $conn->query($sql);

// Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Fetch each row and store data in arrays
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $Data[$i]['Id'] = $row['Id'];
        $Data[$i]['Package_Name'] = $row['Package_Name'];
        $Data[$i]['Package_Description'] = $row['Package_Description'];
        $Data[$i]['Img_Url'] = $row['Img_Url'];
        $Data[$i]['Youtu_Url'] = $row['Youtu_Url'];
        $Data[$i]['Discount_Price'] = $row['Discount_Price'];
        $Data[$i]['Price'] = $row['Price'];
        $Data[$i]['Rating'] = $row['Rating'];
        $Data[$i]['Hotel_Name'] = $row['Hotel_Name'];
        $Data[$i]['Food'] = $row['Food'];
        $i++;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- font awesome sdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- css file link -->
    <link rel="stylesheet" href="travel.css">

    <!-- swiper link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />



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


    <div>
        <!-- home section starts -->

        <section class="home">

            <div class=" swiper home-slider">

                <div class="swiper-wrapper">



                    <div class=" swiper-slide slide" style="background:url('slider-img/img5.png') no-repeat">
                        <div class="content">
                            <span>Turn your dreams into reality with & <br> nature's pieces.</span>
                            <h3>travl with joy</h3>
                            <a href="package.php" class="btn">Explore more</a>
                        </div>
                    </div>


                    <div class=" swiper-slide slide" style="background:url('slider-img/img1.jpg') no-repeat">
                        <div class="content">
                            <span>Turn your dreams into reality with & <br> open swimming pool at ocean-touch hotels.</span>
                            <h3>travl with joy</h3>
                            <a href="package.php" class="btn">Explore more</a>
                        </div>
                    </div>

                    <div class=" swiper-slide slide" style="background:url('slider-img/img2.jpg') no-repeat">
                        <div class="content">
                            <span>Turn your dreams into reality with & <br> stunning beaches of Goa and Lakshadweep.</span>

                            <h3>travl with joy</h3>
                            <a href="package.php" class="btn">Explore more</a>
                        </div>
                    </div>

                    <div class=" swiper-slide slide" style="background:url('slider-img/img6.jpg') no-repeat">
                        <div class="content">
                            <span>Turn your dreams into reality,<br> & with Bournfire and a tent.</span>
                            <h3>travl with joy</h3>
                            <a href="package.php" class="btn">Explore more</a>
                        </div>
                    </div>


                    <div class=" swiper-slide slide" style="background:url('slider-img/img4.jpeg') no-repeat">
                        <div class="content">
                            <span>Turn your dreams into reality with & <br> the harsh and cold environment of the desert.</span>
                            <h3>travl with joy</h3>
                            <a href="package.php" class="btn">Explore more</a>
                        </div>
                    </div>

                    <div class=" swiper-slide slide" style="background:url('slider-img/img3.jpg') no-repeat">
                        <div class="content">
                            <span>Turn your dreams into reality with& <br> visiting waterfalls like Niagara.</span>
                            <h3>travl with joy</h3>
                            <a href="package.php" class="btn">Explore more</a>
                        </div>
                    </div>



                    <!-- button for slider -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>

                </div>

        </section>

        <!-- home section end -->
    </div>

    <!-- servise section start  -->

    <section class="services">

        <h1 class="heading-title">Our services</h1>

        <div class="box-container">

            <!-- why tour is nessacry in life -->
            <div class="box">

                <a href="adventure.php"><img src="logo-img/logo1.png" width="100rem" alt="icon"></a>
                <h3>Adventure</h3>
            </div>

            <!-- staff details -->
            <div class="box">
                <a href="staff.php"><img src="logo-img/logoe2.jpg" width="80rem" alt="icon"></a>
                <h3>staff details</h3>
            </div>



            <!-- hotel creteariya which we select & food (must mention no need to buy extrnal packages) -->
            <div class="box">
                <a href="facilities.php"> <img src="logo-img/logo4.gif" width="80rem" alt="icon"> </a>
                <h3>facilities</h3>
            </div>

            <!-- places which viited , along with tour -->
            <div class="box">
                <a href="terms.php"><img src="logo-img/terms.gif" width="100rem" alt="icon"></a>
                <h3>Terms and conditions</h3>
            </div>



        </div>

    </section>

    <!-- servise section end  -->

    <!-- home about section start -->

    <section class="home-about">

        <div class="image">
            <img src="about-us image/4.jpg" alt="image">
        </div>

        <div class="content">
            <h3>about us</h3>
            <p>Dreamland Tours & Travels - Crafting Dreams, Creating Memories!.
                6 years of excellence, 290+ enchanting tours, and 30,000+ satisfied smiles! From the beaches of Goa to the lights of Las Vegas.<br>
                Dive into the joy of our adventures - pocket-friendly packages awaiting your wanderlust.<br>
                Contact us now , and explore our "About" section for a visual feast of happy tours and glowing reviews.

            </p>
            <a href="about.php" class="btn">read more</a>
        </div>

    </section>

    <!-- home about section end  -->


    <!-- home pacages section starts -->

    <section class="home-packages">

        <h1 class="heading-title">Our top tranding packages</h1>

        <div class="box-container">

            <?php foreach ($Data as $key => $value) { ?>
                <div class="box">
                    <div class="image">
                        <img src="Tourisum/<?php echo $value['Img_Url']; ?>" alt="tour place">
                    </div>

                    <div class="content">
                        <h3><?php echo $value["Package_Name"]; ?></h3>
                        <p><?php echo $value["Package_Description"]; ?></p>
                        <a href='<?php echo $value["Youtu_Url"]; ?>'>
                            <p> <img style="width: 5rem;" src="player.png"> </p>
                        </a>



                        <!-- hide data -->
                        <div class="hide">

                            <h4 class="price">Price Per day & person:-</h4>
                            <h4 class="price"><?php echo $value["Discount_Price"]; ?>₹</h4>
                            <h5 class="price" style="text-decoration: line-through;"><?php echo $value["Price"]; ?>₹</h5>


                            <div class="stars">
                                <h4 class="price">Tour place rating:-
                                    <?php for ($x = 0; $x < $value["Rating"]; $x++) { ?>
                                        <i class="fas fa-star"></i>
                                    <?php } ?>
                                </h4>
                            </div>

                            <h4 class="price">Hotel name:- <?php echo $value["Hotel_Name"]; ?></h4>
                            <h4 class="price">Food :- <?php echo $value["Food"]; ?> </h4>
                            <h5 class="hotels">All dinner and food included</h5>


                        </div>
                        <!-- hide data end -->

                        <a href="#" class="btn view-more">View more</a>

                        <a href="booking.php?location=<?php echo urlencode($value['Package_Name']); ?>&price=<?php echo $value['Discount_Price']; ?>" class="btn">Book now</a>
                    </div>
                </div>

            <?php } ?>



        </div>

        <div class="load-more"><a href="package.php" class="btn">View more</a></div>

    </section>

    <!-- code for view more btn -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewMoreBtns = document.querySelectorAll('.view-more');

            viewMoreBtns.forEach(function(viewMoreBtn) {
                const hideDiv = viewMoreBtn.previousElementSibling; // Get the previous sibling, which is the hide div

                hideDiv.style.display = 'none'; // Initially hide the div

                viewMoreBtn.addEventListener('click', function(event) {
                    event.preventDefault();
                    if (hideDiv.style.display === 'none') {
                        hideDiv.style.display = 'block'; // Show the div when button is clicked
                        viewMoreBtn.textContent = 'Hide details'; // Change button text to indicate hiding
                    } else {
                        hideDiv.style.display = 'none'; // Hide the div when button is clicked again
                        viewMoreBtn.textContent = 'View more'; // Change button text to indicate showing
                    }
                });
            });
        });
    </script>




    <!-- home packages section end -->

    <!-- home offer section starts -->

    <section class="home-offer">

        <div class="content">
            <h3>Upto 50% off</h3>
            <p>"Take advantage of the festive season and set your tour plans at minimum fees, acquiring maximum enjoyment. So, why just look? Book our dream now! Hurry up!"</p>
            <a href="package.php" class="btn">Book now</a>
        </div>

    </section>


    <!-- home offer section end -->





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