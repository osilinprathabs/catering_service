<?php
// book.php
require_once 'database.php';           
session_start();

// ------------------- CSRF token -------------------
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

// ------------------- Load dropdowns -------------------
$countries   = $pdo->query("SELECT value FROM dropdown_options WHERE type='country'   AND is_active=1 ORDER BY value")->fetchAll(PDO::FETCH_COLUMN);
$states      = $pdo->query("SELECT value FROM dropdown_options WHERE type='state'    AND is_active=1 ORDER BY value")->fetchAll(PDO::FETCH_COLUMN);
$cities      = $pdo->query("SELECT value FROM dropdown_options WHERE type='city'     AND is_active=1 ORDER BY value")->fetchAll(PDO::FETCH_COLUMN);
$event_names = $pdo->query("SELECT value FROM dropdown_options WHERE type='event_name' AND is_active=1 ORDER BY value")->fetchAll(PDO::FETCH_COLUMN);

// ------------------- Form submit -------------------
$errors = [];
if ($_POST) {

    // CSRF check
    if (!hash_equals($csrf_token, $_POST['csrf_token'] ?? '')) {
        $errors[] = 'Invalid request.';
    } else {

        // Basic sanitisation
        $name          = trim($_POST['name'] ?? '');
        $email         = trim($_POST['email'] ?? '');
        $phone         = trim($_POST['phone'] ?? '');
        $event_type    = $_POST['event_type'] ?? '';
        $custom_event  = trim($_POST['custom_event'] ?? '');
        $menu_count    = $_POST['menu_count']   ? (int)$_POST['menu_count']   : null;
        $meal_time     = $_POST['meal_time']    ?? null;
        $country       = $_POST['country'] ?? '';
        $state         = $_POST['state']   ?? '';
        $city          = $_POST['city']    ?? '';
        $venue         = trim($_POST['venue'] ?? '');
        $guests        = (int)($_POST['guests'] ?? 0);
        $veg           = $_POST['veg'] ?? '';
        $contact       = trim($_POST['contact'] ?? '');
        $event_date    = $_POST['event_date'] ?? '';
        $location_url  = trim($_POST['location_url'] ?? '');

        // ---------- Validation ----------
        if (!$name)                $errors[] = 'Name is required.';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email required.';
        if (!preg_match('/^\d{10,15}$/', $phone))       $errors[] = 'Phone must be 10‑15 digits.';
        if (!in_array($event_type, ['Catering','Full Event','Custom Event'])) $errors[] = 'Select a valid event type.';
        if ($event_type === 'Custom Event' && !$custom_event) $errors[] = 'Select a custom event name.';
        if ($event_type === 'Catering' && (!$menu_count || !$meal_time)) $errors[] = 'Menu count & meal time required for catering.';
        if (!$country || !$state || !$city) $errors[] = 'Select country, state & city.';
        if (!$venue)               $errors[] = 'Venue name required.';
        if ($guests < 1)           $errors[] = 'Guests must be > 0.';
        if (!in_array($veg, ['Vegetarian','Non-Vegetarian'])) $errors[] = 'Select veg/non‑veg.';
        if (!preg_match('/^\d{10,15}$/', $contact)) $errors[] = 'Contact (WhatsApp) must be 10‑15 digits.';
        if (!$event_date)          $errors[] = 'Event date required.';

        // ---------- If no errors → save ----------
        if (empty($errors)) {
            try {
                // Insert booking (no user table – everything in one row)
                $sql = "INSERT INTO bookings 
                        (event_type, custom_event_name, menu_count, meal_time,
                         country, state, city, venue_name, guests, veg_nonveg,
                         contact_no, event_date, email, location_url, name, phone)
                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $event_type, $custom_event, $menu_count, $meal_time,
                    $country, $state, $city, $venue, $guests, $veg,
                    $contact, $event_date, $email, $location_url, $name, $phone
                ]);

                // ---------- Build WhatsApp message ----------
                $msg  = "*New Booking – RD Catering & Events*\n\n";
                $msg .= "Name: $name\n";
                $msg .= "Email: $email\n";
                $msg .= "Phone: $phone\n";
                $msg .= "WhatsApp: $contact\n";
                $msg .= "Event: $event_type" . ($custom_event ? " ($custom_event)" : "") . "\n";
                if ($menu_count) $msg .= "Menu Count: $menu_count\n";
                if ($meal_time)  $msg .= "Meal: $meal_time\n";
                $msg .= "Guests: $guests | $veg\n";
                $msg .= "Date: $event_date\n";
                $msg .= "Venue: $venue, $city, $state, $country\n";
                if ($location_url) $msg .= "Location: $location_url\n";

                $wa_url = "https://api.whatsapp.com/send?phone=917339582043&text=" . urlencode($msg);
                header("Location: $wa_url");
                exit;

            } catch (Exception $e) {
                $errors[] = 'Database error. Please try again later.';
            }
        }
    }
}
?>
<?php include 'header.php'; ?>

<!-- Hero -->
<div class="container-fluid bg-light py-4 my-4 mt-0">
    <div class="container text-center">
        <h1 class="display-1 mb-4">Booking</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item text-dark">Booking</li>
        </ol>
    </div>
</div>

<!-- Booking Form -->
<div class="container-fluid contact py-4">
    <div class="container">
        <div class="row g-0">
            <div class="col-1">
                <img src="img/background-site.jpg" class="img-fluid h-100 w-100 rounded-start" style="object-fit:cover;opacity:.7;" alt="">
            </div>
            <div class="col-10">
                <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                    <div class="text-center">
                        <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Book Us</small>
                        <h1 class="display-5 mb-5">Plan Your Perfect Event</h1>
                    </div>

                    <?php if ($errors): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errors as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" class="row g-4">
                        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">

                        <!-- Personal -->
                        <div class="col-lg-4 col-md-6"><input type="text" name="name" class="form-control border-primary p-2" placeholder="Your Name *" required></div>
                        <div class="col-lg-4 col-md-6"><input type="email" name="email" class="form-control border-primary p-2" placeholder="Your Email *" required></div>
                        <div class="col-lg-4 col-md-6"><input type="text" name="phone" class="form-control border-primary p-2" placeholder="Your Phone *" required></div>

                        <!-- Event Type -->
                        <div class="col-lg-4 col-md-6">
                            <select name="event_type" id="event_type" class="form-select border-primary p-2" required onchange="toggleFields()">
                                <option value="">Select Event Type *</option>
                                <option value="Catering">Catering Only</option>
                                <option value="Full Event">Full Event (Catering + Decor)</option>
                                <option value="Custom Event">Custom Event</option>
                            </select>
                        </div>

                        <!-- Custom Event (only when Custom Event selected) -->
                        <div class="col-lg-4 col-md-6" id="custom_event_div" style="display:none;">
                            <select name="custom_event" class="form-select border-primary p-2">
                                <option value="">Select Event Name</option>
                                <?php foreach ($event_names as $e): ?>
                                    <option><?= htmlspecialchars($e) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Catering extra fields -->
                        <div id="catering_fields" style="display:none;">
                            <div class="col-lg-4 col-md-6"><input type="number" name="menu_count" class="form-control border-primary p-2" placeholder="Menu Count"></div>
                            <div class="col-lg-4 col-md-6">
                                <select name="meal_time" class="form-select border-primary p-2">
                                    <option value="">Meal Time</option>
                                    <option>Breakfast</option>
                                    <option>Lunch</option>
                                    <option>Dinner</option>
                                </select>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="col-lg-4 col-md-6">
                            <select name="country" class="form-select border-primary p-2" required>
                                <option value="">Country *</option>
                                <?php foreach ($countries as $c): ?><option><?= htmlspecialchars($c) ?></option><?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <select name="state" class="form-select border-primary p-2" required>
                                <option value="">State *</option>
                                <?php foreach ($states as $s): ?><option><?= htmlspecialchars($s) ?></option><?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <select name="city" class="form-select border-primary p-2" required>
                                <option value="">City *</option>
                                <?php foreach ($cities as $c): ?><option><?= htmlspecialchars($c) ?></option><?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-lg-4 col-md-6"><input type="text" name="venue" class="form-control border-primary p-2" placeholder="Venue / Place Name *" required></div>
                        <div class="col-lg-4 col-md-6"><input type="number" name="guests" class="form-control border-primary p-2" placeholder="No. of Guests *" required></div>

                        <div class="col-lg-4 col-md-6">
                            <select name="veg" class="form-select border-primary p-2" required>
                                <option value="Vegetarian">Vegetarian</option>
                                <option value="Non-Vegetarian">Non-Vegetarian</option>
                            </select>
                        </div>

                        <div class="col-lg-4 col-md-6"><input type="text" name="contact" class="form-control border-primary p-2" placeholder="WhatsApp Contact No. *" required></div>
                        <div class="col-lg-4 col-md-6"><input type="date" name="event_date" class="form-control border-primary p-2" required></div>
                        <div class="col-lg-4 col-md-6"><input type="url" name="location_url" class="form-control border-primary p-2" placeholder="Google Maps URL (optional)"></div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">Submit & Send to WhatsApp</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-1">
                <img src="img/background-site.jpg" class="img-fluid h-100 w-100 rounded-end" style="object-fit:cover;opacity:.7;" alt="">
            </div>
        </div>
    </div>
</div>

<script>
function toggleFields() {
    const type = document.getElementById('event_type').value;
    document.getElementById('catering_fields').style.display = (type === 'Catering') ? 'flex' : 'none';
    document.getElementById('custom_event_div').style.display = (type === 'Custom Event') ? 'block' : 'none';
}
</script>

<?php include 'footer.php'; ?>