<x-guest-layout>
    <header class="masthead" style="background-image: url({{ asset('storage/header-bg.jpg')}});">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Family!</div>
            <div class="masthead-heading text-uppercase">The Mutua's</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Our Goals</a>
        </div>
    </header>
     {{-- <!-- Services--> --}}
     <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Goals</h2>
                <h3 class="section-subheading text-muted">what we work together to achieve as family.</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-hospital fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Health and Safety</h4>
                    <p class="text-muted">Quality wellness to keep each other safe.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-briefcase fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Team Work</h4>
                    <p class="text-muted">Work together can help balance each others' strengths and weaknesses and bring everyone closer together.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-child fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Childcare</h4>
                    <p class="text-muted">Educating the current young generation on matters concerning life and how relate well with others</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Links -->
     <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Links</h2>
            </div>
            <div class="row text-center">
                <a class="col-md-6" href="https://ke.usembassy.gov" target="__blank">
                    <span class="fa-stack fa-3x">
                        <img src="{{ asset('storage/ke-seal.png') }}" alt="Us Embassy">
                    </span>
                    <h4 class="my-3">Us Embassy in Kenya</h4>
                </a>
                <a class="col-md-6" href="https://kra.go.ke/en" target="__blank">
                    <span class="fa-stack fa-3x">
                        <img src="{{ asset('storage/kra_logo.png') }}" alt="KRA Kenya">
                    </span>
                    <h4 class="my-3">KRA Kenya</h4>
                </a>
            </div>
        </div>
    </section>
</x-guest-layout>