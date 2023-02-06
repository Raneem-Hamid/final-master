@extends('layouts.master')

@section('head')
    <link href="{{ asset('css/booking.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
@endsection

@section('content')
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
    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div id="bigdiv">
                    <form id="regForm" method="POST" action="{{ route('makeappointment') }}">
                        @csrf

                        {{-- <h1 id="register">Donate</h1> --}}
                        <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span>
                            <span class="step"></span> <span class="step"></span>
                            {{-- <span class="step"></span><span class="step"></span> --}}
                            <span class="step"></span>
                        </div>
                        <div class="tab">
                            <h1 id="register">Your Information</h1>
                            <p><input placeholder="Your Name" name="name"
                                    value="{{ old('name', Auth::user()->name) }}"readonly></p>
                            <p><input placeholder="Email"
                                    name="email"value="{{ old('name', Auth::user()->email) }}"readonly></p>
                            <p><input placeholder="Phone"
                                    name="phone"value="{{ old('name', Auth::user()->phone) }}"readonly></p>
                            <p><select name="city" id="city" class="form-select">
                                    <option value="">Select City</option>
                                    <option value=" amman">Amman</option>
                                    <option value="zarqa">Zarqa</option>
                                </select></p>
                            <p><input placeholder="Street Address" oninput="this.className = ''" name="street"></p>
                            <p><input placeholder="Building Number" oninput="this.className = ''" name="building"
                                    type="number"></p>
                            <p><input placeholder="Date" oninput="this.className = ''" name="day" type="date"></p>
                            <p>
                            <div class="row">
                                <div class="col-md-6 form-group mt-1">
                                    <label for="timefrom" class=" fs-6">From</label>
                                    <input placeholder="timefrom" oninput="this.className = ''" name="from"
                                        type="time">
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group mt-1">
                                    <label for="timefrom" class=" fs-6">To</label>
                                    <input placeholder="timefrom" oninput="this.className = ''" name="to"
                                        type="time">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            </p>

                        </div>
                        <div class="tab">
                            <h1 id="register">The child information</h1>

                            <p><input type="text" placeholder="Name" oninput="this.className = ''" name="fchname"></p>
                            <p><input placeholder="Age" oninput="this.className = ''" name="fchage" type="number"></p>
                            <h5>Does the child have health problems?</h5>
                            <label class="container">No
                                <input type="radio" value="0" checked="checked" name="problems">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Yes
                                <input type="radio" value="1" name="problems">
                                <span class="checkmark"></span>
                            </label>
                            <p>
                                <textarea name="explain" placeholder="Explain the problem(if found)"></textarea>
                            </p>

                        </div>
                        {{-- <div class="tab">
                            <h1 id="register">Second child information</h1>

                            <p><input type="text" placeholder="Name" oninput="this.className = ''" name="schname"></p>
                            <p><input placeholder="Age" oninput="this.className = ''" name="schage" type="number"></p>
                            <h5>Does the child have health problems?</h5>
                            <label class="container">No
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Yes
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <p>
                                <textarea placeholder="Explain the problem(if found)"></textarea>
                            </p>

                        </div>
                        <div class="tab">
                            <h1 id="register">Third child information</h1>

                            <p><input type="text" placeholder="Name" oninput="this.className = ''" name="tchname">
                            </p>
                            <p><input placeholder="Age" oninput="this.className = ''" name="tchage" type="number"></p>
                            <h5>Does the child have health problems?</h5>
                            <label class="container">No
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Yes
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <p>
                                <textarea placeholder="Explain the problem(if found)"></textarea>
                            </p>

                        </div> --}}

                        <div class="tab">
                            <div class="col-md-full form-group mt-3">
                                <select name="sitter_id" id="sitter" class="form-select">
                                    <option selected disabled value="">Kind of sitter</option>
                                    @foreach ($sitter as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                <div class="validate"></div>
                            </div>

                            <div class="col-md-full form-group mt-3 mb-3">
                                <select name="department" id="department" class="form-select">

                                </select>
                                <div class="validate"></div>
                            </div>

                        </div>

                        <div class="tab">
                            <div class="col-md-full mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="" alt="Admin" class="image rounded-circle"
                                                width="150">
                                            <div class="mt-3">
                                                <h4 class="name"></h4>
                                                <p class="text-secondary mb-1 role"></p>
                                                <p class="text-secondary mb-1"><a href="tel:00962778083610"
                                                        class="text-muted phone"></a></p>
                                                <p class="text-muted font-size-sm "><a href="mailto:contact@example.com"
                                                        class="text-muted email"></a></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab">

                            <form action="">
                                <div class="inputBox">
                                    <span>card number</span>
                                    <input type="text" maxlength="16" class="card-number-input"id="inputs">
                                </div>
                                <div class="inputBox">
                                    <span>card holder</span>
                                    <input type="text" class="card-holder-input" id="inputs">
                                </div>
                                <div class="flexbox">
                                    <div class="inputBox">
                                        <span>expiration mm</span>
                                        <select name="" class="month-input" id="inputs">
                                            <option value="month" selected disabled>month</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="inputBox">
                                        <span>expiration yy</span>
                                        <select name="" id="inputs" class="year-input">
                                            <option value="year" selected disabled>year</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                    </div>
                                    <div class="inputBox">
                                        <span>cvv</span>
                                        <input type="text" maxlength="4" class="cvv-input" id="inputs">
                                    </div>
                                </div>
                                {{-- <input type="submit" value="submit" class="submit-btn" id="inputs"> --}}
                            </form>

                        </div>

                        <div class="thanks-message text-center" id="text-message"> <img src="img/true.png"
                                width="100" class="mb-4">
                            <h3>Thanks for submitting your request!</h3> <span>You will be contacted within minutes!</span>
                        </div>
                        <div style="overflow:auto;" id="nextprevious">
                            <div style="float:right;"> <button type="button" id="prevBtn"
                                    onclick="nextPrev(-1)">Previous</button> <button type="button" id="nextBtn"
                                    onclick="nextPrev(1)">Next</button> </div>
                            {{-- <button type="submit">Submit</button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/booking.js') }}"></script>
    {{-- <script src="{{ asset('js/card.js') }}"></script> --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('select[name=sitter_id]').change(function() {
            var val = $(this).val();
            if (val) {


                $.ajax({
                        type: 'GET',
                        url: "{{ URL::to('appointment/getpending') }}/" + val,

                        success: function(data) {
                            $('select[name="department"]').empty();
                            $('select[name="department"]').append(
                                '<option selected disabled اختر.....</option>');
                            $.each(data.data, function(key, value) {
                                    console.log(value.users);

                                    $('select[name="department"]').append(
                                        '<option data-image="' + value.users.image +
                                        '"  data-email="' + value.users.email + '" data-phone="' +
                                        value.users.phone + '" data-name="' + value.users.name +
                                        '" value="' + value['id'] +
                                        '">' + value.users.name + '</option>');

                                    $('select[name="department"]').on('change', function() {
                                            var flagsUrl = '{{ URL::asset('image') }}';
                                            var name = $('select[name="department"]').find(
                                                ":selected").data('name')
                                            var email = $('select[name="department"]').find(
                                                ":selected").data('email');
                                            var phone = $('select[name="department"]').find(
                                                ":selected").data('phone');
                                            var image = $('select[name="department"]').find(
                                                ":selected").data('image');

                                            $('.name').html(name);
                                            $('.phone').html(phone);
                                            $('.email').html(email);
                                            $('.email').attr('href', 'mailto:' + phone);
                                            $('.image').attr('src', 'http://127.0.0.1:8000/upload/image/'+image);
                                             $('.phone').attr('href', 'tel:' + phone);

                                    });

                            });
                    },
                });
        }
        });
    </script>
@endsection
