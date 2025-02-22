<?php

$connection = mysqli_connect('localhost', 'root', '', 'booking_dp');

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $guests = $_POST['guests'];
    $night = $_POST['night'];
    $total = $_POST['total'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $payment = $_POST['payment'];

    $request = " insert into book_form(name, email, phone, address, location, price, guests, night, total, arrivals, leaving, payment) values
('$name','$email','$phone','$address','$location','$price','$guests','$night','$total','$arrivals','$leaving','$payment')";

    mysqli_query($connection, $request);

    if ($_POST['payment'] == "online") 
    {
        $last_inserted_id = mysqli_insert_id($connection);
        $id= base64_encode($last_inserted_id);
       header('location:payment.php?id='.$id.'');
    }
    else{
        
    header('location:booking.php');
    }
} else {
    echo 'something went wrong try again';
}
