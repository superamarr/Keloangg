@extends('layouts.app')

@section('title', 'Keloang')

@section('content')
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('img/keloang.png') }}" alt="logo keloang">
            <span class="logo-text">Keloang</span>
        </div>

        <ul class="navbar-left">
            <li class="dropdown">
                <a href="#">Jelajahi</a>
                <ul class="dropdown-menu">
                    <li><a href="#masalah-umum">Masalah Umum</a></li>
                    <li><a href="#fitur-unggulan">Fitur Unggulan</a></li>
                    <li><a href="#untuk-siapa">Untuk Siapa?</a></li>
                    <li><a href="#testimoni">Testimoni</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#ayo-coba">Ayo Coba</a></li>
                </ul>
            </li>
        </ul>

        <ul class="navbar-right">
            <li><a href="{{ route('login') }}" class="oval1">Masuk</a></li>
            <li><a href="{{ route('signup') }}" class="oval2">Daftar</a></li>
        </ul>

        <!-- Hamburger Menu Button -->
        <div class="hamburger-wrapper">
            <button class="hamburger-menu" id="hamburgerBtn" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <button class="hamburger-close" id="hamburgerCloseBtn" aria-label="Tutup Menu">
                <span>&times;</span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobileMenu">
            <div class="mobile-menu-header">
                <img src="{{ asset('img/keloang.png') }}" alt="logo keloang" class="mobile-logo">
                <button class="mobile-menu-close" id="closeMenuBtn" aria-label="Tutup Menu">
                    <span>&times;</span>
                </button>
            </div>
            <ul class="mobile-menu-list">
                <li class="mobile-menu-item mobile-dropdown">
                    <button class="mobile-menu-link mobile-dropdown-toggle" type="button">
                        <i class="fas fa-compass"></i>
                        <span>Jelajahi</span>
                        <i class="fas fa-chevron-down mobile-dropdown-arrow"></i>
                    </button>
                    <ul class="mobile-dropdown-menu">
                        <li><a href="#masalah-umum" class="mobile-dropdown-link">Masalah Umum</a></li>
                        <li><a href="#fitur-unggulan" class="mobile-dropdown-link">Fitur Unggulan</a></li>
                        <li><a href="#untuk-siapa" class="mobile-dropdown-link">Untuk Siapa?</a></li>
                        <li><a href="#testimoni" class="mobile-dropdown-link">Testimoni</a></li>
                        <li><a href="#faq" class="mobile-dropdown-link">FAQ</a></li>
                        <li><a href="#ayo-coba" class="mobile-dropdown-link">Ayo Coba</a></li>
                    </ul>
                </li>
                <li class="mobile-menu-divider"></li>
                <li class="mobile-menu-item">
                    <a href="{{ route('login') }}" class="mobile-menu-link mobile-menu-login">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Masuk</span>
                    </a>
                </li>
                <li class="mobile-menu-item">
                    <a href="{{ route('signup') }}" class="mobile-menu-link mobile-menu-signup">
                        <i class="fas fa-user-plus"></i>
                        <span>Daftar</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
    </nav>

    <div class = "konten">
        <img src="{{ asset('img/imgHero.svg') }}" alt="konten">

        <div class = "teks">
            <h1> Kelola Uangmu Dengan Mudah</h1>
            <p>Bagi pemasukan kamu ke berbagai kategori sesuai kebutuhan. Bebas atur sendiri!.</p>

            <a href="{{ route('login') }}" class="cta-button">Coba Sekarang</a>
        </div>
    </div>

    <section id = "masalah-umum" class = "section">
        <div class=" konten-masalah">
            <img src="{{ asset('img/img2.svg') }}" alt="konten-masalah">
            <div class="teks-masalah">
                <h1>Sering Ngerasa Gaji Cepat Habis?</h1>
                <p>Gaji sering numpang lewat, niat nabung nggak jalan, dan bingung mulai dari mana? Keloang bantu atur semuanya dengan mudah.</p>
                <a href="{{ route('login') }}" class="cta-button">Temukan Solusinya</a>
            </div>
        </div>
    </section>
    <section id="fitur-unggulan" class ="section-fitur">
        <div class = "konten-fitur">
            <div class="teks-fitur">
                <h1>Kamu yang Tentukan!</h1>
                <p>Atur keuangan sesuai gaya hidupmu — bebas dan fleksibel.</p>
            </div>
            <div class = "container-fitur">
                <div class ="img-fitur" >
                    <img src="{{ asset('img/fiutr1.png') }}">
                    <div class = "teks-fitur1">
                        <h2>Alokasi Bebas</h2>
                        <p>Kamu bebas menentukan berapa persen untuk tiap kategori.</p>
                    </div>
                </div>
                <div class ="img-fitur" >
                    <img src="{{ asset('img/fitur2.png') }}">
                    <div class = "teks-fitur1">
                        <h2>Statistik Visual</h2>
                        <p>Grafik sederhana untuk melihat pemasukan dan pengeluaran.</p>
                    </div>
                </div>
                <div class ="img-fitur" >
                    <img src="{{ asset('img/fitur3.png') }}">
                    <div class = "teks-fitur1">
                        <h2>Cepat & Simpel</h2>
                        <p>UI sederhana, langsung bisa pakai tanpa pelatihan.</p>
                    </div>
                </div> 
        </div>
    </section>
    <section id="untuk-siapa" class="section">
    <div class="konten-us">
        <div class="teks-us">
        <h1>Cocok Untuk Semua Profesi!</h1>
        <p>Keloang bisa digunakan siapa saja, dengan kebutuhan unik.</p>
        </div>

        <div class="container-us">
        <!-- Mahasiswa -->
        <div class="img-us">
            <div class="icon-us">
            <img src="{{ asset('img/us1.png') }}" alt="mahasiswa">
            <h3>Mahasiswa</h3>
            </div>
            <ul>
            <li>Jatah bulanan pas</li>
            <li>Atur uang jajan & nabung pelan-pelan</li>
            </ul>
        </div>

        <!-- Karyawan -->
        <div class="img-us">
            <div class="icon-us">
            <img src="{{ asset('img/us2.png') }}" alt="karyawan">
            <h3>Karyawan</h3>
            </div>
            <ul>
            <li>Gaji bulanan aman</li>
            <li>Tinggal sisihkan tiap tanggal gajian</li>
            </ul>
        </div>

        <!-- Freelancer -->
        <div class="img-us">
            <div class="icon-us">
            <img src="{{ asset('img/us3.png') }}" alt="freelancer">
            <h3>Freelancer</h3>
            </div>
            <ul>
            <li>Gaji nggak tetap</li>
            <li>Alokasikan harian penghasilan masuk</li>
            </ul>
        </div>

        <!-- UMKM / Pebisnis -->
        <div class="img-us">
            <div class="icon-us">
            <img src="{{ asset('img/us4.png') }}" alt="umkm">
            <h3>UMKM / Pebisnis</h3>
            </div>
            <ul>
            <li>Catat pemasukan harian</li>
            <li>Sisihkan untuk modal atau darurat</li>
            </ul>
        </div>
        </div>
    </div>
    </section>

    <section id="testimoni" class="testimoni-wrapper">
    <div class="testimoni-besar">
        <div class="testimoni-judul">
        <h1>Apa Kata Mereka?</h1>
        <p>Dengarkan cerita pengguna yang merasa terbantu dengan <strong>Keloang</strong></p>
        </div>

        <div class="testimoni-scroll-mask">
        <div class="testimoni-list">
            <!-- Testimoni Asli -->
            <div class="testimoni-box">
            <h3>Sinta - Mahasiswa</h3>
            <p class="stars">★★★★★</p>
            <p>Keloang bantu banget buat ngatur uang bulanan dan simpan buat keperluan kuliah.</p>
            </div>
            <div class="testimoni-box">
            <h3>Dodi - Pebisnis UMKM</h3>
            <p class="stars">★★★★★</p>
            <p>Sekarang pencatatan keuangan usaha jadi rapi dan gak campur dengan pribadi.</p>
            </div>
            <div class="testimoni-box">
            <h3>Rina - Freelancer</h3>
            <p class="stars">★★★★★</p>
            <p>Sangat fleksibel! Cocok untuk penghasilan yang tidak tetap seperti saya.</p>
            </div>
            <div class="testimoni-box">
            <h3>Andi - Karyawan</h3>
            <p class="stars">★★★★★</p>
            <p>Gampang banget nyisihin uang tiap gajian. Jadi lebih terkontrol!</p>
            </div>
            <div class="testimoni-box">
            <h3>Lina - Ibu Rumah Tangga</h3>
            <p class="stars">★★★★★</p>
            <p>Sekarang bisa alokasi belanja bulanan dan tabungan keluarga tanpa ribet.</p>
            </div>

            <!-- Duplikat untuk efek scroll tak terputus -->
            <div class="testimoni-box">
            <h3>Sinta - Mahasiswa</h3>
            <p class="stars">★★★★★</p>
            <p>Keloang bantu banget buat ngatur uang bulanan dan simpan buat keperluan kuliah.</p>
            </div>
            <div class="testimoni-box">
            <h3>Dodi - Pebisnis UMKM</h3>
            <p class="stars">★★★★★</p>
            <p>Sekarang pencatatan keuangan usaha jadi rapi dan gak campur dengan pribadi.</p>
            </div>
            <div class="testimoni-box">
            <h3>Rina - Freelancer</h3>
            <p class="stars">★★★★★</p>
            <p>Sangat fleksibel! Cocok untuk penghasilan yang tidak tetap seperti saya.</p>
            </div>
            <div class="testimoni-box">
            <h3>Andi - Karyawan</h3>
            <p class="stars">★★★★★</p>
            <p>Gampang banget nyisihin uang tiap gajian. Jadi lebih terkontrol!</p>
            </div>
            <div class="testimoni-box">
            <h3>Lina - Ibu Rumah Tangga</h3>
            <p class="stars">★★★★★</p>
            <p>Sekarang bisa alokasi belanja bulanan dan tabungan keluarga tanpa ribet.</p>
            </div>
        </div>
        </div>
    </div>
    </section>

    <section id="faq" class="faq-section">
    <h1>Pertanyaan yang Sering Diajukan</h1>
    
    <div class="faq-container">
        <div class="faq-item">
            <button class="faq-question">Beneran gratis, nih?</button>
            <div class="faq-answer">
            <p>Betul, penggunaan Keloang sepenuhnya gratis. Nggak ada biaya langganan atau tambahan lainnya. Fokus kami adalah bantu kamu kelola keuangan dengan mudah dan nyaman.</p>
            </div>
        </div>
    </div>

    <div class="faq-container">
        <div class="faq-item">
            <button class="faq-question">Apakah Keloang bisa dipakai di semua perangkat?</button>
            <div class="faq-answer">
            <p>Ya, Keloang bisa diakses dari berbagai perangkat seperti HP, tablet, dan laptop selama terhubung ke internet.</p>
            </div>
        </div>
    </div>

    <div class="faq-container">
        <div class="faq-item">
            <button class="faq-question">Harus instal dulu nggak?</button>
            <div class="faq-answer">
            <p>Tidak perlu instal. Cukup akses dari browser kamu, dan semua fitur bisa langsung digunakan!</p>
            </div>
        </div>
    </div>
    </section>
    
    <section id="ayo-coba" class="ayo-coba-section">
    <div class="ayo-coba-inner">
        <h1>Siap Atur Uangmu Sendiri?</h1>
        <p>Saatnya kendalikan keuanganmu sendiri. Mulai langkah kecil hari ini untuk masa depan yang lebih tenang.</p>
        <a href="{{ route('login') }}" class="cta-button">Mulai Sekarang</a>
        <p> Langsung akses via browser. Tanpa instalasi, tanpa pusing.</p>
    </div>
    </section>

    <footer class="footer">
    <div class="footer-content">
        <div class="footer-brand">
        <img src="{{ asset('img/keloang.png') }}" alt="logo" />
        <div class="footer-title">
            <h2>Keloang</h2>
        </div>
        </div>

        <p class="footer-tagline">
        Ubah cara kamu mengelola uang. Web budgeting untuk semua kalangan, tanpa ribet.
        </p>

        <div class="footer-kontak">
        <strong>Kontak</strong>
        <p>taufiikkramadhanii1@gmail.com</p>
        <p>Long Ikis, Paser, Kalimantan Timur, Indonesia.</p>
        </div>

        <div class="footer-sosmed">
        <strong>Ikuti Kami</strong>
        <p>
            <i class="fa-brands fa-instagram"></i> @dtramaaa
        </p>
        <p>
            <i class="fa-brands fa-instagram"></i> @wipebri._
        </p>
        </div>
    </div>

    <div class="footer-bottom">
        © 2025 Keloang. Dari Indonesia, untuk masa depan finansialmu.
    </div>
    </footer>
@endsection

