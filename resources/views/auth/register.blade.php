@extends('layouts.app')

<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">

@section('content')
<body class="bg-pink-300" translate="no">
	<div class="section">
		  <div class="container">
			  <div class="row full-height justify-content-center">
				  <div class="col-12 text-center align-self-center py-5">
					  <div class="section pb-5 pt-5 pt-sm-2 text-center">
						  <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
							<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" checked>
							<label for="reg-log"></label>
						  <div class="card-3d-wrap mx-auto">
							  <div class="card-3d-wrapper">
								  <div class="card-front">
									  <div class="center-wrap">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
										  <div class="section text-center">
											  <h4 class="mb-4 pb-3 text-white text-lg">Log In</h4>
											  <div class="form-group">

												  <input type="email" class="form-style" placeholder="Your Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus">
												  <i class="input-icon uil uil-at"></i>
											  </div>	
											  <div class="form-group mt-2">
												  <input type="password" class="form-style" placeholder="Your Password" name="password" @error('password') is-invalid @enderror" required autocomplete="current-password">
												  <i class="input-icon uil uil-lock-alt"></i>
											  </div>
											  <input type="submit" value="Submit" class="btn w-3/5 text-white cursor-pointer bg-indigo-800 mt-4"></input>
                                              @if (Route::has('password.request'))
											  <p class="mb-0 mt-4 text-center"><a href="{{ route('password.request') }}" class="link">Forgot your password?</a></p>
                                                @endif
                                              <span class="text-white">@error('email'){{( $message )}} @enderror</span>
                                              <span class="text-white">@error('password'){{( $message )}} @enderror</span>
                                            </div>
                    </form>
										</div>
									</div>
								  <div class="card-back overflow-y-scroll">
									  <div class="center-wrap overflow-visible">
										  <div class="section text-center overflow-visible">
                        <form method="POST" action="{{ route('register') }}">
                          @csrf
											  <h4 class="text-white text-lg py-4 mt-72 overflow-visible">Sign Up</h4>
											  <div class="form-group">
                          <input id="name" type="text" class="form-style @error('name') is-invalid @enderror" name="name" placeholder="Your Name" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
												  <i class="input-icon uil uil-user"></i>
                          <span class="text-white">@error('name') {{ $message }} @enderror</span>
											  </div>	
											  <div class="form-group mt-2 overflow-visible">
												  <input id="email" type="email" class="form-style @error('email') is-invalid @enderror" name="email" placeholder="Your Email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
												  <i class="input-icon uil uil-at"></i>
                          <span class="text-white">@error('email') {{ $message }} @enderror</span>
											  </div>
                                            <div class="form-group mt-2 overflow-visible">
                                                <input type="text" onkeypress='validate(event)' name="phonenumber" id="phonenumber" class="form-style @error('phonenumber') is-invalid @enderror" placeholder="Your Phone Number" required autocomplete="phone">
                                                @error('phonenumber')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                                <i class="input-icon uil uil-phone"></i>
                                                <span class="text-white">@error('phonenumber') Invalid format. Supported formats: 09 or +63 @enderror</span>
                                            </div>
                                            <!-- 	 -->
                                            <div class="form-group mt-2 overflow-visible">
                                                <input type="text" name="address" id="address" class="form-style" placeholder="Your Detailed Address" required autocomplete="address">
                                                <i class="input-icon uil uil-map-marker"></i>
                                            </div>

                                          {{-- <div class="form-group mt-2 overflow-visible">
                                            <select class="form-style" name="city" id="city" required>
                                              <option value="" disabled selected>Your Municipality</option>
                                              <option value="Torrijos">Torrijos</option>
                                              <option value="Santa Cruz">Santa Cruz</option>
                                          </select>
                                              <i class="input-icon uil uil-map-marker"></i>
                                          </div> --}}

                                            <div class="form-group mt-2 overflow-visible">
                                              <select class="form-style" name="city" id="city" required>
                                                <option value="" disabled selected>Your Barangay</option>
                                                <option value="Bolo">Bolo</option>
                                                <option value="Bonliw">Bonliw</option>
                                                <option value="Cagpo">Cagpo</option>
                                                <option value="Kay Duke">Kay Duke</option>
                                                <option value="Mabuhay">Mabuhay</option>
                                                <option value="Malinao">Malinao</option>
                                                <option value="Marlangga">Marlangga</option>
                                                <option value="Matuyatuya">Matuyatuya</option>
                                                <option value="Pakaskasan">Pakaskasan</option>
                                                <option value="Poblacion">Poblacion</option>
                                                <option value="Poctoy">Poctoy</option>
                                                <option value="Suha">Suha</option>

                                                <option value="Bagong Silang Pob. (2nd Zone)">Bagong Silang Pob. (2nd Zone)</option>
                                                <option value="Banahaw Pob. (3rd Zone Pob.)">Banahaw Pob. (3rd Zone Pob.)</option>
                                                <option value="Buyabod">Buyabod</option>
                                                <option value="Lapu-lapu Pob. (5th Zone)">Lapu-lapu Pob. (5th Zone)</option>
                                                <option value="Maharlika (1st Zone)">Maharlika (1st Zone)</option>
                                                <option value="Masaguisi">Masaguisi</option>
                                                <option value="Matalaba">Matalaba</option>
                                                <option value="Napo (Malabon)">Napo (Malabon)</option>
                                                <option value="Pag-Asa Pob. (4th Zone)">Pag-Asa Pob. (4th Zone)</option>
                                                <option value="Tamayo">Tamayo</option>
                                                <option value="Tawiran">Tawiran</option>
                                                <option value="Taytay">Taytay</option>
                                              </select>
                                                <i class="input-icon uil uil-map-marker"></i>
                                            </div>                       

                                            <!-- <div class="form-group mt-2 overflow-visible">
                                              <input type="text" name="zipcode" id="zipcode" class="form-style" placeholder="Your Zipcode" required autocomplete="zipcode">
                                              <i class="input-icon uil uil-map-marker"></i>
                                          </div>		 -->
											  <div class="form-group mt-2 overflow-hidden">
                          <input id="password" type="password" class="form-style @error('password') is-invalid @enderror" name="password" placeholder="Your Password" required autocomplete="new-password">
												  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          <i class="input-icon uil uil-lock-alt"></i>
                          <span class="text-white">@error('password') {{ $message }} @enderror</span>
											  </div>
                                              <div class="form-group mt-2 overflow-hidden">
                                                <input id="password-confirm" type="password" class="form-style" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <input type="submit" value="Submit" class="btn w-3/5 mb-4 text-white cursor-pointer bg-indigo-800 mt-4"></input>
                        </form>
                       </div>                   
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		  </div>
	  </div>
@endsection

<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');
    
    body{
        font-family: 'Poppins', sans-serif;
        font-weight: 300;
        font-size: 15px;
        line-height: 1.7;
        color: #ffffff;
        background-image: linear-gradient(#f9a8d4, #a5b4fc);
        overflow-x: hidden;
    }

    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

    a {
        cursor: pointer;
      transition: all 200ms linear;
    }
    a:hover {
        text-decoration: none;
    }
    .link {
      color: #c4c3ca;
    }
    .link:hover {
      color: #ffeba7;
    }
    p {
      font-weight: 500;
      font-size: 14px;
      line-height: 1.7;
    }
    h4 {
      font-weight: 600;
    }
    h6 span{
      padding: 0 20px;
      text-transform: uppercase;
      font-weight: 700;
    }
    .section{
      position: relative;
      width: 100%;
      display: block;
    }
    .full-height{
      min-height: 100vh;
    }
    [type="checkbox"]:checked,
    [type="checkbox"]:not(:checked){
      position: absolute;
      left: -9999px;
    }
    .checkbox:checked + label,
    .checkbox:not(:checked) + label{
      position: relative;
      display: block;
      text-align: center;
      width: 60px;
      height: 16px;
      border-radius: 8px;
      padding: 0;
      margin: 10px auto;
      cursor: pointer;
      background-color: #ffeba7;
    }
    .checkbox:checked + label:before,
    .checkbox:not(:checked) + label:before{
      position: absolute;
      display: block;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      color: #ffeba7;
      background-color: #102770;
      font-family: 'unicons';
      content: '\eb4f';
      z-index: 20;
      top: -10px;
      left: -10px;
      line-height: 36px;
      text-align: center;
      font-size: 24px;
      transition: all 0.5s ease;
    }
    .checkbox:checked + label:before {
      transform: translateX(44px) rotate(-270deg);
    }
    
    
    .card-3d-wrap {
      position: relative;
      width: 440px;
      max-width: 100%;
      height: 450px;
      -webkit-transform-style: preserve-3d;
      transform-style: preserve-3d;
      perspective: 800px;
      margin-top: 40px;
    }
    .card-3d-wrapper {
      width: 100%;
      height: 100%;
      position:absolute;    
      top: 0;
      left: 0;  
      -webkit-transform-style: preserve-3d;
      transform-style: preserve-3d;
      transition: all 600ms ease-out; 
    }
    .card-front, .card-back {
      width: 100%;
      height: 100%;
      background-color: #EF6079FF;
      background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg');
      background-position: bottom center;
      background-repeat: no-repeat;
      background-size: 300%;
      position: absolute;
      border-radius: 6px;
      left: 0;
      top: 0;
      -webkit-transform-style: preserve-3d;
      transform-style: preserve-3d;
      -webkit-backface-visibility: hidden;
      -moz-backface-visibility: hidden;
      -o-backface-visibility: hidden;
      backface-visibility: hidden;
    }
    .card-back {
      transform: rotateY(180deg);
    }
    .checkbox:checked ~ .card-3d-wrap .card-3d-wrapper {
      transform: rotateY(180deg);
    }
    .center-wrap{
      position: absolute;
      width: 100%;
      padding: 0 35px;
      top: 50%;
      left: 0;
      transform: translate3d(0, -50%, 35px) perspective(100px);
      z-index: 20;
      display: block;
    }
    
    
    .form-group{ 
      position: relative;
      display: block;
        margin: 0;
        padding: 0;
    }
    .form-style {
      padding: 13px 20px;
      padding-left: 55px;
      height: 48px;
      width: 100%;
      font-weight: 500;
      border-radius: 4px;
      font-size: 14px;
      line-height: 22px;
      letter-spacing: 0.5px;
      outline: none;
      color: #c4c3ca;
      background-color: #831843;
      border: none;
      -webkit-transition: all 200ms linear;
      transition: all 200ms linear;
      box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
    }
    .form-style:focus,
    .form-style:active {
      border: none;
      outline: none;
      box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
    }
    .input-icon {
      position: absolute;
      top: 10px;
      left: 18px;
      height: 48px;
      font-size: 24px;
      line-height: 48px;
      text-align: left;
      color: #0ea5e9;
      -webkit-transition: all 200ms linear;
        transition: all 200ms linear;
    }
    
    .form-group input:-ms-input-placeholder  {
      color: #c4c3ca;
      opacity: 0.7;
      -webkit-transition: all 200ms linear;
        transition: all 200ms linear;
    }
    .form-group input::-moz-placeholder  {
      color: #c4c3ca;
      opacity: 0.7;
      -webkit-transition: all 200ms linear;
        transition: all 200ms linear;
    }
    .form-group input:-moz-placeholder  {
      color: #c4c3ca;
      opacity: 0.7;
      -webkit-transition: all 200ms linear;
        transition: all 200ms linear;
    }
    .form-group input::-webkit-input-placeholder  {
      color: #c4c3ca;
      opacity: 0.7;
      -webkit-transition: all 200ms linear;
        transition: all 200ms linear;
    }
    .form-group input:focus:-ms-input-placeholder  {
      opacity: 0;
      -webkit-transition: all 200ms linear;
        transition: all 200ms linear;
    }
    .form-group input:focus::-moz-placeholder  {
      opacity: 0;
      -webkit-transition: all 200ms linear;
        transition: all 200ms linear;
    }
    .form-group input:focus:-moz-placeholder  {
      opacity: 0;
      -webkit-transition: all 200ms linear;
        transition: all 200ms linear;
    }
    .form-group input:focus::-webkit-input-placeholder  {
      opacity: 0;
      -webkit-transition: all 200ms linear;
        transition: all 200ms linear;
    }
    
    .btn{  
      border-radius: 4px;
      height: 44px;
      font-size: 13px;
      font-weight: 600;
      text-transform: uppercase;
      -webkit-transition : all 200ms linear;
      transition: all 200ms linear;
      padding: 0 30px;
      letter-spacing: 1px;
      display: -webkit-inline-flex;
      display: -ms-inline-flexbox;
      display: inline-flex;
      -webkit-align-items: center;
      -moz-align-items: center;
      -ms-align-items: center;
      align-items: center;
      -webkit-justify-content: center;
      -moz-justify-content: center;
      -ms-justify-content: center;
      justify-content: center;
      -ms-flex-pack: center;
      text-align: center;
      border: none;
      background-color: rgb(190, 201, 255);
      color: #102770;
      box-shadow: 0 8px 24px 0 rgba(255,235,167,.2);
    }
    .btn:active,
    .btn:focus{  
      background-color: #102770;
      color: #ffeba7;
      box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
    }
    .btn:hover{  
      background-color: #102770;
      color: black;
      box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
    }
    
    .logo {
        position: absolute;
        top: 30px;
        right: 30px;
        display: block;
        z-index: 100;
        transition: all 250ms linear;
    }
    .logo img {
        height: 26px;
        width: auto;
        display: block;
    }
    </style>	

<script>
  function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>
