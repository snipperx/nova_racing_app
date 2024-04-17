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
                <h3 style="text-align:center; font-weight: bold;">Upcoming Events</h3>
                <p><br></p>
                <table class="table">
                    <tr>
                        <th class="wd-15p">#</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">Date</th>
                        <th class="wd-20p">Venue</th>
                        <th class="wd-15p">Race Coordinator</th>

                    </tr>
                    <tbody>
                     @foreach ($events as  $event)
                        <tr>
                            <td> {{ $event->id ?? ''}}</td>
                            <td> {{ $event->name ?? ''}}</td>
                            <td> {{ $event->date ?? ''}}</td>
                            <td> {{ $event->circuit->name ?? ''}}</td>
                            <td> {{ $event->race_coordinator ?? ''}}</td>

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
