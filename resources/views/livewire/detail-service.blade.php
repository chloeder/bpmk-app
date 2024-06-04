<div>
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Detail Service</h1>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Gallery Single</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Gallery Details Section -->
    <section id="gallery-details" class="gallery-details section">

        <div class="container" data-aos="fade-up">



            <div class="row justify-content-between gy-4 mt-4">
                <img src="{{ asset('storage/' . $informasiPelayanan->image) }}" alt="test">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="portfolio-description">
                        <h2>{{ $informasiPelayanan->judul }}</h2>
                        <p>
                            Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore
                            quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim.
                            Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi
                            nulla at esse enim cum deserunt eius.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="portfolio-info">
                        <h3>Detail Informasi</h3>
                        <ul>
                            <li><strong>Jenis Pelayanan</strong> {{ $informasiPelayanan->jenis_pelayanan }}</li>
                            <li><strong>Tempat</strong> {{ $informasiPelayanan->tempat_pelayanan }}</li>
                            <li><strong>Tanggal & Waktu </strong>
                                {{ \Carbon\Carbon::parse($informasiPelayanan->tanggal_pelayanan)->isoFormat('dddd, D MMMM Y - HH:mm') }}
                                WITA
                            </li>
                            <li><strong>Contact Person</strong> +62 {{ $informasiPelayanan->nomor_telepon }}</li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Gallery Details Section -->
</div>
