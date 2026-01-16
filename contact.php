<?php include('header.php'); ?>

<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, #1a0b2e 0%, #2d1b4e 100%);">
  <div class="container text-center">
    <h1 class="fw-bold display-4 mb-3 text-white">
      Contact Us
    </h1>
    <div class="mx-auto mb-3" style="width:80px; height:4px; background:#FFD700; border-radius:2px;"></div>
    <p class="lead text-white mx-auto" style="max-width: 700px;">
      We'd love to hear from you. Get in touch with our support team.
    </p>
  </div>
</section>

<!-- Contact Content -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        
        <!-- Contact Info Cards -->
        <div class="row g-4 mb-5">
          <div class="col-md-4">
            <div class="bg-white p-4 rounded-4 shadow-sm h-100 border text-center">
              <i class="bi bi-envelope-fill fs-1 mb-3" style="color: #7B2CBF;"></i>
              <h5 class="fw-semibold">Email Us</h5>
              <p class="text-muted small mb-0">
                <a href="mailto:support@xsnaplive.com" style="color: #7B2CBF; text-decoration: none;">support@xsnaplive.com</a>
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="bg-white p-4 rounded-4 shadow-sm h-100 border text-center">
              <i class="bi bi-clock-fill fs-1 mb-3" style="color: #FFD700;"></i>
              <h5 class="fw-semibold">Response Time</h5>
              <p class="text-muted small mb-0">
                24-48 business hours
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="bg-white p-4 rounded-4 shadow-sm h-100 border text-center">
              <i class="bi bi-building fs-1 mb-3" style="color: #7B2CBF;"></i>
              <h5 class="fw-semibold">Company</h5>
              <p class="text-muted small mb-0">
                XSNAP IMAGING PRIVATE LIMITED
              </p>
            </div>
          </div>
        </div>

        <!-- When to Contact Us -->
        <div class="bg-white p-5 rounded-4 shadow-sm border mb-4">
          <h4 class="fw-semibold mb-3" style="color: #7B2CBF;">
            <i class="bi bi-question-circle-fill me-2"></i>When to Contact Us
          </h4>
          <div class="mb-3" style="width:60px; height:3px; background:linear-gradient(145deg,#7B2CBF,#9D4EDD); border-radius:2px;"></div>
          
          <div class="row g-3">
            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill me-2 mt-1" style="color: #7B2CBF;"></i>
                <div class="text-muted small">Need help understanding how games work or how virtual coins function?</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill me-2 mt-1" style="color: #7B2CBF;"></i>
                <div class="text-muted small">Questions about game rules, leaderboards, or platform features?</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill me-2 mt-1" style="color: #7B2CBF;"></i>
                <div class="text-muted small">Reporting bugs, technical issues, or suspicious activity?</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill me-2 mt-1" style="color: #7B2CBF;"></i>
                <div class="text-muted small">Want to suggest a new game or feature improvement?</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill me-2 mt-1" style="color: #7B2CBF;"></i>
                <div class="text-muted small">Concerns about responsible gaming or need support?</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill me-2 mt-1" style="color: #7B2CBF;"></i>
                <div class="text-muted small">General feedback or partnership inquiries?</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-white p-5 rounded-4 shadow-sm border mb-4">
          <h4 class="fw-semibold mb-3" style="color: #7B2CBF;">
            <i class="bi bi-send-fill me-2"></i>Send Us a Message
          </h4>
          <div class="mb-4" style="width:60px; height:3px; background:linear-gradient(145deg,#7B2CBF,#9D4EDD); border-radius:2px;"></div>
          
          <form action="#" method="POST">
            <div class="row mb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <label for="name" class="form-label fw-semibold">Your Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="E.g. Rakesh Kumar" required>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="subject" class="form-label fw-semibold">Subject <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="subject" name="subject" placeholder="What do you want to ask?" required>
            </div>

            <div class="mb-4">
              <label for="message" class="form-label fw-semibold">Your Message <span class="text-danger">*</span></label>
              <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message here in detail..." required></textarea>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-lg text-white" style="background: linear-gradient(145deg, #7B2CBF, #9D4EDD); border: 2px solid #FFD700;">
                <i class="bi bi-send-fill me-2"></i> Send Message
              </button>
            </div>
          </form>
        </div>

        <!-- Company Information -->
        <div class="p-5 rounded-4 shadow-sm text-center" style="background: linear-gradient(135deg, #1a0b2e 0%, #2d1b4e 100%);">
          <h5 class="fw-semibold mb-3 text-white">Company Information</h5>
          <div class="text-white" style="opacity: 0.9;">
            <p class="mb-2"><strong>XSNAP IMAGING PRIVATE LIMITED</strong></p>
            <p class="small mb-1"><strong>CIN:</strong> U31909MH2019PTC325365</p>
            <p class="small mb-2"><strong>PAN:</strong> AAACX2946B</p>
            <p class="small mb-2">📍 House No. 260, Near Sai Papers,<br>Jambhall, Badalpur,<br>Thane, Maharashtra 421503</p>
            <p class="small mb-0">📧 <a href="mailto:support@xsnaplive.com" class="text-white text-decoration-none">support@xsnaplive.com</a></p>
          </div>
          
          <div class="mt-4 p-3 rounded-3" style="background: rgba(255, 255, 255, 0.1);">
            <p class="text-white small mb-0">
              <strong>Note:</strong> XSNAP is a social casino entertainment platform. We do not handle real money transactions, deposits, or withdrawals. All games use virtual currency with no real-world value.
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?php include('footer.php'); ?>
