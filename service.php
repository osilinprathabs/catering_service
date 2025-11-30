<?php include 'header.php'; ?>

<!-- Hero Start -->
<div class="container-fluid bg-light py-4 my-4 mt-0">
    <div class="container text-center animated bounceInDown">
        <h1 class="display-1 mb-4">Services</h1>
        <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">Services</li>
        </ol>
    </div>
</div>
<!-- Hero End -->

 

<!-- Services Section -->
<div class="container-fluid py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5 wow fadeInUp">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-success rounded-pill px-4 py-2 mb-3">
                Pure Vegetarian Catering Services
            </small>
            <h1 class="display-5">We Serve with Love & Purity</h1>
            <p class="text-success fs-5">South Indian • North Indian • Jain • Corporate • Home Delivery</p>
        </div>

        <div class="row g-4">
            <!-- Service 1 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="text-center p-4 bg-light rounded shadow-sm h-100">
                    <i class="fas fa-leaf fa-4x text-success mb-4"></i>
                    <h4 class="mb-3">South Indian Wedding</h4>
                    <p class="mb-4">Traditional Kerala Sadhya, Brahmin, Tamil Iyer style pure veg feasts.</p>
                    <a href="#" class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalSouth">View Menu</a>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="text-center p-4 bg-light rounded shadow-sm h-100">
                    <i class="fas fa-seedling fa-4x text-success mb-4"></i>
                    <h4 class="mb-3">North Indian Wedding</h4>
                    <p class="mb-4">Royal Punjabi, Gujarati, Rajasthani thali with rich flavors.</p>
                    <a href="#" class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalNorth">View Menu</a>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="text-center p-4 bg-light rounded shadow-sm h-100">
                    <i class="fas fa-pray fa-4x text-success mb-4"></i>
                    <h4 class="mb-3">Jain Catering</h4>
                    <p class="mb-4">No onion, garlic, root vegetables — pure & auspicious food.</p>
                    <a href="#" class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalJain">View Menu</a>
                </div>
            </div>

            <!-- Service 4 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="text-center p-4 bg-light rounded shadow-sm h-100">
                    <i class="fas fa-briefcase fa-4x text-success mb-4"></i>
                    <h4 class="mb-3">Corporate Events</h4>
                    <p class="mb-4">Healthy office lunch, seminars, annual day catering.</p>
                    <a href="#" class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalCorporate">View Menu</a>
                </div>
            </div>

            <!-- Service 5 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="text-center p-4 bg-light rounded shadow-sm h-100">
                    <i class="fas fa-motorcycle fa-4x text-success mb-4"></i>
                    <h4 class="mb-3">Home Delivery</h4>
                    <p class="mb-4">Hot thali, combo meals delivered fresh to your door.</p>
                    <a href="#" class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalDelivery">View Menu</a>
                </div>
            </div>

            <!-- Service 6 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                <div class="text-center p-4 bg-light rounded shadow-sm h-100">
                    <i class="fas fa-utensils fa-4x text-success mb-4"></i>
                    <h4 class="mb-3">Sit-down Banquet</h4>
                    <p class="mb-4">Elegant plated service for grand weddings & receptions.</p>
                    <a href="#" class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalSitdown">View Menu</a>
                </div>
            </div>

            <!-- Service 7 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="text-center p-4 bg-light rounded shadow-sm h-100">
                    <i class="fas fa-concierge-bell fa-4x text-success mb-4"></i>
                    <h4 class="mb-3">Buffet & Live Counters</h4>
                    <p class="mb-4">Live Dosa, Chaat, Pasta, Jalebi — unlimited happiness!</p>
                    <a href="#" class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalBuffet">View Menu</a>
                </div>
            </div>

            <!-- Service 8 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.8s">
                <div class="text-center p-4 bg-light rounded shadow-sm h-100">
                    <i class="fas fa-birthday-cake fa-4x text-success mb-4"></i>
                    <h4 class="mb-3">Birthday & Housewarming</h4>
                    <p class="mb-4">Customized pure veg menu for all celebrations.</p>
                    <a href="#" class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalBirthday">View Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODALS - Auto Generated with Real Dishes -->
<?php
$menus = [
    "South" => ["Masala Dosa", "Idli Sambar", "Medu Vada", "Pongal", "Kesari Bath", "Avial", "Payasam", "Curd Rice"],
    "North" => ["Paneer Butter Masala", "Dal Makhani", "Aloo Paratha", "Rajma", "Gulab Jamun", "Jeera Rice", "Shahi Paneer"],
    "Jain" => ["Jain Paneer Tikka", "Jain Dal Fry", "Jain Undhiyu", "Khandvi", "Shrikhand", "Jain Handvo"],
    "Corporate" => ["Mini Idli", "Poori Bhaji", "Veg Sandwich", "Upma", "Pulao", "Curd Rice", "Sweet"],
    "Delivery" => ["Masala Dosa", "Idli (4 pcs)", "Mini Thali", "Dal Rice", "Chapati Curry", "Curd Rice"],
    "Sitdown" => ["Welcome Drink", "Soup", "Starter", "Main Course", "Breads", "Rice", "Dessert", "Paan"],
    "Buffet" => ["Live Dosa", "Live Chaat", "Pav Bhaji", "Pani Puri", "Jalebi", "Ice Cream", "Falooda"],
    "Birthday" => ["Veg Pizza", "Pasta", "Momos", "French Fries", "Gulab Jamun", "Ice Cream", "Cake"]
];
?>

<script>
const menuData = <?= json_encode($menus) ?>;
Object.keys(menuData).forEach(key => {
    const dishes = menuData[key].map(d => `
        <div class="col-6 mb-3">
            <div class="d-flex align-items-center">
                <img src="img/menu-default.jpg" class="rounded-circle me-3 flex-shrink-0" style="width:70px;height:70px;object-fit:cover;">
                <h6 class="mb-0 text-success fw-bold">${d}</h6>
            </div>
        </div>`).join('');

    document.write(`
    <div class="modal fade" id="modal${key}" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title fw-bold">${key === "South" ? "South" : key} Indian Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">${dishes}</div>
                    <div class="text-center mt-4">
                        <p class="text-success fw-bold mb-0">800+ Dishes Available - Fully Customizable</p>
                    </div>
                </div>
            </div>
        </div>
    </div>`);
});
</script>

<!-- Testimonial Start -->
<div class="container-fluid py-4">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Testimonial</small>
            <h1 class="display-5 mb-5">What Our Customers Say!</h1>
        </div>

        <div class="owl-carousel owl-theme testimonial-carousel testimonial-carousel-1 mb-4 wow bounceInUp" data-wow-delay="0.1s">

            <!-- Raja -->
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Sahil</h4>
                        <p class="m-0">Business Development Manager</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Excellent service! Very professional and fast. I highly recommend them.</p>
                </div>
            </div>

            <!-- Sarath -->
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Sarath</h4>
                        <p class="m-0">Teacher</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Great experience! Their support team was very helpful throughout.</p>
                </div>
            </div>

            <!-- Siva -->
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Siva</h4>
                        <p class="m-0">Software Engineer</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Very reliable service. They solved every issue quickly and professionally.</p>
                </div>
            </div>

            <!-- Karupuswamy -->
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-4.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Selva Kumar</h4>
                        <p class="m-0">Fabrication Factory</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Very trustworthy team. Their service quality is excellent.</p>
                </div>
            </div>

        </div>

        <!-- SECOND CAROUSEL WITH SAME NAMES IF YOU WANT -->
        <div class="owl-carousel testimonial-carousel testimonial-carousel-2 wow bounceInUp" data-wow-delay="0.3s">

            <!-- Raja -->
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Raja</h4>
                        <p class="m-0">Depaetmental Store</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Outstanding experience. Highly satisfied with their service.</p>
                </div>
            </div>

            <!-- Sarath -->
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Jagan</h4>
                        <p class="m-0">Civil Engineer</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">They really care about customers. Very happy with the service.</p>
                </div>
            </div>

            <!-- Siva -->
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Prathab</h4>
                        <p class="m-0">Software Engineer & Business Owner</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Smooth process and extremely responsive team.</p>
                </div>
            </div>

            <!-- Karupuswamy -->
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-4.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Karupuswamy</h4>
                        <p class="m-0">Entrepreneur</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Very good and trustworthy service. I appreciate their work.</p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Testimonial End -->

<?php include 'footer.php'; ?>