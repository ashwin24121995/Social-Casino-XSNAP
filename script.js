// Smooth scrolling for anchor links
document.addEventListener('DOMContentLoaded', function() {
    // Handle CTA button clicks
    const ctaButtons = document.querySelectorAll('a[href="#register"], a[href="#login"]');
    
    ctaButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const href = this.getAttribute('href');
            
            if (href === '#register') {
                // In a real implementation, this would redirect to the registration page
                // For now, we'll show an alert
                showRegistrationModal();
            } else if (href === '#login') {
                // In a real implementation, this would redirect to the login page
                // For now, we'll show an alert
                showLoginModal();
            }
        });
    });
    
    // Add scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe sections for scroll animations
    const sections = document.querySelectorAll('.how-it-works-section, .why-choose-section, .testimonials-section');
    sections.forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(30px)';
        section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(section);
    });
    
    // Add hover effects for cards
    const cards = document.querySelectorAll('.feature-card, .step-card, .why-card, .testimonial-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Track button clicks for analytics (placeholder)
    const allButtons = document.querySelectorAll('.btn');
    allButtons.forEach(button => {
        button.addEventListener('click', function() {
            // In a real implementation, this would send data to analytics
            console.log('Button clicked:', this.textContent.trim());
        });
    });
});

// Registration modal function
function showRegistrationModal() {
    // Create modal HTML
    const modalHTML = `
        <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background: linear-gradient(145deg, #FF6B00, #FFA040); color: white;">
                        <h5 class="modal-title" id="registrationModalLabel">
                            <i class="bi bi-person-plus-fill me-2"></i>Register for POUD
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <h6 class="text-primary">🏏 Ready to Join India's Only Skill-Based Fantasy Cricket Platform?</h6>
                            <p class="text-muted">In a real implementation, this would redirect to the registration page at:</p>
                            <code>https://poud.com/register.php</code>
                        </div>
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Remember:</strong> 100% Free • No Financial Risk • Skill-Based Only
                        </div>
                        <div class="text-center">
                            <p class="small text-muted">
                                For users 18+ in India only. Not available in Andhra Pradesh, Assam, Odisha, Telangana, Nagaland, Sikkim, and Tamil Nadu.
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" style="background: linear-gradient(145deg, #FF6B00, #FFA040); border: none;" onclick="window.open('mailto:support@rostermindsports.com?subject=Registration%20Interest', '_blank')">
                            <i class="bi bi-envelope me-2"></i>Contact Support
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Add modal to page
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('registrationModal'));
    modal.show();
    
    // Remove modal from DOM when hidden
    document.getElementById('registrationModal').addEventListener('hidden.bs.modal', function() {
        this.remove();
    });
}

// Login modal function
function showLoginModal() {
    // Create modal HTML
    const modalHTML = `
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background: linear-gradient(145deg, #FF6B00, #FFA040); color: white;">
                        <h5 class="modal-title" id="loginModalLabel">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Login to POUD
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <h6 class="text-primary">🏏 Welcome Back to Skill-Based Fantasy Cricket!</h6>
                            <p class="text-muted">In a real implementation, this would redirect to the login page at:</p>
                            <code>https://poud.com/login.php</code>
                        </div>
                        <div class="alert alert-success">
                            <i class="bi bi-shield-check me-2"></i>
                            <strong>Secure Login:</strong> Your data is protected with PHP sessions - no tracking cookies!
                        </div>
                        <div class="text-center">
                            <p class="small text-muted">
                                Forgot your password? No problem - just use the password reset feature on the login page.
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" style="background: linear-gradient(145deg, #FF6B00, #FFA040); border: none;" onclick="window.open('mailto:support@rostermindsports.com?subject=Login%20Support', '_blank')">
                            <i class="bi bi-envelope me-2"></i>Need Help?
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Add modal to page
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('loginModal'));
    modal.show();
    
    // Remove modal from DOM when hidden
    document.getElementById('loginModal').addEventListener('hidden.bs.modal', function() {
        this.remove();
    });
}

// Performance optimization: Lazy load images if any are added
function lazyLoadImages() {
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

// Initialize lazy loading
document.addEventListener('DOMContentLoaded', lazyLoadImages);

// Add loading states for buttons
function addLoadingState(button) {
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="bi bi-arrow-clockwise spin me-2"></i>Loading...';
    button.disabled = true;
    
    // Remove loading state after 2 seconds (simulate API call)
    setTimeout(() => {
        button.innerHTML = originalText;
        button.disabled = false;
    }, 2000);
}

// Add CSS for spinning animation
const style = document.createElement('style');
style.textContent = `
    .spin {
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
`;
document.head.appendChild(style);

