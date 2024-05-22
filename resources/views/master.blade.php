<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Read Begin Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('css/ar.css') }}">
    @endif

    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>




</head>
<body>
    <div class="container mt-5">

        <!-- Header here -->
        <div id="header" class="container">
        <nav class="py-3">
            <div class="row justify-content-between align-items-center">
                <div class="logoimg">
                    <img class="col-md-6" src="{{ asset('images/Logo transperent 1.png') }}" alt="Read begin logo" />
                </div>


            </div>

            <!-- languages -->
            <div class="btn-group-lg">
                <a class="btn btn-primary" style="border-radius: 10px;" href="{{ route('langConvertor', 'ar')}}">ar</a>
                <a class="btn btn-primary" style="border-radius: 10px;" href="{{ route('langConvertor', 'en')}}">en</a>
            </div>

        </nav>
    </div>


        <main>
        @yield('content')
        </main>

        <!-- Footer  here -->

           <div class="container-fluid justify-content-center footer">

        <hr class="mx-0 px-0">
        <footer>
            <div class="row justify-content-around mb-0 pt-3 pb-0 ">
                <div class=" col-11">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-12  d-flex flex-column font-italic align-items-start mt-md-3 mt-4">
                            <h5 class="d-flex align-items-center ">
                                <span> <img src="{{ asset('images/development.svg') }}" class="img-fluid me-2 "></span><b
                                    class="text-dark"> FCAI-<span class="text-muted">
                                        CU</span></b>
                            </h5>
                            <p class="social mt-md-3 mt-2"> <span><i class="fa fa-facebook "
                                        aria-hidden="true"></i></span> <span><i class="fa fa-linkedin"
                                        aria-hidden="true"></i></span> <span><i class="fa fa-twitter"
                                        aria-hidden="true"></i></span> </p> <small
                                class="copy-rights cursor-pointer">&copy; 2024 FCAI-CU Development</small><br>
                            <small>{{ __('messages.copyRights') }}</small>
                        </div>
                        <div
                            class="col-md-4 col-12 my-sm-0 mt-5 d-flex justify-content-center align-items-center mx-auto flex-column al">
                            <ul class="list-unstyled me-5 text-center">
                                <li class="mt-md-3 mt-4 me-5">{{ __('messages.sol') }}</li>
                                <li class="me-5">{{ __('messages.intgr') }}</li>
                                <li class="me-5">{{ __('messages.Core') }}</li>
                                <li class="me-5">{{ __('messages.Product') }}</li>
                                <li class="me-5">{{ __('messages.Pricing') }}</li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-12 my-sm-0 mt-5">
                        <div class="card border-0">
                                <div class="card-body text-center ">
                                    <h2><b id="org">{{ __('messages.contactMsg1') }}</b></h2>
                                    <p class="pl-0 ml-0 mb-5">{{ __('messages.FindOut') }}</p>
                                    <div class="row text-center justify-content-between">
                                        <div class="col-auto">
                                            <div class="input-group-lg input-group mb-3 no-shadow"><input type="text"
                                                    class="form-control" placeholder="{{ __('messages.Email_pls') }}"
                                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                                <div class="input-group-append"><button class="btn myBtn btn-success"
                                                        type="button" id="button-addon2"> <b>{{ __('messages.SubmitContactUs') }}</b></button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    </div>




    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


</body>
</html>
