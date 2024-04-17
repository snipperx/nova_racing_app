<div class="col-md-3">
    <div class="bg-light border-0" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="{{ route('main') }}" class="list-group-item list-group-item-action "
               style="font-weight: bold">Driver display</a>
            <a href="{{ route('last_results') }}" class="list-group-item list-group-item-action ">Last race
                result</a>
            <a href="{{ route('teams') }}" class="list-group-item list-group-item-action ">Teams</a>
{{--            <a href="{{ route('standings') }}" class="list-group-item list-group-item-action ">Standings</a>--}}
            <a href="{{ route('upcoming_events')}} " class="list-group-item list-group-item-action ">Upcoming Events</a>
            <a href="{{ route('list_of_circuits')}}" class="list-group-item list-group-item-action ">List of Circuits</a>
        </div>
    </div>
</div>
