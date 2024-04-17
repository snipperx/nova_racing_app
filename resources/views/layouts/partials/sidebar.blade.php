<div class="am-sideleft">
    <ul class="nav am-sideleft-tab">
        <li class="nav-item">
            <a href="#mainMenu" class="nav-link active"></a>
        </li>
        <li class="nav-item">
            <a href="#mainMenu" class="nav-link"></a>
        </li>
        <li class="nav-item">
            <a href="#mainMenu" class="nav-link"></a>
        </li>
        <li class="nav-item">
            <a href="#mainMenu" class="nav-link"></a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="mainMenu" class="tab-pane active">
            <ul class="nav am-sideleft-menu">
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('home') }}" class="nav-link active">--}}
{{--                        <i class="icon ion-ios-home-outline"></i>--}}
{{--                        <span>Dashboard</span>--}}
{{--                    </a>--}}
{{--                </li><!-- nav-item -->--}}
                <li class="nav-item">
                    <a href="{{ route('events.index') }}" class="nav-link">
                        <i class="icon ion-help-buoy"></i>
                        <span>Events</span>
                    </a>
                </li><!-- nav-item -->
                <li class="nav-item">
                    <a href="{{ route('teams.index') }}" class="nav-link">
                        <i class="icon ion-person-stalker"></i>
                        <span>Teams</span>
                    </a>
                </li><!-- nav-item -->
                <li class="nav-item">
                    <a href="{{ route('driver.index') }}" class="nav-link">
                        <i class="fa fa-automobile"></i>
                        <span>Drivers</span>
                    </a>
                </li><!-- nav-item -->
                <li class="nav-item">
                    <a href="{{ route('circuit.index') }}" class="nav-link">
                        <i class="icon ion-compass"></i>
                        <span>Circuits</span>
                    </a>
                </li><!-- nav-item -->
                <li class="nav-item">
                    <a href="{{ route('race.index') }}" class="nav-link">
                        <i class="icon ion-folder"></i>
                        <span>Race Details</span>
                    </a>
                </li><!-- nav-item -->
                <li class="nav-item">
                    <a href="{{ route('qualifying-sessions.index') }}" class="nav-link">
                        <i class="icon ion-funnel"></i>
                        <span>Qualifying</span>
                    </a>
                </li><!-- nav-item -->
                <li class="nav-item">
                    <a href="{{ route('race-results.index') }}" class="nav-link">
                        <i class="icon ion-flag"></i>
                        <span>Race results</span>
                    </a>
                </li><!-- nav-item -->
            </ul>
        </div><!-- #mainMenu -->

    </div><!-- tab-content -->
</div><!-- am-sideleft -->
