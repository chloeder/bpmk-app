<div>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Services</h1>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="current">Services</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <div class="container">

                <div class="row gy-4">
                    @foreach ($informasiPelayanan as $pelayanan)
                        <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item position-relative">
                                <img src="{{ asset('storage/' . $pelayanan->image) }}" alt="logo" width="100%">
                                <h4 class="mt-3"><a href="{{ route('detail-service', $pelayanan->id) }}"
                                        class="stretched-link">{{ $pelayanan->jenis_pelayanan }}</a>
                                </h4>
                                <p>{{ $pelayanan->deskripsi }}</p>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                </div>

            </div>

        </section><!-- /Services Section -->

    </main>
</div>
