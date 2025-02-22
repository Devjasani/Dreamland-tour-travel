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

$admin = "SELECT * FROM staff_data WHERE Staff_Type = 1 ORDER BY Staff_Id asc";
$result_admin = $conn->query($admin);

if ($result_admin->num_rows > 0) {
    $i = 0;
    while ($row = $result_admin->fetch_assoc()) {
        $Data_admin[$i]['Staff_Id'] = $row['Staff_Id'];
        $Data_admin[$i]['Name'] = $row['Name'];
        $Data_admin[$i]['Post'] = $row['Post'];
        $Data_admin[$i]['Staff_Img'] = $row['Staff_Img'];
        $Data_admin[$i]['Description'] = $row['Description'];
        $Data_admin[$i]['Instagram'] = $row['Instagram'];
        $Data_admin[$i]['Facebook'] = $row['Facebook'];
        $Data_admin[$i]['Whatsapp'] = $row['Whatsapp'];
        $Data_admin[$i]['Telegram'] = $row['Telegram'];
        $Data_admin[$i]['Staff_Type'] = $row['Staff_Type'];
        $i++;
    }
} else {
    echo "No records found";
}

$guide = "SELECT * FROM staff_data WHERE Staff_Type = 0 ORDER BY Staff_Id asc";
$result_guide = $conn->query($guide);

if ($result_guide->num_rows > 0) {
    $i = 0;
    while ($row = $result_guide->fetch_assoc()) {
        $Data_guide[$i]['Staff_Id'] = $row['Staff_Id'];
        $Data_guide[$i]['Name'] = $row['Name'];
        $Data_guide[$i]['Post'] = $row['Post'];
        $Data_guide[$i]['Staff_Img'] = $row['Staff_Img'];
        $Data_guide[$i]['Description'] = $row['Description'];
        $Data_guide[$i]['Instagram'] = $row['Instagram'];
        $Data_guide[$i]['Facebook'] = $row['Facebook'];
        $Data_guide[$i]['Whatsapp'] = $row['Whatsapp'];
        $Data_guide[$i]['Telegram'] = $row['Telegram'];
        $Data_guide[$i]['Staff_Type'] = $row['Staff_Type'];
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
    <title>Document</title>

    <!-- font awesome sdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- css file link -->
    <link rel="stylesheet" href="travel.css">



    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }


        .team-member-info {
            display: flex;
            align-items: center;
        }

        .team-member-image {
            border-radius: 50%;
            height: 150px;
            margin-right: 20px;
            width: 150px;
        }

        .text-info {
            flex: 1;
            /* This allows the text info to expand and take up the remaining space */
            text-align: left;
            /* Align the text to the left */
        }

        .team-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
            padding-left: 10rem;
            padding-right: 10rem;
        }

        .team-member {
            background-color: #f2f2f2;
            border: solid #FD8234 0.08rem;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex-basis: calc(50% - 8px);
            margin-bottom: 20px;
            padding: 20px;
            text-align: center;
        }

        .team-member img {
            border-radius: 50%;
            height: 150px;
            margin-bottom: 20px;
            width: 150px;

        }

        .team-member h2 {
            color: #FD8234;
            font-size: 24px;
            margin-top: 0;
        }

        .team-member p {
            color: #031e3a;
            font-size: 16px;
            margin-bottom: 1rem;
        }

        .link {
            margin: 0.10rem;
        }

        @media (max-width: 768px) {
            .team-member {
                flex-basis: calc(50% - 20px);
            }

        }

        @media (max-width: 480px) {
            .team-member {
                flex-basis: 100%;
            }

            .team-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                padding: 20px;
            }

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


    <div class="heading" style="background: url('main-image/image-004.jpg') no-repeat; background-size:cover; object-fit: cover;">

        <h1 style="font-size: 5rem; color:#FD8234; padding-top:10rem;"> Staff detalis & Tour Guide </h1>

    </div>



    <center>
        <h1 style="color: #FD8234; font-weight: 700; padding-top:1rem;">Admin Staff</h1>
        <hr style="width: 10rem; color:  #031e3a;">
        <h3 style="color:#031e3a; font-weight: 700;">Here is our admin staff who built this company and website.</h3>
    </center>

    <div class="team-container">

        <?php if (!empty($Data_admin)) {
            foreach ($Data_admin as $key => $value) { ?>
                <div class="team-member">
                    <div class="team-member-info">
                        <img src="staff-image/<?php echo $value['Staff_Img']; ?>" alt="image" class="team-member-image" style="object-fit: cover;">
                        <div class="text-info">
                            <h2><?php echo $value['Name']; ?></h2>
                            <p><b><?php echo $value['Post']; ?></b></p>
                            <p><?php echo $value['Description']; ?></p>
                            <a href="<?php echo $value['Instagram']; ?>" class="link"><img src="staff-image/insta.png" style="width: 3rem; height:3rem; "></a>
                            <a href="<?php echo $value['Facebook']; ?>" class="link"> <img src="staff-image/face.png" style="width: 3rem; height:3rem;"></a>
                            <a href="<?php echo $value['Whatsapp']; ?>" class="link"><img src="staff-image/whatsep.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                            <a href="<?php echo $value['Telegram']; ?>" class="link"> <img src="staff-image/teli.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>

        <!-- 
        <div class="team-member">
            <div class="team-member-info">
                <img src="staff-image/urvish.jpg" alt="image" class="team-member-image" style="object-fit: cover;">
                <div class="text-info">
                    <h2>Urvish Koshiya</h2>
                    <p><b>Managing Director</b></p>
                    <p>Urvish oversees on-field operations at Dreamland Travels, managing tours and staff, ensuring site productivity.</p>
                    <a href="#" class="link"><img src="staff-image/insta.png" style="width: 3rem; height:3rem; "></a>
                    <a href="#" class="link"> <img src="staff-image/face.png" style="width: 3rem; height:3rem;"></a>
                    <a href="#" class="link"><img src="staff-image/whatsep.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                    <a href="#" class="link"> <img src="staff-image/teli.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                </div>
            </div>
        </div>

        <div class="team-member">
            <div class="team-member-info">
                <img src="staff-image/bhindi.jpg" alt="image" class="team-member-image" style="object-fit: cover;">
                <div class="text-info">
                    <h2>Dhvnil Bhigradiya</h2>
                    <p><b>Managing Director</b></p>
                    <p>Dhvnil handles technical duties, including assisting booked tourists, managing data, and updating the website with trending content.</p>
                    <a href="#" class="link"><img src="staff-image/insta.png" style="width: 3rem; height:3rem; "></a>
                    <a href="#" class="link"> <img src="staff-image/face.png" style="width: 3rem; height:3rem;"></a>
                    <a href="#" class="link"><img src="staff-image/whatsep.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                    <a href="#" class="link"> <img src="staff-image/teli.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                </div>
            </div>
        </div> -->

    </div>

    <center>
        <p style="color: #031e3a;">----------------------------------------------</p>
    </center>



    <center>
        <h1 style="color: #FD8234; font-weight: 700; padding-top:1rem;">Guide Staff</h1>
        <hr style="width: 10rem; color:  #031e3a;">
        <h3 style="color:#031e3a; font-weight: 700;">"Guide staff provide assistance for booking the entire facility, from arrival to departure, via call or WhatsApp."</h3>
    </center>

    <div class="team-container">
        <?php if (!empty($Data_guide)) {
            foreach ($Data_guide as $key => $value) { ?>
                <div class="team-member">
                    <div class="team-member-info">
                        <img src="staff-image/<?php echo $value['Staff_Img']; ?>" alt="image" class="team-member-image" style="object-fit: cover;">
                        <div class="text-info">
                            <h2><?php echo $value['Name']; ?></h2>
                            <p><b><?php echo $value['Post']; ?></b></p>
                            <p><?php echo $value['Description']; ?></p>
                            <a href="<?php echo $value['Instagram']; ?>" class="link"><img src="staff-image/insta.png" style="width: 3rem; height:3rem; "></a>
                            <a href="<?php echo $value['Facebook']; ?>" class="link"> <img src="staff-image/face.png" style="width: 3rem; height:3rem;"></a>
                            <a href="<?php echo $value['Whatsapp']; ?>" class="link"><img src="staff-image/whatsep.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                            <a href="<?php echo $value['Telegram']; ?>" class="link"> <img src="staff-image/teli.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
    <!-- <div class="team-container">


        <div class="team-member">
            <div class="team-member-info">
                <img src="staff-image/img1.jpg" alt="image" class="team-member-image" style="object-fit: cover;">
                <div class="text-info">
                    <h2>Alan Ritchson</h2>
                    <p><b>tour assistant</b></p>
                    <p>
                        The tour guide offers package and booking details. After booking, a personal guide aids you from arrival to departure.</p>
                    <a href="#" class="link"><img src="staff-image/insta.png" style="width: 3rem; height:3rem; "></a>
                    <a href="#" class="link"> <img src="staff-image/face.png" style="width: 3rem; height:3rem;"></a>
                    <a href="#" class="link"><img src="staff-image/whatsep.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                    <a href="#" class="link"> <img src="staff-image/teli.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                </div>
            </div>
        </div>


        <div class="team-member">
            <div class="team-member-info">
                <img src="staff-image/img2.jpg" alt="image" class="team-member-image" style="object-fit: cover;">
                <div class="text-info">
                    <h2>Michelle Rodriguez</h2>
                    <p><b>tour assistant</b></p>
                    <p>The tour guide offers package and booking details. After booking, a personal guide aids you from arrival to departure.</p>
                    <a href="#" class="link"><img src="staff-image/insta.png" style="width: 3rem; height:3rem; "></a>
                    <a href="#" class="link"> <img src="staff-image/face.png" style="width: 3rem; height:3rem;"></a>
                    <a href="#" class="link"><img src="staff-image/whatsep.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                    <a href="#" class="link"> <img src="staff-image/teli.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                </div>
            </div>
        </div>

        <div class="team-member">
            <div class="team-member-info">
                <img src="staff-image/img3.jpg" alt="image" class="team-member-image" style="object-fit: cover;">
                <div class="text-info">
                    <h2>Charlize Theron</h2>
                    <p><b>tour assistant</b></p>
                    <p>The tour guide offers package and booking details. After booking, a personal guide aids you from arrival to departure.</p>
                    <a href="#" class="link"><img src="staff-image/insta.png" style="width: 3rem; height:3rem; "></a>
                    <a href="#" class="link"> <img src="staff-image/face.png" style="width: 3rem; height:3rem;"></a>
                    <a href="#" class="link"><img src="staff-image/whatsep.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                    <a href="#" class="link"> <img src="staff-image/teli.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                </div>
            </div>
        </div>

        <div class="team-member">
            <div class="team-member-info">
                <img src="staff-image/img4.jpg" alt="image" class="team-member-image" style="object-fit: cover;">
                <div class="text-info">
                    <h2>Tyrese Gibson</h2>
                    <p><b>tour assistant</b></p>
                    <p>The tour guide offers package and booking details. After booking, a personal guide aids you from arrival to departure.</p>
                    <a href="#" class="link"><img src="staff-image/insta.png" style="width: 3rem; height:3rem; "></a>
                    <a href="#" class="link"> <img src="staff-image/face.png" style="width: 3rem; height:3rem;"></a>
                    <a href="#" class="link"><img src="staff-image/whatsep.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                    <a href="#" class="link"> <img src="staff-image/teli.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                </div>
            </div>
        </div>


        <div class="team-member">
            <div class="team-member-info">
                <img src="staff-image/img5.jpg" alt="image" class="team-member-image" style="object-fit: cover;">
                <div class="text-info">
                    <h2>Jordana Brewster</h2>
                    <p><b>tour assistant</b></p>
                    <p>The tour guide offers package and booking details. After booking, a personal guide aids you from arrival to departure.</p>
                    <a href="#" class="link"><img src="staff-image/insta.png" style="width: 3rem; height:3rem; "></a>
                    <a href="#" class="link"> <img src="staff-image/face.png" style="width: 3rem; height:3rem;"></a>
                    <a href="#" class="link"><img src="staff-image/whatsep.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                    <a href="#" class="link"> <img src="staff-image/teli.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                </div>
            </div>
        </div>

        <div class="team-member">
            <div class="team-member-info">
                <img src="staff-image/img6.jpg" alt="image" class="team-member-image" style="object-fit: cover;">
                <div class="text-info">
                    <h2>Meadow Rain Walker</h2>
                    <p><b>tour assistant</b></p>
                    <p>The tour guide offers package and booking details. After booking, a personal guide aids you from arrival to departure.</p>
                    <a href="#" class="link"><img src="staff-image/insta.png" style="width: 3rem; height:3rem;"></a>
                    <a href="#" class="link"><img src="staff-image/face.png" style="width: 3rem; height:3rem;"></a>
                    <a href="#" class="link"><img src="staff-image/whatsep.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                    <a href="#" class="link"><img src="staff-image/teli.png" style="width: 3rem; height:3rem; border-radius: 30%;"></a>
                </div>
            </div>
        </div>






    </div> -->

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

</body>

<!-- js file  -->
<script src="travel.js"></script>

</html>