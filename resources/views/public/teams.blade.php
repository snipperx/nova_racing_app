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
                <h3 style="text-align:center; font-weight: bold;">Teams</h3>
                <p><br></p>
                <table class="table">
                    <tr>

                        <th scope="col"> Name</th>
                        <th scope="col">Nationality</th>

                    </tr>
                    <tbody>
                    @foreach ($teams as  $team)
                        <tr>
                            <td> {{ $team->name ?? ''}}</td>
                            <td> {{ $team->nationality ?? ''}}</td>

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
