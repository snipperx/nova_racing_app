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
                <h3 style="text-align:center; font-weight: bold;">list of Circuits</h3>
                <p><br></p>
                <table class="table">
                    <tr>

                        <th class="wd-15p">#</th>
                        <th class="wd-15p">Name of circuit</th>
                        <th class="wd-20p">location</th>
                        <th class="wd-15p">length</th>
                        <th class="wd-10p">lap record</th>

                    </tr>
                    <tbody>
                    @foreach ($circuits as  $circuit)
                        <tr>
                            <td> {{ $circuit->image ?? ''}}</td>
                            <td> {{ $circuit->name ?? ''}}</td>
                            <td> {{ $circuit->location ?? ''}}</td>
                            <td> {{ $circuit->length ?? ''}}</td>
                            <td> {{ $circuit->lap_record ?? ''}}</td>

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
