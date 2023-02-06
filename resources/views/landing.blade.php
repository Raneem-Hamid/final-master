@extends('layouts.master')


@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Welcome to MAMYEYES</h1>
            <h2>The childcare platform trusted by families</h2>
            {{-- <a href="#appointment" class="btn-get-started scrollto">Find a babysitter</a>
            <a href="#appointment" class="btn-get-started scrollto">Find a babysitter</a> --}}
            <a href="" class="appointment-btn scrollto" id="join"><span class="d-none d-md-inline"></span>Be a
                Babysitter</a>
            <a href="{{ route('appointment') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Find
                a Babysitter </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">
        @if (count($errors) > 0)
            <div class="row">
                <div class="col-md-4 col-md-offset-4 error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if (Session::has('message'))
            <div class="row">
                <div class="col-md-4 col-md--offset-4 success">
                    {{ Session::get('message') }}
                </div>
            </div>
        @endif
        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Why Choose MAMYEYES?</h3>
                            <p> 3 reasons why MAMYEYES is the best website for babysitters in Jordan</p>
                            <!-- <div class="text-center">
                                                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                                              </div> -->
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <h4>We are near you</h4>
                                        <p>Wherever you are, you will find dozens of babysitters near you through a MAMYEYES
                                            website</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fas fa-history"></i>
                                        <h4>Any time</h4>
                                        <p>Our certified services are available 24 hours a day, seven days a week, 24/7.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fas fa-hands"></i>
                                        <h4>Trusted</h4>
                                        <p>All of our babysitters go through an extensive rehabilitation process</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Sitter?!</h2>
                    <p>Apply now to be part of MAMYEYES team Your golden offer is coming to you..!<br> We will contact you
                        as soon as possible </p>
                </div>
            </div>
            <div class="container">
                <div class="row mt-5">
                    <div class="d-flex p-2">
                        <form action="{{ route('beAsitter') }}" method="post"
                            enctype="multipart/form-data" role="form" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="phone">Your phone</label>
                                    <input type="text" readonly name="name" class="form-control" id="name"
                                        placeholder="Your Name" required value="{{ old('name', Auth::user()->name) }}">
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <label for="phone">Your Email</label>
                                    <input type="email" readonly class="form-control" name="email" id="email"
                                        placeholder="Your Email" required value="{{ old('name', Auth::user()->email) }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="phone">Your phone</label>
                                    <input type="tel" readonly name="phone" class="form-control" id="tel"
                                        placeholder="Your phone" required value="{{ old('name', Auth::user()->phone) }}">
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <label for="certificate">Your certificate (if found)</label>
                                    <input type="file" class="form-control" name="certificate" id="certificate"
                                        placeholder="Your certificate (if found)">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="overview">Short text about yourself</label>
                                <textarea class="form-control" name="overview" rows="5" required></textarea>
                            </div>
                            <div class="form-group mt-3">
                               
                                <input type="hidden" name="kinds_id" value="1">
                            </div>
                            <div class="my-3">
                                <div class="loading"></div>
                                <div class="sent-message"></div>
                            </div>
                            <div class="text-center"><button type="submit">Send</button></div>
                            <div class="error-message"></div>
                        </form>
                                

                    </div>

                </div>

            </div>

        </section><!-- End Contact Section -->



        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                    
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help" id="qicon"></i> <a data-bs-toggle="collapse"
                                class="collapse" data-bs-target="#faq-list-1">What is the hourly price? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    The price varies according to the sitter’s level, but the price ranges between (5-15) JD
                                    per hour. Monthly subscriptions will soon be available to suit you.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"id="qicon"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Does the babysitter come home? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    There are babysitters who prefer to sit in their house, and there are also babysitters
                                    who come to you wherever you are! The application form will help you choose the
                                    right babysitter for you </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"id="qicon"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">how to pay ? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>You can use the Visa card or the Orange Money application</p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"id="qicon"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-5" class="collapsed">Where are you located? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    We are a website so you will find us everywhere :) And we don't have an administration
                                    site yet </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"id="qicon"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-5" class="collapsed">What are the cities in which you provide
                                your services?<i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    We are currently working in the city of Amman and Zarqa.. Soon we will be in attendance
                                    in all the cities of the Kingdom. </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100"> 

                    <div class="section-title">
                    <h2>Available Sitter</h2>
                    </div>

                    
                    <div class="swiper-wrapper">
                    
                    @foreach ($sitter as $data )
                    
                        @php
                             $user = App\Models\User::find($data->users_id);
                             $pending=App\Models\Pending::find($data->pending_id);
                            $kind = App\Models\Kind::find($pending->kinds_id);

                        @endphp
                    @if ($data->available==1)
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="{{asset('upload/image/'.$user->image)}}" class="testimonial-img"
                                        alt="">
                                    <h3>{{ $user->name }}</h3>
                                    <h4>{{ $kind->name }}</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                       {{ $data->description}}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                    <div class="sitterbtnDiv">
                                       
                                            <a class="btn btn-primary" id="sitterbtn" href="{{route('sitterprofile', $data->id)}}">Show profile</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                        @endif
                         @endforeach
                        
                    
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->




    </main><!-- End #main -->
@endsection
