 <!--start sidebar -->
 <aside class="sidebar-wrapper" data-simplebar="true">
     <div class="sidebar-header">
         <div>
             <img src="../IMAGES/logo-removebg-preview.png" class="img-fluid" width="100" alt="logo icon">
         </div>


         <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
         </div>
     </div>
     <!--navigation-->
     <ul class="metismenu" id="menu">
         <li>
             <a href="./dashboard">
                 <div class="parent-icon"><i class="bi bi-house"></i>
                 </div>
                 <div class="menu-title">Dashboard</div>
             </a>

         </li>

         <li>
             <a href="javascript:;" class="has-arrow">
                 <div class="parent-icon"><i class="bi bi-receipt"></i>
                 </div>
                 <div class="menu-title">Products</div>
             </a>
             <ul>
                 <li> <a href="product"><i class="bi bi-circle"></i>Products</a>
                 </li>

             </ul>
         </li>

         <li>
             <a href="javascript:;" class="has-arrow">
                 <div class="parent-icon"><i class="bi bi-receipt"></i>
                 </div>
                 <div class="menu-title">Blog</div>
             </a>
             <ul>
                 <li> <a href="blog_category.php"><i class="bi bi-circle"></i>Blog category</a>
                 </li>
                 <li> <a href="blog_post"><i class="bi bi-circle"></i>Blog Post</a>
                 </li>

             </ul>
         </li>

         <li>
             <a href="./change_password">
                 <div class="parent-icon"><i class="bi bi-briefcase"></i>
                 </div>
                 <div class="menu-title">Change Password</div>
             </a>
         </li>
         <?php
      if ($_SESSION['privilege'] == 'Super Admin') {
      ?>
         <li>
             <a href="user_manage">
                 <div class="parent-icon"><i class="bi bi-pie-chart"></i>
                 </div>
                 <div class="menu-title">User Management</div>
             </a>

         </li>
         <?php } ?>


         <li>
             <a href="logout">
                 <div class="parent-icon"><i class="bi bi-cloud-arrow-down"></i>
                 </div>
                 <div class="menu-title">Logout</div>
             </a>

         <li>



 </aside>
 <!--end sidebar -->