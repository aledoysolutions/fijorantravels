<?php
include('app/includes/connect.php');
require_once('app/includes/fns.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BLOG | Fijoran Travels | Trusted Tour & Travel Agency for Flights, Visas, Hotels & Tours</title>
   <link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
   <link rel="stylesheet" href="CSS/blog.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
</head>

<body>
   <?php include('header.php') ?>
   <main>
      <h3>Blog</h3>
   </main>

   <section class="section-one d-flex flex-wrap">

      <div class="left col-12 col-lg-8 col-md-6">

         <?php
            $query = "SELECT * FROM blog ORDER BY id DESC";
            $result = $conn->query($query);
            $num = mysqli_num_rows($result);

            for($i=0; $i<$num; $i++){
               $row = mysqli_fetch_array($result);
            
         ?>

         <div class="one">
            <img src="app/<?= $row['blog_img'];?> " alt="image-9" width="100%" class="left-img">
            <div class="sec-one-child">
               <div class="cont">
                  <i class="fa-solid fa-location-pin location"></i>
                  <span><?= $row['blog_location'];?></span>
               </div>
               <div class="cont">
                  <i class="fa-regular fa-calendar-days calender"></i>
                  <span><?= long_date($row['date_posted']);?></span>
               </div>
               <div class="cont">
                  <i class="fa-regular fa-calendar-days calender"></i>
                  <span>No Comment</span>
               </div>
            </div>
            <h2 class="pt-3"><?= $row['title'];?></h2>
            <p><?= $row['content'];?>
            </p>
         </div>
<?php } ?>
         

      </div>

      <br><br>


      <aside class="right col-12 col-lg-4 col-md-6">
         <h4>Categories</h4>
         <ul>
            <li><a href="#">Adventure</a></li>
            <li><a href="#">Cultural</a></li>
            <li><a href="#">Destination</a></li>
            <li><a href="#">Solo Travel</a></li>
         </ul>

         <h4>Tags</h4>
         <ul>
            <li><a href="#">Beach</a></li>
            <li><a href="#">Hill</a></li>
            <li><a href="#">Journey</a></li>
            <li><a href="#">Tour</a></li>
            <li><a href="#">Travel</a></li>
         </ul>
         </div>

      </aside>

   </section>

   <button id="backToTop" class="btn btn-primary">
    <i class="fa fa-arrow-up"></i> Top
   </button>


   <?php include('footer.php') ?>



   <script src="JAVASCRIPT/blog.js"></script>
   <script src="BOOTSTRAP/js/bootstrap.min.js"></script>
</body>

</html>