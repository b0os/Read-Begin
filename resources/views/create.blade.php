@extends('master')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<!-- Succsess message displayed -->

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



<!-- form here -->


<div class="container-fluied  form py-4">
        <div class="row m-0">
            <div class="signup">
                <div class="header col-9">
                    <h2 id="singupMsg">{{ __('messages.Create_account') }}</h2>
                </div>
                <div class="form d-flex flex-column col-9 align-items-center">
                    <form class="col-12" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="inputs col-12 gap-2 d-flex flex-column align-items-center">
                            <div class="input position-relative col-12">
                                <label for="name">{{ __('messages.Full_Name') }}</label>
                                <input type="text" name="fullname" id="name" placeholder="{{ __('messages.Fullname_pls') }}"
                                    class="col-7" />
                                <img id="v-name" class="valid-icon" src="{{ asset('images/download.svg') }}" alt="" />
                                <img id="inv-name" class="invalid-icon" src="{{ asset('images/invalid.svg') }}" alt="" />
                            </div>
                            <div class="input position-relative col-12">
                                <label for="user_name">{{ __('messages.username') }}</label>
                                <input type="text" name="user_name" id="username" placeholder="{{ __('messages.Username_pls') }}"
                                    class="col-7" />
                                <img id="v-userName" class="valid-icon" src="{{ asset('images/download.svg') }}" alt="" />
                                <img id="inv-userName" class="invalid-icon" src="{{ asset('images/invalid.svg') }}" alt="" />
                            </div>
                            <div class="input position-relative col-12">
                                <label for="email">{{ __('messages.Email') }}</label>
                                <input type="text" name="email" id="email" placeholder="{{ __('messages.Email_pls') }}"
                                    class="col-7" />
                                <img id="v-mail" class="valid-icon" src="{{ asset('images/download.svg') }}" alt="" />
                                <img src="{{ asset('images/invalid.svg') }}" alt="" id="inv-mail" class="invalid-icon" alt="" />
                            </div>
                            <div class="input position-relative col-12">
                                <label for="pass">{{ __('messages.Password') }}</label>
                                <input type="password" name="password" id="pass" placeholder="{{ __('messages.Password_pls') }}"
                                    class="col-7" />
                                <button type="button" id="eye"><i class="fa-solid fa-eye"></i></button>
                                <button type="button" id="eye-slash">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </button>
                                <img id="v-img" class="valid-icon-pass" src="{{ asset('images/download.svg') }}" alt="" />
                                <img id="inv-img" class="invalid-icon-pass" src="{{ asset('images/invalid.svg') }}" alt=""
                                    data-bs-placemen="top" data-bs-toggle="popover" data-bs-title="Password"
                                    data-bs-content="At least 8 chars
                    At least 1 uppercase char
                    At least 1 number
                    At least 1 special character (!@#$%^)
                    No sapces ' '
                    " />
                                <span>{{ __('messages.PassCheckLetters') }}</span>
                            </div>
                            <div class="input position-relative col-12">
                                <label for="repass">{{ __('messages.Confirm_password') }}</label>
                                <input type="password" name="confirmpassword" id="re-pass"
                                    placeholder="{{ __('messages.RePassword_pls') }}" class="col-7" />
                                <button type="button" id="eye-re"><i class="fa-solid fa-eye"></i></button>
                                <button type="button" id="eye-slash-re">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </button>
                                <img id="rev-img" class="valid-icon" src="{{ asset('images/download.svg') }}" alt="" />
                                <img id="reinv-img" class="invalid-icon" src="{{ asset('images/invalid.svg') }}" alt="">
                            </div>
                            <div class="input position-relative col-12">
                                <label for="address">{{ __('messages.Address') }}</label>
                                <input type="text" name="address" id="address" placeholder="{{ __('messages.Address_pls') }}"
                                    class="col-7" />
                                <img id="v-address" class="valid-icon" src="{{ asset('images/download.svg') }}" alt="" />
                                <img id="inv-address" class="invalid-icon" src="{{ asset('images/invalid.svg') }}" alt="" />
                            </div>
                            <div class="input position-relative col-12">
                                <label for="phone">{{ __('messages.Phone') }}</label>
                                <input type="text" name="phone" id="phone" placeholder="{{ __('messages.Phone_pls') }}"
                                    class="col-7" />
                                <img id="v-phone" class="valid-icon" src="{{ asset('images/download.svg') }}" alt="" />
                                <img id="inv-phone" class="invalid-icon" src="{{ asset('images/invalid.svg') }}" alt="" />
                            </div>
                            <div class="input position-relative col-12 d-flex justify-content-between align-items-end">
                                <div class="input position-relative col-5 h-100">
                                    <label for="bd">{{ __('messages.Birthdate') }}</label>
                                    <input id="bd" name="birthdate" type="date">
                                </div>
                                <div class="col-1">
                                    <button disabled id="search" class="position-relative" type="button">
                                        {{ __('messages.actor_Birthdate') }}
                                        <lord-icon src="https://cdn.lordicon.com/ybaojceo.json">
                                        </lord-icon>
                                    </button>

                                </div>
                                <div class="input position-relative col-5">
                                    <label for="photo">{{ __('messages.Personal_Photo') }}</label>
                                    <input type="file" name="photo" id="photo">
                                </div>
                            </div>
                        </div>
                        <div class="policies my-3 d-flex align-items-start">
                            <input class="form-check-input mt-0" type="checkbox" value="accept" id="polices"
                                aria-label="Checkbox for following text input" />
                            <label for="pol" class="d-none"></label>
                            <h6 class="mx-2">
                            {{ __('messages.Policy_agree') }}
                            </h6>
                        </div>
                        <div class="signup-btn col-12 d-flex justify-content-center">
                            <button  disabled type="submit" id="signup" class="w-50">{{ __('messages.SignUp_btn') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="layer" class="layer ">
    </div>


    <div id="side-menu" class="open position-fixed ">
        <div class="open-icon position-absolute">
            <label for="check">
                <input type="checkbox" value="checked" id="check" />
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <div class="container min-vh-100 py-4">
            <div class="header position-relative">
                <h2 class="text-center">{{ __('messages.actors_Text1') }}</h2>
                <h2 class="text-center" id='thisDay'></h2>
                <button class="position-fixed top-0" id="close">{{ __('messages.close') }}</button>
            </div>

            <div id="actors-area" class="row gap-2  flex-column h-100">
                <h3 class="text-center my-5">{{ __('messages.Actor_select_bd_first') }}</h3>
            </div>

        </div>
    </div>




    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script type="module" src="{{ asset('js/validator.js') }}"></script>
    <script type="module" src="{{ asset('js/API_Ops.js') }}"></script>
    <script src="{{ asset('js/langs_handel.js') }}"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

@endsection('content')


