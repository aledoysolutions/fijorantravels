<?php
include('app/includes/connect.php');
require_once('app/includes/fns.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Destinations | Fijoran Travels | Trusted Tour & Travel Agency for Flights, Visas, Hotels & Tours</title>
   <link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
   <link rel="stylesheet" href="CSS/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
</head>

<body>
   <?php include('header.php') ?>
   <main>
      <h3>Destinations</h3>
   </main>

   <section class="section-two">
      <div class="sec-two-parent">
         <?php
         $query = "SELECT * FROM product ORDER BY id DESC";
         $result = $conn->query($query);
         $num = mysqli_num_rows($result);
         for ($i = 0; $i < $num; $i++) {
            $row = mysqli_fetch_array($result);
         ?>
            <a class="text-dark text-decoration-none" href="contact?token=<?= $row['token']; ?>#contact">
               <div class="sec-two-cont">
                  <img src="app/<?= $row['image_path']; ?>" alt="" class="img"><br>
                  <div class="locationNprice">
                     <div>
                        <b><?= $row['destination']; ?></b> <br>
                        <img src="IMAGES/Group 7.png" alt=""> <span><?= strip_tags($row['destinationLocation']); ?></span>
                     </div>
                     <div class="price">
                        <span> &#8358; <?= number_format($row['price']); ?></span>
                     </div>
                  </div>
               </div>
            </a>
         <?php } ?>
      </div>
      
   </section>


   <?php include('footer.php') ?>



   <script src="JAVASCRIPT/blog.js"></script>
   <script src="BOOTSTRAP/js/bootstrap.min.js"></script>
</body>

</html>