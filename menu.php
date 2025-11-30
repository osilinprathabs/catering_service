<?php include 'header.php'; ?>
<?php require_once 'database.php'; ?>

<!-- Hero Start -->
<div class="container-fluid bg-light py-4 my-4 mt-0">
    <div class="container text-center animated bounceInDown">
        <h1 class="display-1 mb-4">Our Menu</h1>
        <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">Menu</li>
        </ol>
    </div>
</div>
<!-- Hero End -->

<!-- Menu Start -->
<div class="container-fluid menu py-5 bg-white">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-success rounded-pill px-4 py-1 mb-3">
                Pure Vegetarian Menu
            </small>
            <h1 class="display-5 mb-3">600+ Authentic Indian Vegetarian Dishes</h1>
            <!-- <p class="text-success fs-5">South Indian • North Indian • Jain • Gujarati • Live Counters • Fresh Daily</p> -->
        </div>

        <!-- Tab Navigation -->
        <div class="tab-class text-center wow bounceInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-success bg-white rounded-pill active" data-bs-toggle="pill" href="#tab-starter">
                        <span class="text-dark" style="width: 150px;">Starter</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-success bg-white rounded-pill" data-bs-toggle="pill" href="#tab-main">
                        <span class="text-dark" style="width: 150px;">Main Course</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-success bg-white rounded-pill" data-bs-toggle="pill" href="#tab-drinks">
                        <span class="text-dark" style="width: 150px;">Drinks</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-success bg-white rounded-pill" data-bs-toggle="pill" href="#tab-offers">
                        <span class="text-dark" style="width: 150px;">Offers</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-success bg-white rounded-pill" data-bs-toggle="pill" href="#tab-special">
                        <span class="text-dark" style="width: 150px;">Our Special</span>
                    </a>
                </li>
            </ul>

            <!-- Search Bar -->
            <div class="row mb-4">
                <div class="col-md-6 offset-md-3">
                    <input type="text" id="searchInput" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="Search any dish... (e.g., dosa, jalebi, paneer)">
                </div>
            </div>

            <!-- Tab Content -->
            <div class="tab-content">
                <!-- Starter -->
                <div id="tab-starter" class="tab-pane fade show p-0 active">
                    <div class="row g-4" id="starter-container"></div>
                </div>
                <!-- Main Course -->
                <div id="tab-main" class="tab-pane fade show p-0">
                    <div class="row g-4" id="main-container"></div>
                </div>
                <!-- Drinks -->
                <div id="tab-drinks" class="tab-pane fade show p-0">
                    <div class="row g-4" id="drinks-container"></div>
                </div>
                <!-- Offers -->
                <div id="tab-offers" class="tab-pane fade show p-0">
                    <div class="row g-4" id="offers-container"></div>
                </div>
                <!-- Our Special -->
                <div id="tab-special" class="tab-pane fade show p-0">
                    <div class="row g-4" id="special-container"></div>
                </div>
            </div>

            <!-- Pagination -->
            <nav aria-label="Menu pagination" class="mt-5">
                <ul class="pagination justify-content-center pagination-lg" id="pagination"></ul>
            </nav>

            <div class="text-center mt-4">
                <p class="text-success fw-bold">All dishes prepared fresh • Jain option available • Custom menu welcome</p>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->

<script>
const defaultImg = "img/menu-default.jpg";

// Categorized Dishes
const menuData = {
    starter: [
        "Medu Vada", "Sambar Vada", "Dahi Vada", "Rasam Vada", "Podi Idli", "Button Idli", "Kancheepuram Idli",
        "Samosa", "Aloo Tikki", "Pani Puri", "Dahi Puri", "Sev Puri", "Bhel Puri", "Papdi Chaat", "Raj Kachori",
        "Aloo Tikki Chaat", "Samosa Chaat", "Pav Bhaji", "Vada Pav", "Dabeli", "Hara Bhara Kebab", "Veg Seekh Kebab",
        "Gobi 65", "Paneer 65", "Mushroom 65", "Baby Corn 65", "Veg Momos", "Steamed Momos", "Fried Momos", "Paneer Pakoda"
    ],
    main: [
        "Masala Dosa", "Plain Dosa", "Ghee Roast Dosa", "Mysore Masala Dosa", "Rava Dosa", "Onion Uthappam", "Pongal",
        "Paneer Butter Masala", "Palak Paneer", "Kadai Paneer", "Malai Kofta", "Dal Makhani", "Chole Masala", "Rajma Masala",
        "Aloo Gobi", "Bhindi Masala", "Baingan Bharta", "Vegetable Biryani", "Paneer Biryani", "Jeera Rice", "Peas Pulao",
        "Butter Naan", "Garlic Naan", "Aloo Paratha", "Lachha Paratha", "Poori Masala", "Avial", "Sambar", "Rasam"
    ],
    drinks: [
        "Masala Chai", "Filter Coffee", "Badam Milk", "Rose Milk", "Sweet Lassi", "Salted Lassi", "Mango Lassi",
        "Jaljeera", "Buttermilk", "Fresh Lime Soda", "Aam Panna", "Kokum Sharbat", "Thandai", "Falooda", "Cold Coffee"
    ],
    offers: [
        "Mini Tiffin Combo", "Wedding Starter Pack", "Corporate Lunch Box", "Jain Special Thali", "South Indian Thali",
        "North Indian Deluxe Thali", "Live Dosa + Chaat Counter", "Birthday Special Package", "Housewarming Feast"
    ],
    special: [
        "Live Dosa Counter", "Live Chaat Counter", "Live Jalebi Counter", "Live Pani Puri Station", "Gulab Jamun with Ice Cream",
        "Rasmalai", "Jalebi Rabri", "Mysore Pak", "Badam Halwa", "Carrot Halwa", "Moong Dal Halwa", "Ada Pradhaman",
        "Shrikhand", "Basundi", "Kesar Peda", "Kaju Katli", "Mohanthal", "Undhiyu with Puri", "Dal Dhokli", "Handvo"
    ]
};

const itemsPerPage = 18;
let currentPage = 1;
let activeTab = 'starter';

function renderDishes(dishes, containerId) {
    const container = document.getElementById(containerId);
    const searchTerm = document.getElementById("searchInput").value.toLowerCase();
    let filtered = dishes.filter(dish => dish.toLowerCase().includes(searchTerm));

    const start = (currentPage - 1) * itemsPerPage;
    const paginated = filtered.slice(start, start + itemsPerPage);

    container.innerHTML = paginated.map((dish, i) => `
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="${0.1 + (i % 6)*0.1}s">
            <div class="menu-item d-flex align-items-center bg-light rounded shadow-sm p-3 h-100">
                <img class="flex-shrink-0 img-fluid rounded-circle me-3" src="${defaultImg}" alt="${dish}" style="width:90px;height:90px;object-fit:cover;">
                <div class="w-100">
                    <h5 class="mb-1 text-success fw-bold">${dish}</h5>
                    <p class="mb-0 text-muted small">Fresh • Pure Veg • Jain Available</p>
                </div>
            </div>
        </div>
    `).join('');

    renderPagination(filtered.length);
}

function renderPagination(totalItems) {
    const totalPages = Math.ceil(totalItems / itemsPerPage);
    const pagination = document.getElementById("pagination");
    pagination.innerHTML = '';

    pagination.innerHTML += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
        <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">Previous</a>
    </li>`;

    for (let i = 1; i <= totalPages; i++) {
        if (i === 1 || i === totalPages || (i >= currentPage - 2 && i <= currentPage + 2)) {
            pagination.innerHTML += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
            </li>`;
        } else if (i === currentPage - 3 || i === currentPage + 3) {
            pagination.innerHTML += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
        }
    }

    pagination.innerHTML += `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
        <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">Next</a>
    </li>`;
}

function changePage(page) {
    const totalItems = document.getElementById("searchInput").value ? 
        menuData[activeTab].filter(d => d.toLowerCase().includes(document.getElementById("searchInput").value.toLowerCase())).length :
        menuData[activeTab].length;

    if (page < 1 || page > Math.ceil(totalItems / itemsPerPage)) return;
    currentPage = page;
    renderDishes(menuData[activeTab], activeTab + "-container");
    window.scrollTo({ top: 500, behavior: 'smooth' });
}

// Tab Change Handler
document.querySelectorAll('[data-bs-toggle="pill"]').forEach(tab => {
    tab.addEventListener('shown.bs.tab', function (e) {
        activeTab = e.target.getAttribute('href').substring(5);
        currentPage = 1;
        renderDishes(menuData[activeTab], activeTab + "-container");
    });
});

// Search Handler
document.getElementById("searchInput").addEventListener("keyup", function() {
    currentPage = 1;
    renderDishes(menuData[activeTab], activeTab + "-container");
});

// Initialize
document.addEventListener("DOMContentLoaded", () => {
    renderDishes(menuData.starter, "starter-container");
});
</script>

<?php include 'footer.php'; ?>