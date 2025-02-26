<?php

ini_set('display_errors',0);

if($_POST['btn_start'])
{
   $To = $_POST['location'];
   $date = $_POST['date'];

}



if($_POST['btn_start2'])
{
   $To = $_POST['location'];
   $no_people = $_POST['no_people'];
   $date = $_POST['check_in'];
   $date2 = $_POST['check_out'];

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK TRIP | Fijoran Travels | Trusted Tour & Travel Agency for Flights, Visas, Hotels & Tours</title>
    <link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/book-a-trip.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
</head>

<body>

    <?php include('header.php')?>

    <main>
        <h3>Book A Trip</h3>
    </main>

    <section class="section-one d-flex flex-wrap">
        <div class="sec-one-left col-12 col-lg-7 col-md-6">
            <h2 class="fw-bold text-center">Book A Trip Now</h2>
            <p class="pt-4 text-center">Ready to explore the world? Book a trip to your dream country with Fijoran
                Travels and turn your travel dreams into reality. Whether it's a relaxing beach vacation, an exciting
                city adventure, or a cultural getaway or Educational purposes, we’re here to help you every step of the
                way. Let’s make your dream destination your next adventure!

                .</p>


            <div class="form">

                <?php if($msg=="success"){ ?>
                <div class="alert alert-success me-4">Message Sent</div>
                <?php } ?>

                <?php if($msg=="error"){ ?>
                <div class="alert alert-danger me-4"><?php echo $comment; ?></div>
                <?php } ?>

                <form action="proc-book-a-trip.php" method="post">

                    <div class="cont">
                        <label for="#">First Name</label><br>
                        <input type="text" name="f_name" value="<?php echo $firstname ?>">
                    </div>
                    <div class="cont">
                        <label for="#">Last Name</label><br>
                        <input type="text" name="l_name" value="<?php echo $lastname ?>">
                    </div>
                    <div class="cont">
                        <label for="#">Where</label><br>
                        <input type="text" name="where" value="<?php echo $where ?>">
                    </div>
                    <div class="cont">
                        <label for="#">To</label><br>
                        <input type="text" name="to" value="<?php echo $To ?>">
                    </div>
                    <div class="cont">
                        <label for="#">Email</label><br>
                        <input type="email" name="email" value="<?php echo $email ?>">
                    </div>
                    <div class="cont">
                        <label for="#">Phone Number</label><br>
                        <input type="number" name="phone_number" value="<?php echo $phonenumber ?>">
                    </div>
                    <div class="cont">
                        <label for="#">Check-in Date</label><br>
                        <input type="date" name="date" placeholder="$" value="<?php echo $date ?>">
                    </div>
                    <div class="cont">
                        <label for="#">Check-out Date</label><br>
                        <input type="date" name="date2" class="ps-2" value="<?php echo $date2 ?>">
                    </div>
                    <input type="submit" value="Book Now" id="submit">

                </form>

            </div>

        </div>

        <div class="sec-one-right col-12 col-lg-5 col-md-6">
            <img src="IMAGES/people taking off on plane edited.jpg" alt="" width="100%" class="sec-one-img">
        </div>


    </section>

    <?php include('footer.php')?>


    <script src="JAVASCRIPT/book-a-trip.js"></script>
    <script src="BOOTSTRAP/js/bootstrap.min.js"></script>
</body>

</html>