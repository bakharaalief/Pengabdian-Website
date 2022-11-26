@extends('layouts.normal.app')

@section('content')

<!-- ======= Header ======= -->
@include('layouts.normal.partials.header')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container-fluid" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>Sistem Absensi</h1>
                <h2>Sistem yang akan memudahkan kamu untuk melakukan absensi</h2>
                <div><a href="#about" class="btn-get-started scrollto">Get Started</a></div>
            </div>
            <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
                <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->
    
<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                <img src="assets/img/about.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                <h3>Kenapa Memilih Sistem Absensi ?</h3>
                <p class="fst-italic">
                Ditengah kepadatan pembelajaran. ada kelebihan yang kami berikan
                </p>
                <ul>
                    <li><i class="bi bi-check-circle"></i> Mempermudah mendata siswa.</li>
                    <li><i class="bi bi-check-circle"></i> Mempermudah absensi.</li>
                    <li><i class="bi bi-check-circle"></i> Mempermudah pendataan absensi.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->

<!-- ======= Features Section ======= -->
<section id="features" class="features section-bg">
    <div class="container" data-aos="fade-up">

    <div class="section-title">
        <h2>Features</h2>
        <p>Fiture apa saya di dalam website ini</p>
    </div>

    <div class="row">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column align-items-lg-center">
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                <h4>Pendataan</h4>
                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-cube-alt"></i>
                <h4>Absensi</h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-images"></i>
                <h4>BAP</h4>
                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
            </div>
        </div>
        <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100">
            <img src="assets/img/features.svg" alt="" class="img-fluid">
        </div>
    </div>

    </div>
</section>
<!-- End Features Section -->

<!-- ======= Footer ======= -->
@include('layouts.normal.partials.footer')

@endsection

