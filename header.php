<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>XSNAP - Social Casino</title>
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/xsnap-logo.webp" />

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    crossorigin="anonymous"
  />
  <!-- Bootstrap Icons -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    rel="stylesheet"
  />

  <!-- Custom Style -->
  <style>
    html, body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
    }
    .main-navbar {
      background: linear-gradient(135deg, #2d1b4e 0%, #4a2c6f 100%);
      border-radius: 0 0 16px 16px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      padding: 0.75rem 0;
      margin-bottom: 0;
    }
    .navbar-brand {
      font-weight: 700;
      color: #FFD700;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
    }
    .navbar-brand img {
      height: 40px;
      margin-right: 0.5rem;
    }
    .nav-link {
      font-weight: 500;
      color: #ffffff !important;
      transition: color 0.2s ease, transform 0.2s ease;
    }
    .nav-link:hover,
    .nav-link:focus {
      color: #FFD700 !important;
      transform: translateY(-1px);
    }
    .btn-play-now {
      background: linear-gradient(145deg, #7B2CBF, #9D4EDD);
      color: #fff !important;
      font-weight: 600;
      padding: 8px 24px;
      border-radius: 8px;
      box-shadow: 4px 4px 12px rgba(0,0,0,0.3), -4px -4px 12px rgba(255,215,0,0.2);
      border: 2px solid #FFD700;
      transition: transform 0.15s, box-shadow 0.15s;
    }
    .btn-play-now:hover {
      transform: translateY(-2px);
      box-shadow: 6px 6px 16px rgba(0,0,0,0.4), -2px -2px 8px rgba(255,215,0,0.3);
    }
    .dropdown-menu {
      background: linear-gradient(135deg, #2d1b4e 0%, #4a2c6f 100%);
      border: 2px solid #FFD700;
      border-radius: 12px;
    }
    .dropdown-item {
      color: #ffffff !important;
      transition: background 0.2s ease;
    }
    .dropdown-item:hover {
      background: rgba(255, 215, 0, 0.2);
      color: #FFD700 !important;
    }
    @media (max-width: 991px) {
      .navbar-nav {
        text-align: center;
      }
      .btn-play-now {
        width: 100%;
        text-align: center;
        margin-top: 1rem;
      }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg main-navbar sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <img src="assets/xsnap-logo.webp" alt="XSNAP Logo" style="height: 60px;">
    </a>

    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#XSNAPNavbar"
      aria-controls="XSNAPNavbar"
      aria-expanded="false"
      aria-label="Toggle navigation"
      style="border-color: #FFD700;"
    >
      <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
    </button>

    <div class="collapse navbar-collapse" id="XSNAPNavbar">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
        <li class="nav-item px-2"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item px-2"><a class="nav-link" href="about.php">About Us</a></li>
        <li class="nav-item px-2"><a class="nav-link" href="howtoplay.php">How to Play</a></li>
        
        <!-- Games Dropdown -->
        <li class="nav-item dropdown px-2">
          <a class="nav-link dropdown-toggle" href="#" id="gamesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Games
          </a>
          <ul class="dropdown-menu" aria-labelledby="gamesDropdown">
            <li><a class="dropdown-item" href="games.php"><i class="bi bi-grid-3x3 me-2"></i><strong>All Games</strong></a></li>
            <li><hr class="dropdown-divider" style="border-color: #FFD700;"></li>
            <li><a class="dropdown-item" href="slots.php"><i class="bi bi-cash-coin me-2"></i>Slots</a></li>
            <li><a class="dropdown-item" href="poker.php"><i class="bi bi-suit-spade me-2"></i>Poker</a></li>
            <li><a class="dropdown-item" href="roulette.php"><i class="bi bi-circle me-2"></i>Roulette</a></li>
            <li><a class="dropdown-item" href="dice.php"><i class="bi bi-dice-5 me-2"></i>Dice</a></li>
            <li><a class="dropdown-item" href="mines.php"><i class="bi bi-grid-3x3-gap me-2"></i>Mines</a></li>
            <li><a class="dropdown-item" href="chicken.php"><i class="bi bi-egg me-2"></i>Chicken</a></li>
          </ul>
        </li>
        
        <li class="nav-item px-2"><a class="nav-link" href="fairplay.php">Fair Play</a></li>
        <li class="nav-item px-2"><a class="nav-link" href="responsible.php">Responsible Gaming</a></li>
        <li class="nav-item px-2"><a class="nav-link" href="faq.php">FAQ</a></li>
        <li class="nav-item px-2"><a class="nav-link" href="contact.php">Contact</a></li>
      </ul>

      <div class="d-flex align-items-center">
        <a href="games/dice.php" class="btn-play-now">
          <i class="bi bi-controller me-2"></i> Play Now
        </a>
      </div>
    </div>
  </div>
</nav>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  crossorigin="anonymous"
></script>
</body>
</html>
