<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-light navbar-expand-md navigation-clean">
                    <div class="container"><a class="navbar-brand" href="welcome.php">F1 Fantasy</a>
                        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span
                                class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navcol-1">

                            @if (Route::has('login'))
                                <ul class="nav navbar-nav ml-auto">
                                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('login') }}">Log
                                            In</a></li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
