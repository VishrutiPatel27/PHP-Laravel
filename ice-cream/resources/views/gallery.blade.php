
@extends('layouts.main')
@section('main-container')

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Gallery</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Gallery</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Portfolio Start -->
    <div class="container-fluid my-5 py-5 px-0">
        <div class="row justify-content-center m-0">
            <div class="col-lg-5">
                <h1 class="section-title position-relative text-center mb-5">Delicious Ice Cream Made From Our Very Own Organic Milk</h1>
            </div>
        </div>
        <div class="row m-0 portfolio-container">
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{url('assets/img/portfolio-1.jpg')}}" alt="">
                    <a class="portfolio-btn" href="img/portfolio-1.jpg" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{url('assets/img/portfolio-2.jpg')}}" alt="">
                    <a class="portfolio-btn" href="img/portfolio-2.jpg" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{url('assets/img/portfolio-3.jpg')}}" alt="">
                    <a class="portfolio-btn" href="img/portfolio-3.jpg" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{url('assets/img/portfolio-4.jpg')}}" alt="">
                    <a class="portfolio-btn" href="img/portfolio-4.jpg" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{url('assets/img/portfolio-5.jpg')}}" alt="">
                    <a class="portfolio-btn" href="img/portfolio-5.jpg" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{url('assets/img/portfolio-6.jpg')}}" alt="">
                    <a class="portfolio-btn" href="img/portfolio-6.jpg" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary px-2 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
@endsection