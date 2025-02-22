<?php
include('app/includes/connect.php');
require_once('app/includes/fns.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT</title>
    <link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
</head>

<body>

    <?php include('header.php') ?>

    <main>
        <h3>Contact</h3>
    </main>


    <section class="section-one ">
        <div class="cont">
            <i class="fa-solid fa-envelope"></i>
            <h3>Email</h3>
            <p>Info@fijorantravel.org <br>
                www.fijorantravels.com</p>
        </div>
        <div class="cont">
            <i class="fa-solid fa-phone"></i>
            <h3>Call Us</h3>
            <p>+2348035524575 <br>
                +2349065055742 <br>
                +2348061241739 </p>
        </div>
        <div class="cont">
            <i class="fa-solid fa-location-pin location"></i>
            <h3>Location</h3>
            <p>100 Kajola Ultramodern <br>
                Market Cele, Cele Bus Stop, <br>Oshodi Express Way <br> Lagos</p>
        </div>
    </section>

    <section class="section-two d-flex flex-wrap justify-content-center text-align-center">
        <div class="left col-12 col-lg-6 col-md-6">
            <h2>Get 100% Free Course Contact With Us</h2>
            <p>Have questions or need assistance with any of our services? Don’t hesitate to reach out! Whether you're
                planning your next adventure, need help with bookings, or want more information about our travel
                offerings, we’re here to help. Contact us today, and let’s make your travel dreams come true!</p><br>
            <p class="fw-bold">Follow Us Here</p>
            <span><a href="#"><img src="IMAGES/Dribbble.png" alt=""></a></span>
            <span><a href="#"><img src="IMAGES/Behance.png" alt=""></a></span>
            <span><a href="#"><img src="IMAGES/Group 12.png" alt=""></a></span>
            <span><a href="#"><img src="IMAGES/Twitter.png" alt=""></a></span>
        </div>

        <div id="contact" class="right col-12 col-lg-6 col-md-6">
            <p class="fw-bold">Drop Us a Line</p>

            <?php if ($msg == 'success') { ?>
            <div class="alert alert-success">Message Sent</div>
            <?php } ?>

            <?php if ($msg == 'error') { ?>
            <div class="alert alert-danger"><?php echo $comment; ?></div>
            <?php } ?>


            <form action="proc-contact?token=<?= $_GET['token'];?>" method="post">
                <label for="#">Name:</label><br>
                <input type="text" name="name"><br><br>
                <label for="#">Email:</label><br>
                <input type="email" name="email"><br><br>
                <label for="#">Contact Number:</label><br>
                <input type="number" name="contact_number"><br><br>
                <?php
        if(isset($_GET['token'])){
          ?>
                <label for="#">Destination:</label><br>
                <input type="text" readonly value="<?= get_val('product', 'token', $_GET['token'], 'destination') ;?> "
                    name="destination"><br><br>
                <label for="#">Price:</label><br>
                <input type="text" readonly
                    value="<?= number_format(get_val('product', 'token', $_GET['token'], 'price')) ;?> "
                    name="price"><br><br>
                <?php } ?>
                <label for="#">Preferred Travel Date:</label><br>
                <input type="date" name="travel_date" class="ps-2"><br><br>
                <label for="#">Additional information:</label><br>
                <input type="text" name="information" id="information"><br><br>
                <input type="submit" value="Submit" id="submit">
            </form>
        </div>
    </section>

    <article>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.11357809682!2d3.31941601099714!3d6.507304623323291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8fe3bc8e1b23%3A0xdd3b95e2f308d6c2!2sKajola%20Cele%20International%20Ultra%20Modern%20Market!5e0!3m2!1sen!2suk!4v1740247684171!5m2!1sen!2suk"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </article>

    <?php include('footer.php') ?>

    <script src="BOOTSTRAP/js/bootstrap.min.js"></script>
</body>

</html>