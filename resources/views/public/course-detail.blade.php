@extends('layouts.layout public.index')
@section('title'){{$course->title}} @parent @endsection
@section('description'){{$course->description}}@endsection
@section('keywords'){{$course->keywords}}@endsection
@section('content')

    <section class="pb-0 py-4">
        <div class="container">
            <div class="row">

                <!-- Main content START -->
                <div class="order-1 col-lg-9">
                    <div class="card shadow rounded-2 p-4">
                        <div class="col-12">
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center" style="height: 100%">
                                        <img class="col-12" src="{{$course->image}}" alt="{{$course->alt}}">
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <h1 class="text-start">{{$course->name}}</h1>
                                    <br>
                                    <p>
                                        {{$course->paragraph}}
                                    </p>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-12 my-1">
                                                <div class="d-flex justify-content-center">
                                                    @include('components.public-price.index',['value'=>$course])
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12 my-1">
                                                <div class="d-flex justify-content-center align-items-center height-100">
                                                    <a href="#" class="btn btn-primary">
                                                        خرید دوره آموزشی
                                                        <i class="fas fa-graduation-cap"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main content END -->


                <!-- Left sidebar START -->
                <div class="order-2 col-lg-3 pt-5 pt-lg-0">
                    <div class="row mb-5 mb-lg-0">
                        <div class="col-md-6 col-lg-12">
                            <!-- Video START -->
                            <div class="card shadow p-2 mb-4 z-index-9">
                                <div class="overflow-hidden rounded-3">
                                    <img src="assets/images/courses/4by3/01.jpg" class="card-img" alt="course image">
                                    <!-- Overlay -->
                                    <div class="bg-overlay bg-dark opacity-6"></div>
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Video button and link -->
                                        <div class="m-auto">
                                            <a href="https://www.youtube.com/embed/tXHviS-4ygo" class="btn btn-lg text-danger btn-round btn-white-shadow mb-0" data-glightbox="" data-gallery="course-video">
                                                <i class="fas fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card body -->
                                <div class="card-body px-3">
                                    <!-- Info -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Price and time -->
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <h3 class="fw-bold mb-0 me-2">$150</h3>
                                                <span class="text-decoration-line-through mb-0 me-2">$350</span>
                                                <span class="badge bg-orange text-white mb-0">60% off</span>
                                            </div>
                                            <p class="mb-0 text-danger"><i class="fas fa-stopwatch me-2"></i>5 days left at this price</p>
                                        </div>

                                        <!-- Share button with dropdown -->
                                        <div class="dropdown">
                                            <!-- Share button -->
                                            <a href="#" class="btn btn-sm btn-light rounded small" role="button" id="dropdownShare" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-fw fa-share-alt"></i>
                                            </a>
                                            <!-- dropdown button -->
                                            <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare">
                                                <li><a class="dropdown-item" href="#"><i class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="fab fa-facebook-square me-2"></i>Facebook</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="fas fa-copy me-2"></i>Copy link</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="mt-3 d-sm-flex justify-content-sm-between">
                                        <a href="#" class="btn btn-outline-primary mb-0">Free trial</a>
                                        <a href="#" class="btn btn-success mb-0">Buy course</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Video END -->

                            <!-- Course info START -->
                            <div class="card card-body shadow p-4 mb-4">
                                <!-- Title -->
                                <h4 class="mb-3">This course includes</h4>
                                <ul class="list-group list-group-borderless">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-book-open text-primary"></i>Lectures</span>
                                        <span>30</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-clock text-primary"></i>Duration</span>
                                        <span>4h 50m</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-signal text-primary"></i>Skills</span>
                                        <span>Beginner</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-globe text-primary"></i>Language</span>
                                        <span>English</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-user-clock text-primary"></i>Deadline</span>
                                        <span>Nov 30 2021</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="h6 fw-light mb-0"><i class="fas fa-fw fa-medal text-primary"></i>Certificate</span>
                                        <span>Yes</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Course info END -->
                        </div>

                        <div class="col-md-6 col-lg-12">
                            <!-- Recently Viewed START -->
                            <div class="card card-body shadow p-4 mb-4">
                                <!-- Title -->
                                <h4 class="mb-3">Recently Viewed</h4>
                                <!-- Course item START -->
                                <div class="row gx-3 mb-3">
                                    <!-- Image -->
                                    <div class="col-4">
                                        <img class="rounded" src="assets/images/courses/4by3/21.jpg" alt="">
                                    </div>
                                    <!-- Info -->
                                    <div class="col-8">
                                        <h6 class="mb-0"><a href="#">Fundamentals of Business Analysis</a></h6>
                                        <ul class="list-group list-group-borderless mt-1 d-flex justify-content-between">
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="text-success">$130</span>
                                                <span class="h6 fw-light">4.5<i class="fas fa-star text-warning ms-1"></i></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Course item END -->

                                <!-- Course item START -->
                                <div class="row gx-3">
                                    <!-- Image -->
                                    <div class="col-4">
                                        <img class="rounded" src="assets/images/courses/4by3/18.jpg" alt="">
                                    </div>
                                    <!-- Info -->
                                    <div class="col-8">
                                        <h6 class="mb-0"><a href="#">The Complete Video Production Bootcamp</a></h6>
                                        <ul class="list-group list-group-borderless mt-1 d-flex justify-content-between">
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="text-success">$150</span>
                                                <span class="h6 fw-light">4.0<i class="fas fa-star text-warning ms-1"></i></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Course item END -->
                            </div>
                            <!-- Recently Viewed END -->

                            <!-- Tags START -->
                            <div class="card card-body shadow p-4">
                                <h4 class="mb-3">Popular Tags</h4>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">blog</a> </li>
                                    <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">business</a> </li>
                                    <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">theme</a> </li>
                                    <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">bootstrap</a> </li>
                                    <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">data science</a> </li>
                                    <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">web development</a> </li>
                                    <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">tips</a> </li>
                                    <li class="list-inline-item"> <a class="btn btn-outline-light btn-sm" href="#">machine learning</a> </li>
                                </ul>
                            </div>
                            <!-- Tags END -->
                        </div>
                    </div><!-- Row End -->
                </div>
                <!-- Left sidebar END -->


            </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->
@endsection

