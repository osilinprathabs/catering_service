<?php include 'header.php'; ?>

<?php require_once 'database.php';?>

<?php
$success = $error = '';
if ($_POST) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if ($name && $email && $message) {
        $to = "info@rdcatering.in"; // Change to your email
        $subject = "New Contact from RD Catering Website";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            $success = "Thank you! We’ll get back to you soon.";
        } else {
            $error = "Sorry, something went wrong. Try again.";
        }
    } else {
        $error = "Please fill all fields.";
    }
}
?>

<!-- Hero -->
<div class="container-fluid bg-light py-4 my-4 mt-0">
    <div class="container text-center animated bounceInDown">
        <h1 class="display-1 mb-4">Contact Us</h1>
        <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">Contact</li>
        </ol>
    </div>
</div>

<!-- Contact Form -->
<div class="container-fluid contact py-4 wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="p-5 bg-light rounded contact-form">
            <div class="row g-4">
                <div class="col-12">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">
                        Get in Touch
                    </small>
                    <h1 class="display-5 mb-0">We'd Love to Hear From You!</h1>
                </div>

                <?php if ($success): ?>
                    <div class="col-12"><div class="alert alert-success"><?= $success ?></div></div>
                <?php elseif ($error): ?>
                    <div class="col-12"><div class="alert alert-danger"><?= $error ?></div></div>
                <?php endif; ?>

                <div class="col-md-6 col-lg-7">
                    <form method="POST">
                        <input type="text" name="name" class="w-100 form-control p-3 mb-4 border-primary bg-light" placeholder="Your Name" required>
                        <input type="email" name="email" class="w-100 form-control p-3 mb-4 border-primary bg-light" placeholder="Your Email" required>
                        <textarea name="message" class="w-100 form-control mb-4 p-3 border-primary bg-light" rows="5" placeholder="Your Message" required></textarea>
                        <button type="submit" class="w-100 btn btn-primary form-control p-3 rounded-pill">Send Message</button>
                    </form>
                </div>

                <div class="col-md-6 col-lg-5">
                    <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Visit Us</h4>
                            <p>Mumbai | Delhi | Bangalore | All India Service</p>
                        </div>
                    </div>
                    <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Email Us</h4>
                            <p>info@rdcatering.in</p>
                        </div>
                    </div>
                    <div class="d-inline-flex w-100 border border-primary p-4 rounded">
                        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Call Us</h4>
                            <p>+91 98765 43210</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>