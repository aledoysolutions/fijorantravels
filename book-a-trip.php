<?php

ini_set('display_errors',0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK TRIP</title>
    <link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/book-a-trip.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
</head>
<body>

      <?php include('header.php')?>

      <main>
        <h3>Book A Trip</h3>
      </main>

      <section class="section-one d-flex flex-wrap">
        <div class="sec-one-left col-12 col-lg-7 col-md-6">
          <h2 class="fw-bold text-center">Book A Trip Now</h2>
          <p  class="pt-4 text-center">Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis. Ut commodo efficitur neque.</p>
  

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
              <input type="text" name="f_name" value="<?php echo $firstname ?>" >
            </div>
              <div class="cont">
              <label for="#">Last Name</label><br>
              <input type="text" name="l_name" value ="<?php echo $lastname ?>" >
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
                  <label for="#">Price</label><br>
                  <input type="text" name="price" placeholder="$" value="<?php echo $price ?>">
              </div>
              <div class="cont">
                <label for="#">Date</label><br>
                <input type="date" name="date" class="ps-2" value="<?php echo $date ?>">
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