@include('public.layouts.header')

<body>
@include('public.layouts.nav')
<div>
    <div class="container">
        <div class="row">
            @include('public.layouts.sidebar')


            <div class="col-md-9">
                <p><br></p>
                <h3 style="text-align:center; font-weight: bold;">Drivers</h3>
                <p><br></p>
                <div class="container">
                    <div class="row">


                        @foreach($drivers as $driver)
                            <div class="col-sm-3 mb-4">
                                <div class="card">
                                    <img src="{{ $driver->avatar }}" class="card-img-top" alt="Driver Image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $driver->name ?? '' }}</h5>
                                        <p class="card-text">Team: {{ $driver->team->name ?? '' }}</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('public_f1/js/jquery.min.js') }}"></script>
<script src="{{ asset('public_f1/js/js/bootstrap.min.js') }}"></script>
</body>
</html>
