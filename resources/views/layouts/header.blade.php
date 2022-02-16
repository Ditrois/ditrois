<!-- Header Area-->
<header class="header-area">
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Navbar Brand --><a class="navbar-brand" href="/"><img src="{{ asset('img/ditrois-yellow.png') }}" alt=""></a>
        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#saasboxNav" aria-controls="saasboxNav" aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-grid"></i></button>
        <!-- Navbar Nav -->
        <div class="collapse navbar-collapse" id="saasboxNav">
        <ul class="navbar-nav navbar-nav-scroll">
            <li><a href="/">Beranda</a>
            </li>
            <li class="sb-dropdown"><a href="#">Layanan</a>
            <ul class="sb-dropdown-menu">
                <li><a href="/service/dental">Website Dokter Gigi</a></li>
            </ul>
            </li>
            <!-- <li class="sb-dropdown"><a href="#">Shop</a>
            <ul class="sb-dropdown-menu">
                <li><a href="shop-fullwidth.html">Shop Fullwidth</a></li>
                <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                <li><a href="single-product.html">Product Details</a></li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="checkout.html">Checkout</a></li>
            </ul>
            </li>
            <li class="sb-dropdown"><a href="#">Blog</a>
            <ul class="sb-dropdown-menu">
                <li><a href="blog-1.html">Blog 1</a></li>
                <li><a href="blog-2.html">Blog 2</a></li>
                <li><a href="blog-3.html">Blog 3</a></li>
                <li><a href="blog-details-1.html">Blog Details 1</a></li>
                <li><a href="blog-details-2.html">Blog Details 2</a></li>
                <li><a href="blog-details-3.html">Blog Details 3</a></li>
            </ul>
            </li>
            <li class="sb-dropdown"><a href="#">Pages</a>
            <ul class="sb-dropdown-menu">
                <li class="sb-dropdown"><a href="#">About Us</a>
                <ul class="sb-dropdown-menu">
                    <li><a href="about-standard.html">About Standard</a></li>
                    <li><a href="about-creative.html">About Creative</a></li>
                </ul>
                </li>
                <li class="sb-dropdown"><a href="#">Service</a>
                <ul class="sb-dropdown-menu">
                    <li><a href="service-standard.html">Service Standard</a></li>
                    <li><a href="service-creative.html">Service Creative</a></li>
                </ul>
                </li>
                <li class="sb-dropdown"><a href="#">Authentification</a>
                <ul class="sb-dropdown-menu">
                    <li><a href="register.html">Register</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="forget-password.html">Forget Password</a></li>
                </ul>
                </li>
                <li><a href="pricing-plan.html">Pricing Plan</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="team.html">Team</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="reviews.html">Reviews</a></li>
                <li><a href="coming-soon.html">Coming Soon</a></li>
                <li><a href="newsletter.html">Newsletter</a></li>
                <li><a href="404.html">404 - Error</a></li>
            </ul>
            </li> -->
        </ul>
        <!-- Login Button -->
        @guest
            @if (Route::has('login'))
                <div class="ms-auto mb-3 mb-lg-0"><a class="btn btn-warning btn-sm" href="{{ route('login') }}">
                    Login
                </a></div>
            @endif
        @else
            @hasrole('admin')
                <div class="ms-auto mb-3 mb-lg-0"><a class="btn btn-warning btn-sm" href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a></div>
            @endrole
            @hasrole('affiliator')
                <div class="ms-auto mb-3 mb-lg-0"><a class="btn btn-warning btn-sm" href="{{ route('affiliator.dashboard') }}">
                    Dashboard
                </a></div>
            @endrole
            <!-- <div class="ms-auto mb-3 mb-lg-0"><a class="btn btn-danger btn-sm" href="{{ route('dashboard') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a></div> -->
        @endguest
        </div>
    </div>
    </nav>
</header>