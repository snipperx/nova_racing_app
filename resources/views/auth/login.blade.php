@include('layouts.partials.head')

<div class="am-signin-wrapper">
    <div class="am-signin-box">
        <div class="row no-gutters">
            <div class="col-lg-5">
                <div class="image-container">

                </div>
            </div>
            <div class="col-lg-7">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h5 class="tx-gray-800 mg-b-25">Admin Login</h5>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Email') }}:</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" placeholder="Enter your email address"
                               required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div><!-- form-group -->

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Password') }}:</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" placeholder="Enter your password" required
                               autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div><!-- form-group -->

                    <button type="submit" class="btn btn-block">
                        {{ __('Login') }}
                    </button>
                    <br>
                    @if (Route::has('password.request'))
                        <a class="form-group mg-b-20" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>
            </div><!-- col-7 -->
        </div><!-- row -->
    </div>
</div>

@include('layouts.partials.footer')
<script src="{{ asset('js/global.js') }}"></script>
</body>
</html>
