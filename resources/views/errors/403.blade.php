@include('layouts.partials.head')
<div class="ht-100v d-flex align-items-center justify-content-center">
    <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
        <h1 class="tx-100 tx-xs-140 tx-normal tx-gray-800 mg-b-0">403!</h1>
        <h5 class="tx-xs-24 tx-normal tx-orange mg-b-30 lh-5">The page your are looking for has not been found.</h5>
        <p class="tx-16 mg-b-30">The page you are looking for might have been removed, had its name changed,
            or unavailable. Maybe you could try a search:</p>


        <div class="tx-center mg-t-20">... or back to <a href="{{ route('home') }}" class="tx-orange hover-info">home</a></div>
    </div>
</div><!-- ht-100v -->
</body>
</html>
