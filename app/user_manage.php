<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');


if($_SESSION['privilege'] != 'Super Admin')
{
    $error = 'You do not have the right to access this page';
    include('index.php');
    exit;
}


?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="ltr/assets/images/icon.png" type="image/png" />
  <!--plugins-->
  <link href="ltr/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="ltr/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="ltr/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="ltr/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="ltr/assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="ltr/assets/css/style.css" rel="stylesheet" />
  <link href="ltr/assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="ltr/assets/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="ltr/assets/css/dark-theme.css" rel="stylesheet" />
  <link href="ltr/assets/css/light-theme.css" rel="stylesheet" />
  <link href="ltr/assets/css/semi-dark.css" rel="stylesheet" />
  <link href="ltr/assets/css/header-colors.css" rel="stylesheet" />

  <title>Fijoran Travels</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    <?php include "./header.php" ?>
     <!--end top header-->

       <!--start sidebar -->
       <?php 
       include "./aside.php";
       ?>
       <!--end sidebar -->

       <!--start content-->
          <main class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Pages</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User Management</li>
                  </ol>
                </nav>
              </div>
              <div class="ms-auto">
                <div class="btn-group">
                <a href="add_user"><button type="button" class="btn btn-primary">Add User</button></a>
                  <!-- <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                  </div> -->
                </div>
              </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                 <div class="card-body">
                   <div class="d-flex align-items-center">
                      <h5 class="mb-0">List of Users</h5>
                      
                       <form class="ms-auto position-relative">
                         <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                         <input class="form-control ps-5" type="text" placeholder="search">
                       </form>
                   </div>
                   <div class="table-responsive mt-3">
                    <?php if($error) { echo '<div class="alert alert-danger">'.$error.'</div>'; } ?>
                    <?php if($success) { echo '<div class="alert alert-success">'.$success.'</div>'; } ?>
                     <table class="table align-middle">
                       <thead class="table-secondary">
                         <tr>
                          <th>#</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Privilege</th>
                          <th>Actions</th>
                         </tr>
                       </thead>
                       <tbody>

                       <?php
                             $query = "select * from admin_login where username != 'administrator'";
                             $result = mysqli_query($conn, $query);
                             $num = mysqli_num_rows($result);
                             for($i=1; $i<=$num; $i++)
                             {
                             $row= mysqli_fetch_array($result);
                         
                       ?>
                         <tr>
                          <td><?php echo $i; ?></td>
                           
                          <td><?php echo $row['username']; ?></td>
                           <td><?php echo $row['password']; ?></td>
                           <td><?php echo $row['privilege']; ?></td>
                           <td>
                             <div class="table-actions d-flex align-items-center gap-3 fs-6">
                               <!-- <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a> -->
                               <a href="edit-user?id=<?php echo $row['id']; ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                               <a href="delete?tab=login&return=user_manage&id=<?php echo $row['id']; ?>" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" onclick="return confirm('Are you sure?'); "><i class="bi bi-trash-fill"></i></a>
                             </div>
                           </td>
                         </tr>

                         <?php
                         }
                         ?> 
                         
                       </tbody>
                     </table>
                   </div>
                 </div>
               </div>

          </main>
       <!--end page main-->


       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        
        <!--start switcher-->
       <div class="switcher-body">
        <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
          </div>
          <div class="offcanvas-body">
            <h6 class="mb-0">Theme Variation</h6>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
              <label class="form-check-label" for="LightTheme">Light</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
              <label class="form-check-label" for="DarkTheme">Dark</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
              <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
            </div>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3">
              <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
            </div>
            <hr/>
            <h6 class="mb-0">Header Colors</h6>
            <hr/>
            <div class="header-colors-indigators">
              <div class="row row-cols-auto g-3">
                <div class="col">
                  <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
       <!--end switcher-->

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="ltr/assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="ltr/assets/js/jquery.min.js"></script>
  <script src="ltr/assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="ltr/assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="ltr/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="ltr/assets/js/pace.min.js"></script>
  <!--app-->
  <script src="ltr/assets/js/app.js"></script>
  

</body>

</html>