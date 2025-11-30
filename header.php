<?php
// header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>RD Catering and Events - Premium Catering Services</title>
    <!-- Favicon -->
<link rel="shortcut icon" href="img/rdlogo.png" type="image/x-icon">
<link rel="icon" href="img/rdlogo.png" type="image/x-icon">
<link rel="apple-touch-icon" href="img/rdlogo.png">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="catering, events, wedding, corporate, mumbai catering">
    <meta name="description" content="RD Catering and Events - Premium catering for weddings, birthdays, and corporate events across India.">
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">
    <!-- Bootstrap & Custom -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<!-- Spinner -->
<div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>

<!-- Navbar -->
<div class="container-fluid nav-bar">
    <div class="container">
        <nav class="navbar navbar-light navbar-expand-lg py-4">
        <a href="index.php" class="navbar-brand d-flex align-items-center">
    <!-- Logo Image -->
    <img src="img/rdlogo.png" alt="RD Catering and Events Logo" class="me-2" style="height: 100px;">
     <h1>
        <span class="text-dark">Catering and Events</span>
    </h1>
    <!-- Mobile short text (optional) -->
    <span class="text-primary fw-bold d-lg-none fs-5">RD Catering</span>
</a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.php"       class="nav-item nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Home</a>
                    <a href="about.php"       class="nav-item nav-link <?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : '' ?>">About</a>
                    <a href="service.php"     class="nav-item nav-link <?= basename($_SERVER['PHP_SELF']) == 'service.php' ? 'active' : '' ?>">Services</a>
                    <a href="events.php"      class="nav-item nav-link <?= basename($_SERVER['PHP_SELF']) == 'events.php' ? 'active' : '' ?>">Events</a>
                    <a href="menu.php"        class="nav-item nav-link <?= basename($_SERVER['PHP_SELF']) == 'menu.php' ? 'active' : '' ?>">Menu</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?= in_array(basename($_SERVER['PHP_SELF']), ['book.php','blog.php','team.php','testimonial.php','404.php']) ? 'active' : '' ?>" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu bg-light">
                            <a href="book.php"        class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'book.php' ? 'active' : '' ?>">Booking</a>
                            <a href="blog.php"        class="dropdown-item">Our Blog</a>
                            <!-- <a href="team.php"        class="dropdown-item">Our Team</a> -->
                            <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                           
                        </div>
                    </div>

                    <a href="contact.php" class="nav-item nav-link <?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : '' ?>">Contact</a>
                </div>

                <!-- Search Button (desktop) -->
                <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"
                        data-bs-toggle="modal" data-bs-target="#searchModal">
                    <i class="fas fa-search"></i>
                </button>

                <!-- Book Now Button (desktop) -->
                <a href="book.php"
                   class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill me-2">
                    Book Now
                </a>

                <!-- *** ADMIN ICON *** -->
                <a href="admin/index.php"
                   class="btn btn-outline-primary btn-md-square d-none d-xl-inline-flex"
                   title="Admin Login">
                    <i class="fas fa-user-cog"></i>
                </a>
            </div>
        </nav>
    </div>
</div>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title">Search</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control bg-transparent p-3" placeholder="Search...">
                    <span class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>