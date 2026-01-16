<?php include('header.php'); ?>

<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, #1a0b2e 0%, #2d1b4e 100%);">
  <div class="container text-center">
    <h1 class="fw-bold display-4 mb-3 text-white">
      How to Play
    </h1>
    <div class="mx-auto mb-3" style="width:80px; height:4px; background:#FFD700; border-radius:2px;"></div>
    <p class="lead text-white mx-auto" style="max-width: 700px;">
      Everything you need to know to start playing on XSNAP
    </p>
  </div>
</section>

<!-- Main Content -->
<section class="py-5 bg-light">
  <div class="container">

    <!-- Getting Started -->
    <div class="text-center mb-5">
      <h2 class="fw-bold text-dark">Getting Started</h2>
      <div class="mx-auto mb-3" style="width:60px; height:4px; background:linear-gradient(145deg,#7B2CBF,#9D4EDD); border-radius:2px;"></div>
      <p class="text-muted fs-6 mx-auto" style="max-width: 800px;">
        XSNAP is designed to be simple and fun. No registration required—just visit and start playing instantly!
      </p>
    </div>

    <!-- Steps -->
    <div class="row g-4 mb-5">
      <div class="col-md-3">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100 border text-center">
          <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background: linear-gradient(145deg, #7B2CBF, #9D4EDD); color: white; font-weight: bold; font-size: 1.5rem;">1</div>
          <h5 class="fw-semibold">Visit Website</h5>
          <p class="text-muted small mb-0">
            Open XSNAP in your browser. No downloads or registration needed.
          </p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100 border text-center">
          <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background: linear-gradient(145deg, #7B2CBF, #9D4EDD); color: white; font-weight: bold; font-size: 1.5rem;">2</div>
          <h5 class="fw-semibold">Get Virtual Coins</h5>
          <p class="text-muted small mb-0">
            Receive free virtual coins automatically to start playing.
          </p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100 border text-center">
          <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background: linear-gradient(145deg, #7B2CBF, #9D4EDD); color: white; font-weight: bold; font-size: 1.5rem;">3</div>
          <h5 class="fw-semibold">Choose a Game</h5>
          <p class="text-muted small mb-0">
            Browse our collection of casino games and pick your favorite.
          </p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100 border text-center">
          <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background: linear-gradient(145deg, #7B2CBF, #9D4EDD); color: white; font-weight: bold; font-size: 1.5rem;">4</div>
          <h5 class="fw-semibold">Play & Enjoy</h5>
          <p class="text-muted small mb-0">
            Have fun playing with virtual coins. No financial risk!
          </p>
        </div>
      </div>
    </div>

    <!-- Available Games -->
    <div class="text-center mb-5">
      <h2 class="fw-bold text-dark">Available Games</h2>
      <div class="mx-auto mb-3" style="width:60px; height:4px; background:linear-gradient(145deg,#7B2CBF,#9D4EDD); border-radius:2px;"></div>
      <p class="text-muted fs-6 mx-auto" style="max-width: 800px;">
        XSNAP offers a variety of classic casino games, all playable with virtual coins
      </p>
    </div>

    <div class="row g-4 mb-5">
      <div class="col-md-6">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100 border">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-dice-5-fill fs-2 me-3" style="color: #7B2CBF;"></i>
            <h5 class="fw-semibold mb-0">Dice</h5>
          </div>
          <p class="text-muted small mb-3">Roll two dice and predict the outcome. Bet on under 7, exactly 7, or over 7 with different multipliers.</p>
          <a href="games/dice.php" class="btn btn-sm text-white" style="background: linear-gradient(145deg, #7B2CBF, #9D4EDD); border: 2px solid #FFD700;">
            <i class="bi bi-play-fill me-1"></i>Play Now
          </a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100 border">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-grid-3x3-gap-fill fs-2 me-3" style="color: #FFD700;"></i>
            <h5 class="fw-semibold mb-0">Mines</h5>
          </div>
          <p class="text-muted small mb-3">Reveal tiles to avoid mines. Progressive multiplier system with cash-out anytime feature.</p>
          <a href="games/mines.php" class="btn btn-sm text-white" style="background: linear-gradient(145deg, #7B2CBF, #9D4EDD); border: 2px solid #FFD700;">
            <i class="bi bi-play-fill me-1"></i>Play Now
          </a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100 border">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-triangle-fill fs-2 me-3" style="color: #7B2CBF;"></i>
            <h5 class="fw-semibold mb-0">Plinko</h5>
          </div>
          <p class="text-muted small mb-3">Drop the ball through pegs and watch it land in multiplier zones. Physics-based gameplay.</p>
          <a href="games/plinko.php" class="btn btn-sm text-white" style="background: linear-gradient(145deg, #7B2CBF, #9D4EDD); border: 2px solid #FFD700;">
            <i class="bi bi-play-fill me-1"></i>Play Now
          </a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="bg-white p-4 rounded-4 shadow-sm h-100 border">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-egg-fill fs-2 me-3" style="color: #FFD700;"></i>
            <h5 class="fw-semibold mb-0">Chicken</h5>
          </div>
          <p class="text-muted small mb-3">Reveal safe tiles to increase multiplier. Avoid the chicken in this risk vs reward game.</p>
          <a href="games/chicken.php" class="btn btn-sm text-white" style="background: linear-gradient(145deg, #7B2CBF, #9D4EDD); border: 2px solid #FFD700;">
            <i class="bi bi-play-fill me-1"></i>Play Now
          </a>
        </div>
      </div>
    </div>

    <!-- Virtual Currency -->
    <div class="row justify-content-center mb-5">
      <div class="col-lg-10">
        <div class="bg-white p-5 rounded-4 shadow-sm border">
          <div class="text-center mb-4">
            <i class="bi bi-gem fs-1 mb-3" style="color: #FFD700;"></i>
            <h3 class="fw-bold" style="color: #7B2CBF;">Understanding Virtual Currency</h3>
            <div class="mx-auto mb-3" style="width:60px; height:4px; background:linear-gradient(145deg,#7B2CBF,#9D4EDD); border-radius:2px;"></div>
          </div>
          
          <p class="text-muted text-center mb-4">
            All games on XSNAP use virtual coins as in-game currency. These coins are provided free and have <strong>zero real-world value</strong>.
          </p>
          
          <div class="row g-3">
            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill me-2 mt-1" style="color: #7B2CBF;"></i>
                <div class="text-muted small">Virtual coins are completely free</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill me-2 mt-1" style="color: #7B2CBF;"></i>
                <div class="text-muted small">Cannot be exchanged for real money</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill me-2 mt-1" style="color: #7B2CBF;"></i>
                <div class="text-muted small">Used only for entertainment purposes</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill me-2 mt-1" style="color: #7B2CBF;"></i>
                <div class="text-muted small">Earn more by playing and winning games</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CTA -->
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="p-5 rounded-4 shadow-sm text-center" style="background: linear-gradient(135deg, #1a0b2e 0%, #2d1b4e 100%);">
          <i class="bi bi-controller fs-1 mb-3" style="color: #FFD700;"></i>
          <h3 class="fw-bold text-white mb-3">Ready to Play?</h3>
          <p class="text-white mb-4" style="opacity: 0.9;">
            Start playing now and experience the excitement of social casino gaming!
          </p>
          <a href="games/dice.php" class="btn btn-lg text-white" style="background: linear-gradient(145deg, #7B2CBF, #9D4EDD); border: 2px solid #FFD700;">
            <i class="bi bi-controller me-2"></i>Play Now
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

<?php include('footer.php'); ?>
