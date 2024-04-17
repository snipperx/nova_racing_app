@include('public.layouts.header')

<body>
@include('public.layouts.nav')
<div>
    <div class="container">
        <div class="row">
            @include('public.layouts.sidebar')
            <div class="col-md-9">
                <h3 style="text-align:center; font-weight: bold;"></h3>
                <div style="text-align:center; vertical-align:middle;">
                    <img src="{{ asset('img/catalunya.png') }}" style="width:550px;height:350px; margin:auto;">
                </div>
                <p><br></p>
                <h3 style="text-align:center; font-weight: bold;">Latest Results</h3>
                <p><br></p>
                <table class="table">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Full name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Time</th>
                    </tr>
                    <tbody>
                    @foreach ($results as  $result)
                        <tr>
                            <th scope="row"><img src="{{ $result->driver->avatar }}" style="height:40px;width:40px;" alt=""></th>
                            <td>{{ $result->driver->name ?? '' }}</td>
                            <td>{{ $result->podium_position ?? '' }}</td>
                            <td>{{ $result->race_time ?? ''}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
