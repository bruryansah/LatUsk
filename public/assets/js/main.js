/**
 * OriginX - Main JavaScript
 * Interactive behaviors and animations
 */

(function() {
    'use strict';

    // ==========================================
    // Utility Functions
    // ==========================================
    const select = (el, all = false) => {
        el = el.trim();
        if (all) {
            return [...document.querySelectorAll(el)];
        } else {
            return document.querySelector(el);
        }
    };

    const on = (type, el, listener, all = false) => {
        const selectEl = select(el, all);
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener));
            } else {
                selectEl.addEventListener(type, listener);
            }
        }
    };

    // ==========================================
    // Loading Screen
    // ==========================================
    window.addEventListener('load', () => {
        const loadingScreen = select('#loadingScreen');
        if (loadingScreen) {
            setTimeout(() => {
                loadingScreen.classList.add('hidden');
                setTimeout(() => {
                    loadingScreen.style.display = 'none';
                }, 500);
            }, 1000);
        }
    });

    // ==========================================
    // Navbar Scroll Behavior
    // ==========================================
    const navbar = select('#navbar');
    const navbarScrolled = () => {
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    };

    if (navbar) {
        window.addEventListener('load', navbarScrolled);
        document.addEventListener('scroll', navbarScrolled);
    }

    // ==========================================
    // Smooth Scroll for Nav Links
    // ==========================================
    const scrollTo = (el) => {
        const header = select('#navbar');
        const offset = header ? header.offsetHeight : 0;
        const elementPos = select(el).offsetTop;

        window.scrollTo({
            top: elementPos - offset - 20,
            behavior: 'smooth'
        });
    };

    on('click', '.scrollto', function(e) {
        if (select(this.hash)) {
            e.preventDefault();

            const navLinks = select('#navLinks');
            const mobileToggle = select('#mobileToggle');

            // Close mobile menu if open
            if (navLinks && navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                mobileToggle.classList.remove('active');
            }

            scrollTo(this.hash);

            // Update active state
            const allNavLinks = select('.nav-link', true);
            allNavLinks.forEach(link => link.classList.remove('active'));
            this.classList.add('active');
        }
    }, true);

    // ==========================================
    // Active Nav Link on Scroll
    // ==========================================
    const navbarLinks = select('.nav-link.scrollto', true);
    const navbarLinksActive = () => {
        const position = window.scrollY + 200;
        navbarLinks.forEach(navbarLink => {
            if (!navbarLink.hash) return;
            const section = select(navbarLink.hash);
            if (!section) return;

            if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                navbarLink.classList.add('active');
            } else {
                navbarLink.classList.remove('active');
            }
        });
    };

    if (navbarLinks.length > 0) {
        window.addEventListener('load', navbarLinksActive);
        document.addEventListener('scroll', navbarLinksActive);
    }

    // ==========================================
    // Mobile Menu Toggle
    // ==========================================
    on('click', '#mobileToggle', function() {
        const navLinks = select('#navLinks');
        this.classList.toggle('active');
        navLinks.classList.toggle('active');
    });

    // Close mobile menu on outside click
    document.addEventListener('click', (e) => {
        const navLinks = select('#navLinks');
        const mobileToggle = select('#mobileToggle');
        const navbar = select('#navbar');

        if (navLinks && navLinks.classList.contains('active')) {
            if (!navbar.contains(e.target)) {
                navLinks.classList.remove('active');
                mobileToggle.classList.remove('active');
            }
        }
    });

    // ==========================================
    // User Dropdown Toggle
    // ==========================================
    const userTrigger = select('#userTrigger');
    const dropdownPanel = select('#dropdownPanel');

    if (userTrigger && dropdownPanel) {
        userTrigger.addEventListener('click', (e) => {
            e.stopPropagation();
            userTrigger.classList.toggle('active');
            dropdownPanel.classList.toggle('active');
        });

        // Close dropdown on outside click
        document.addEventListener('click', (e) => {
            if (dropdownPanel.classList.contains('active')) {
                if (!userTrigger.contains(e.target) && !dropdownPanel.contains(e.target)) {
                    userTrigger.classList.remove('active');
                    dropdownPanel.classList.remove('active');
                }
            }
        });
    }

    // ==========================================
    // Back to Top Button
    // ==========================================
    const backToTop = select('#backToTop');

    const toggleBackToTop = () => {
        if (window.scrollY > 300) {
            backToTop.classList.add('active');
        } else {
            backToTop.classList.remove('active');
        }
    };

    if (backToTop) {
        window.addEventListener('load', toggleBackToTop);
        document.addEventListener('scroll', toggleBackToTop);

        backToTop.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // ==========================================
    // Portfolio Isotope Filter
    // ==========================================
    window.addEventListener('load', () => {
        const portfolioContainer = select('.portfolio-container');
        if (portfolioContainer) {
            let portfolioIsotope = new Isotope(portfolioContainer, {
                itemSelector: '.portfolio-item',
                layoutMode: 'fitRows',
                transitionDuration: '0.3s'
            });

            const portfolioFilters = select('#categoryFilters li', true);

            on('click', '#categoryFilters li', function(e) {
                e.preventDefault();

                portfolioFilters.forEach(el => {
                    el.classList.remove('filter-active');
                });
                this.classList.add('filter-active');

                portfolioIsotope.arrange({
                    filter: this.getAttribute('data-filter')
                });

                portfolioIsotope.on('arrangeComplete', () => {
                    if (typeof AOS !== 'undefined') {
                        AOS.refresh();
                    }
                });
            }, true);
        }
    });

    // ==========================================
    // Portfolio Lightbox
    // ==========================================
    if (typeof GLightbox !== 'undefined') {
        const portfolioLightbox = GLightbox({
            selector: '.portfolio-lightbox',
            touchNavigation: true,
            loop: true,
            autoplayVideos: true
        });
    }

    // ==========================================
    // Purchase Modal - Dynamic Total Price
    // ==========================================
    const setupPurchaseModal = () => {
        const forms = document.querySelectorAll('.purchase-form');

        forms.forEach(form => {
            const formId = form.id;
            const productCode = formId.replace('purchaseForm', '');
            const quantityInput = select(`#banyak${productCode}`);
            const totalPriceElement = select(`#totalPrice${productCode}`);
            const hiddenPriceInput = form.querySelector('input[name="harga"]');

            if (quantityInput && totalPriceElement && hiddenPriceInput) {
                const basePrice = parseInt(hiddenPriceInput.value);

                quantityInput.addEventListener('input', () => {
                    const quantity = parseInt(quantityInput.value) || 1;
                    const total = basePrice * quantity;

                    // Format currency
                    totalPriceElement.textContent = 'Rp ' + total.toLocaleString('id-ID');
                });
            }

            // Form submission handling
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i><span>Memproses...</span>';
                }
            });
        });
    };

    // Initialize on page load
    window.addEventListener('load', setupPurchaseModal);

    // Re-initialize when modals are shown (for dynamically loaded content)
    const modals = document.querySelectorAll('.purchase-modal');
    modals.forEach(modal => {
        modal.addEventListener('shown.bs.modal', setupPurchaseModal);
    });

    // ==========================================
    // Toast Notification (Success Message)
    // ==========================================
    const showToast = (message, type = 'success') => {
        // Check if toast container exists, if not create it
        let toastContainer = select('.toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
            toastContainer.style.zIndex = '9999';
            document.body.appendChild(toastContainer);
        }

        // Create toast element
        const toastId = 'toast-' + Date.now();
        const toastHTML = `
            <div id="${toastId}" class="toast align-items-center text-white bg-${type === 'success' ? 'success' : 'danger'} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-circle'}-fill me-2"></i>
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        `;

        toastContainer.insertAdjacentHTML('beforeend', toastHTML);
        const toastElement = select(`#${toastId}`);
        const toast = new bootstrap.Toast(toastElement, { delay: 3000 });
        toast.show();

        // Remove toast element after it's hidden
        toastElement.addEventListener('hidden.bs.modal', () => {
            toastElement.remove();
        });
    };

    // Check for success message in URL or session
    window.addEventListener('load', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const successParam = urlParams.get('success');

        if (successParam === 'purchase') {
            showToast('Pembelian berhasil! Terima kasih atas pesanan Anda.', 'success');

            // Clean up URL
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    });

    // ==========================================
    // AOS (Animate On Scroll) Initialization
    // ==========================================
    window.addEventListener('load', () => {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false,
                offset: 100,
                delay: 0
            });
        }
    });

    // ==========================================
    // Form Input Focus Effects
    // ==========================================
    const formInputs = select('.form-control', true);
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });

    // ==========================================
    // Hash Link Handling on Page Load
    // ==========================================
    window.addEventListener('load', () => {
        if (window.location.hash) {
            const target = select(window.location.hash);
            if (target) {
                setTimeout(() => {
                    scrollTo(window.location.hash);
                }, 100);
            }
        }
    });

    // ==========================================
    // Prevent Form Resubmission on Page Refresh
    // ==========================================
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    // ==========================================
    // Add smooth reveal animation to product cards
    // ==========================================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    window.addEventListener('load', () => {
        const productCards = select('.product-card', true);
        productCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    });

    // ==========================================
    // Keyboard Accessibility
    // ==========================================
    document.addEventListener('keydown', (e) => {
        // Close dropdown on ESC
        if (e.key === 'Escape') {
            const dropdownPanel = select('#dropdownPanel');
            const userTrigger = select('#userTrigger');
            const navLinks = select('#navLinks');
            const mobileToggle = select('#mobileToggle');

            if (dropdownPanel && dropdownPanel.classList.contains('active')) {
                dropdownPanel.classList.remove('active');
                userTrigger.classList.remove('active');
            }

            if (navLinks && navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                mobileToggle.classList.remove('active');
            }
        }
    });

    // ==========================================
    // Performance: Debounce scroll events
    // ==========================================
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Apply debounce to scroll handlers for better performance
    const debouncedScroll = debounce(() => {
        navbarScrolled();
        toggleBackToTop();
        navbarLinksActive();
    }, 10);

    document.addEventListener('scroll', debouncedScroll);

    console.log('%c OriginX Marketplace Ready ', 'background: #84cc16; color: #0a0a0b; font-weight: bold; padding: 4px 8px; border-radius: 4px;');
    console.log('Built with modern web standards | Dark Industrial Design');

})();
