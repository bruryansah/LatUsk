<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>OriginX - Motor Spareparts Marketplace</title>
    <meta content="Premium motor spareparts marketplace with quality guarantee" name="description">
    <meta content="motor, spareparts, marketplace, auto parts" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&family=Syne:wght@400;500;600;700;800&family=JetBrains+Mono:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/isotope-layout/isotope.pkgd.min.js" rel="stylesheet">

    <!-- Main CSS -->
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <span class="logo-text">Origin<span class="accent">X</span></span>
            </div>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
        </div>
    </div>

    <!-- Floating Control Navbar -->
    <header id="navbar" class="floating-navbar">
        <div class="container-fluid">
            <nav class="nav-wrapper">
                <!-- Branding -->
                <div class="brand-section">
                    <a href="/" class="brand-logo">
                        <span class="logo-icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path d="M16 2L4 8V16C4 23 10 28 16 30C22 28 28 23 28 16V8L16 2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                <circle cx="16" cy="16" r="5" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </span>
                        <span class="logo-text">Origin<span class="accent">X</span></span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="nav-links" id="navLinks">
                    <a href="/" class="nav-link active">
                        <span class="link-text">Home</span>
                        <span class="link-indicator"></span>
                    </a>
                    <a href="#produk" class="nav-link scrollto">
                        <span class="link-text">Katalog</span>
                        <span class="link-indicator"></span>
                    </a>
                    <a href="#trust" class="nav-link scrollto">
                        <span class="link-text">Mengapa Kami</span>
                        <span class="link-indicator"></span>
                    </a>
                </div>

                <!-- User Actions -->
                <div class="nav-actions">
                    @if(!Auth::check())
                        <a href="/admin" class="btn-nav-secondary">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Masuk</span>
                        </a>
                        <a href="/register" class="btn-nav-primary">
                            <span>Daftar Sekarang</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    @else
                        <div class="user-dropdown">
                            <button class="user-trigger" id="userTrigger">
                                <div class="user-avatar">
                                    <span>{{ substr(Auth::user()->email, 0, 1) }}</span>
                                </div>
                                <div class="user-info">
                                    <span class="user-email">{{ Auth::user()->email }}</span>
                                    <span class="user-role">{{ Auth::user()->role }}</span>
                                </div>
                                <i class="bi bi-chevron-down"></i>
                            </button>
                            <div class="dropdown-panel" id="dropdownPanel">
                                <div class="dropdown-header">
                                    <div class="role-badge">{{ Auth::user()->role }}</div>
                                </div>
                                <a href="/admin" class="dropdown-item">
                                    <i class="bi bi-speedometer2"></i>
                                    <span>Dashboard Panel</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="post" action="{{ route('logout') }}" class="dropdown-form">
                                    @csrf
                                    <button type="submit" class="dropdown-item logout">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Keluar</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif

                    <!-- Mobile Toggle -->
                    <button class="mobile-toggle" id="mobileToggle">
                        <span class="toggle-line"></span>
                        <span class="toggle-line"></span>
                        <span class="toggle-line"></span>
                    </button>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Store Banner -->
    <section id="hero" class="hero-section">
        <div class="hero-background">
            <div class="grid-overlay"></div>
            <div class="gradient-orb orb-1"></div>
            <div class="gradient-orb orb-2"></div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="hero-content">
                        <div class="hero-badge">
                            <i class="bi bi-lightning-charge-fill"></i>
                            <span>Premium Spareparts Marketplace</span>
                        </div>
                        <h1 class="hero-title">
                            Sempurnakan Performa
                            <span class="title-highlight">Motor Anda</span>
                        </h1>
                        <p class="hero-subtitle">
                            Suku cadang original dan aftermarket berkualitas tinggi untuk semua jenis motor.
                            Garansi keaslian, pengiriman cepat, dan dukungan teknis profesional.
                        </p>
                        <div class="hero-cta">
                            <a href="#produk" class="btn-hero-primary scrollto">
                                <span>Jelajahi Katalog</span>
                                <i class="bi bi-arrow-down"></i>
                            </a>
                            <div class="hero-stats">
                                <div class="stat-item">
                                    <span class="stat-value">500+</span>
                                    <span class="stat-label">Produk</span>
                                </div>
                                <div class="stat-divider"></div>
                                <div class="stat-item">
                                    <span class="stat-value">98%</span>
                                    <span class="stat-label">Kepuasan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="hero-visual">
                        <div class="visual-card">
                            <div class="card-glow"></div>
                        </div>
                        <div class="floating-badge badge-1">
                            <i class="bi bi-shield-check"></i>
                            <span>100% Original</span>
                        </div>
                        <div class="floating-badge badge-2">
                            <i class="bi bi-truck"></i>
                            <span>Fast Delivery</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Filter Section -->
    <section id="produk" class="catalog-section">
        <div class="container">
            <!-- Section Header -->
            <div class="section-header" data-aos="fade-up">
                <div class="header-content">
                    <h2 class="section-title">Katalog Spareparts</h2>
                    <p class="section-subtitle">Temukan komponen yang sesuai dengan kebutuhan motor Anda</p>
                </div>
            </div>

            <!-- Category Filter -->
            <div class="filter-container" data-aos="fade-up" data-aos-delay="100">
                <div class="filter-wrapper">
                    <ul id="categoryFilters" class="category-filters">
                        <li data-filter="*" class="filter-active">
                            <span class="filter-text">Semua Kategori</span>
                            <span class="filter-line"></span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="product-grid" data-aos="fade-up" data-aos-delay="200">
                <div class="row portfolio-container g-4">
                    @foreach ($produk as $p)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $p->nama }}">
                        <div class="product-card">
                            <div class="card-image-wrapper">
                                <img src="storage/{{ $p->image }}" class="card-image" alt="{{ $p->nama }}">
                                <div class="image-overlay">
                                    <button class="btn-preview portfolio-lightbox"
                                            data-gallery="portfolioGallery"
                                            href="storage/{{ $p->image }}"
                                            title="{{ $p->nama.' '.$p->tipe }}">
                                        <i class="bi bi-zoom-in"></i>
                                    </button>
                                </div>
                                <div class="stock-badge {{ $p->stok > 10 ? 'in-stock' : 'low-stock' }}">
                                    <i class="bi bi-{{ $p->stok > 10 ? 'check-circle-fill' : 'exclamation-circle-fill' }}"></i>
                                    <span>{{ $p->stok > 10 ? 'Stok Tersedia' : 'Stok Terbatas' }}</span>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-header">
                                    <h3 class="product-name">{{ $p->nama }}</h3>
                                    <p class="product-type">{{ $p->tipe }}</p>
                                </div>

                                <div class="card-details">
                                    <div class="detail-item">
                                        <span class="detail-label">Jenis</span>
                                        <span class="detail-value">{{ $p->jenis }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">Stok</span>
                                        <span class="detail-value">{{ $p->stok }} unit</span>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="price-section">
                                        <span class="price-label">Harga</span>
                                        <span class="price-value">Rp {{ number_format($p->harga, 0, ',', '.') }}</span>
                                    </div>

                                    @if(Auth::check() && Auth::user()->role == 'Guest')
                                    <button class="btn-buy"
                                            data-bs-toggle="modal"
                                            data-bs-target="#ModalTambahpembelian{{ $p->kode }}">
                                        <i class="bi bi-cart-plus"></i>
                                        <span>Beli Sekarang</span>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Purchase Modal -->
                    <div class="modal fade purchase-modal" id="ModalTambahpembelian{{ $p->kode }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="bi bi-bag-check"></i>
                                        Konfirmasi Pembelian
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="product-preview">
                                        <div class="preview-image">
                                            <img src="storage/{{ $p->image }}" alt="{{ $p->nama }}">
                                        </div>
                                        <div class="preview-details">
                                            <h4>{{ $p->nama }}</h4>
                                            <div class="preview-specs">
                                                <div class="spec-row">
                                                    <span class="spec-label">Tipe:</span>
                                                    <span class="spec-value">{{ $p->tipe }}</span>
                                                </div>
                                                <div class="spec-row">
                                                    <span class="spec-label">Jenis:</span>
                                                    <span class="spec-value">{{ $p->jenis }}</span>
                                                </div>
                                                <div class="spec-row">
                                                    <span class="spec-label">Stok:</span>
                                                    <span class="spec-value">{{ $p->stok }} unit</span>
                                                </div>
                                                <div class="spec-row price-row">
                                                    <span class="spec-label">Harga:</span>
                                                    <span class="spec-value price">Rp {{ number_format($p->harga, 0, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="/pembelian/storeinput" method="post" class="purchase-form" id="purchaseForm{{ $p->kode }}">
                                        @csrf
                                        <input type="hidden" name="kodeproduk" value="{{ $p->id }}">
                                        <input type="hidden" name="harga" value="{{ $p->harga }}">

                                        <div class="form-group">
                                            <label for="banyak{{ $p->kode }}" class="form-label">
                                                <i class="bi bi-box"></i>
                                                Jumlah Pembelian
                                            </label>
                                            <input type="number"
                                                   name="banyak"
                                                   id="banyak{{ $p->kode }}"
                                                   class="form-control"
                                                   min="1"
                                                   max="{{ $p->stok }}"
                                                   value="1"
                                                   required>
                                            <div class="form-hint">Maksimal {{ $p->stok }} unit</div>
                                        </div>

                                        <div class="total-section">
                                            <span class="total-label">Total Pembayaran</span>
                                            <span class="total-value" id="totalPrice{{ $p->kode }}">
                                                Rp {{ number_format($p->harga, 0, ',', '.') }}
                                            </span>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn-secondary" data-bs-dismiss="modal">
                                                <span>Batal</span>
                                            </button>
                                            <button type="submit" class="btn-primary">
                                                <i class="bi bi-check-circle"></i>
                                                <span>Konfirmasi Pembelian</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Section -->
    <section id="trust" class="trust-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Mengapa Memilih OriginX?</h2>
                <p class="section-subtitle">Komitmen kami untuk memberikan pengalaman terbaik</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="trust-card">
                        <div class="trust-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3 class="trust-title">100% Original</h3>
                        <p class="trust-description">Semua produk dijamin keasliannya dengan sertifikat resmi</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="trust-card">
                        <div class="trust-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h3 class="trust-title">Pengiriman Cepat</h3>
                        <p class="trust-description">Pengiriman express ke seluruh Indonesia dalam 1-3 hari</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="trust-card">
                        <div class="trust-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h3 class="trust-title">Support 24/7</h3>
                        <p class="trust-description">Tim support siap membantu kapan saja Anda membutuhkan</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="trust-card">
                        <div class="trust-icon">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <h3 class="trust-title">Easy Return</h3>
                        <p class="trust-description">Kebijakan pengembalian mudah hingga 14 hari</p>
                    </div>
                </div>
            </div>

            <div class="stats-row" data-aos="fade-up" data-aos-delay="500">
                <div class="stat-block">
                    <span class="stat-number">5000+</span>
                    <span class="stat-text">Pelanggan Puas</span>
                </div>
                <div class="stat-block">
                    <span class="stat-number">500+</span>
                    <span class="stat-text">Produk Tersedia</span>
                </div>
                <div class="stat-block">
                    <span class="stat-number">98%</span>
                    <span class="stat-text">Rating Kepuasan</span>
                </div>
                <div class="stat-block">
                    <span class="stat-number">24/7</span>
                    <span class="stat-text">Customer Support</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer" class="site-footer">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-brand">
                            <a href="/" class="footer-logo">
                                <span class="logo-text">Origin<span class="accent">X</span></span>
                            </a>
                            <p class="footer-description">
                                Platform terpercaya untuk kebutuhan sparepart motor Anda.
                                Kualitas terjamin, harga kompetitif, dan layanan profesional.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="footer-links">
                            <h4>Quick Links</h4>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="#produk" class="scrollto">Katalog</a></li>
                                <li><a href="#trust" class="scrollto">Tentang Kami</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-links">
                            <h4>Legal</h4>
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="footer-contact">
                            <h4>Hubungi Kami</h4>
                            <p>Email: support@originx.com</p>
                            <p>Phone: +62 80?????????</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="copyright">
                    &copy; 2026 <strong>OriginX</strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://rpl-tamsis2jakarta.webnode.page/">BRURYANSAH | TMNSW 2</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top -->
    <a href="#" class="back-to-top" id="backToTop">
        <i class="bi bi-arrow-up"></i>
    </a>

    <!-- Vendor JS -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>
</body>
</html>
