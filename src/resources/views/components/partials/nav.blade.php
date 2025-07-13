@php
    use App\Models\Title;
    $titles = Title::first();
@endphp

<main>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>{{ $titles->title}}</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ url('/') }}"
                class="nav-item nav-link {{ Request::is('/') ? 'active text-primary' : '' }}">Home</a>
            <a href="{{ url('about') }}"
                class="nav-item nav-link {{ Request::is('about') ? 'active text-primary' : '' }}">About Us</a>
            <a href="{{ url('courses') }}"
                class="nav-item nav-link {{ Request::is('courses') ? 'active text-primary' : '' }}">Courses</a>
            <a href="{{ url('blog') }}"
                class="nav-item nav-link {{ Request::is('blog') ? 'active text-primary' : '' }}">Blog</a>
            <a href="{{ url('contact') }}"
                class="nav-item nav-link {{ Request::is('contact') ? 'active text-primary' : '' }}">Contact</a>
            <a href="{{ url('edu/login') }}" class="nav-item nav-link">Login</a>
            <a href="{{ url('register') }}" class="nav-item nav-link">Signup</a>
        </div>

    </nav>
    <!-- Navbar End -->
</main>