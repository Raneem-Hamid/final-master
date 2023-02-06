@extends('layouts.master')

@section('content')
 <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row">
                    <div
                        class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
                        <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a> -->
                    </div>

                    <div
                        class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h3>About us</h3>
                        <p>Founded in November 2022, the MAMYEYES is a website aimed at families who want to put their
                            children in the hands of trusted babysitters. The recruitment process takes place in three
                            stages:</p>

                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-clipboard-check"></i></div>
                            <h4 class="title">Receiving applications and interviews</h4>
                            <p class="description">We review and evaluate applications, then conduct several personal
                                interviews and select qualified babysitters</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-shield-check"></i></div>
                            <h4 class="title">Comprehensive medical examination</h4>
                            <p class="description">The safety of your children is our priority, so we conduct tests to
                                ensure the safety of our babysitters</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-easel"></i></div>
                            <h4 class="title">Education and Training</h4>
                            <p class="description">Providing an educational material on first aid and modern child care
                                methods</p>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Departments Section ======= -->
        <section id="departments" class="departments">
            <div class="container">

                <div>
                    <!-- <h2>Departments</h2> -->
                    <p>Our babysitters are classified into 3 sections according to scientific and practical qualifications
                    </p>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Junior Sitters</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Standard Sitters</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Advanced Sitters</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Junior Sitters</h3>
                                        <p class="fst-italic">Babysitting, petting, reading stories to him, paying attention
                                            to him and his needs in general, while providing a meal according to the
                                            mother's request and choice. Its price is the lowest among all the categories
                                        </p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="../img/department-1.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Standard Sitters</h3>
                                        <p class="fst-italic">In addition to the tasks of the regular babysitter, she will
                                            follow up on the child's lessons or establish the child educationally (letters,
                                            numbers, Quran .. etc.), most of the babysitters in this category are actually
                                            teachers in schools. Its price is a little more than a Junior Sitters but it is
                                            in the reasonable range</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="../img/departments-2.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Advanced Sitters</h3>
                                        <p class="fst-italic">It serves as an aid to the mother in raising the child and
                                            providing him with advanced skills, such as teaching languages, teaching arts
                                            such as drawing, sculpture, cooking, music, etc., teaching etiquette and style
                                            ... etc. These skills are personal skills that an expert nanny possesses and has
                                            strength in, and it is not required here that they be linked With academic
                                            qualifications (innate skill, accumulated experience). It is considered the most
                                            expensive due to the skill it will provide for the child during babysitting</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="../img/departments-3.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Departments Section -->



  @endsection