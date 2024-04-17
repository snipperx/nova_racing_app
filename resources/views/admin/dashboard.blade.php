
@extends('layouts.main')

@section('page_dependencies')

@endsection

<!-- Begin page -->

@section('content')
    <div class="am-mainpanel">
        <div class="am-pagetitle">
            <h5 class="am-title">Dashboard</h5>
            <form id="searchBar" class="search-bar" action="index.html">
                <div class="form-control-wrapper">
                    <input type="search" class="form-control bd-0" placeholder="Search...">
                </div><!-- form-control-wrapper -->
                <button id="searchBtn" class="btn btn-orange"><i class="fa fa-search"></i></button>
            </form><!-- search-bar -->
        </div><!-- am-pagetitle -->

        <div class="am-pagebody">




            <div class="row row-sm mg-t-15 mg-sm-t-20">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-transparent pd-20">
                            <h6 class="card-title tx-uppercase tx-12 mg-b-0">Latest Events</h6>
                        </div><!-- card-header -->
                        <div class="table-responsive">
                            <table class="table table-white mg-b-0 tx-12">
                                <tbody>
                                <tr>
                                    <td class="pd-l-20 tx-center">
                                        <img src="../img/img1.jpg" class="wd-36 rounded-circle" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Mark K. Peters</a>
                                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                                    </td>
                                    <td class="tx-12">
                                        <span class="square-8 bg-success mg-r-5 rounded-circle"></span> Email verified
                                    </td>
                                    <td>Just Now</td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20 tx-center">
                                        <img src="../img/img2.jpg" class="wd-36 rounded-circle" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Karmen F. Brown</a>
                                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                                    </td>
                                    <td class="tx-12">
                                        <span class="square-8 bg-warning mg-r-5 rounded-circle"></span> Pending verification
                                    </td>
                                    <td>Apr 21, 2017 8:34am</td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20 tx-center">
                                        <img src="../img/img3.jpg" class="wd-36 rounded-circle" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Gorgonio Magalpok</a>
                                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                                    </td>
                                    <td class="tx-12">
                                        <span class="square-8 bg-success mg-r-5 rounded-circle"></span> Purchased success
                                    </td>
                                    <td>Apr 10, 2017 4:40pm</td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20 tx-center">
                                        <img src="../img/img5.jpg" class="wd-36 rounded-circle" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Ariel T. Hall</a>
                                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                                    </td>
                                    <td class="tx-12">
                                        <span class="square-8 bg-warning mg-r-5 rounded-circle"></span> Payment on hold
                                    </td>
                                    <td>Apr 02, 2017 6:45pm</td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20 tx-center">
                                        <img src="../img/img4.jpg" class="wd-36 rounded-circle" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">John L. Goulette</a>
                                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                                    </td>
                                    <td class="tx-12">
                                        <span class="square-8 bg-pink mg-r-5 rounded-circle"></span> Account deactivated
                                    </td>
                                    <td>Mar 30, 2017 10:30am</td>
                                </tr>
                                <tr>
                                    <td class="pd-l-20 tx-center">
                                        <img src="../img/img5.jpg" class="wd-36 rounded-circle" alt="Image">
                                    </td>
                                    <td>
                                        <a href="" class="tx-inverse tx-14 tx-medium d-block">John L. Goulette</a>
                                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                                    </td>
                                    <td class="tx-12">
                                        <span class="square-8 bg-pink mg-r-5 rounded-circle"></span> Account deactivated
                                    </td>
                                    <td>Mar 30, 2017 10:30am</td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- table-responsive -->
                        <div class="card-footer tx-12 pd-y-15 bg-transparent bd-t bd-gray-200">
                            <a href=""><i class="fa fa-angle-down mg-r-5"></i>View All Transaction History</a>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div><!-- col-8 -->
                <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
                    <div class="card pd-20">
                        <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-15">Sales Report</h6>
                        <div class="d-flex mg-b-10">
                            <div class="bd-r pd-r-10">
                                <label class="tx-12">Today</label>
                                <p class="tx-lato tx-inverse tx-bold">1,898</p>
                            </div>
                            <div class="bd-r pd-x-10">
                                <label class="tx-12">This Week</label>
                                <p class="tx-lato tx-inverse tx-bold">32,112</p>
                            </div>
                            <div class="pd-l-10">
                                <label class="tx-12">This Month</label>
                                <p class="tx-lato tx-inverse tx-bold">72,067</p>
                            </div>
                        </div><!-- d-flex -->
                        <div class="progress mg-b-10">
                            <div class="progress-bar wd-50p" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                        <p class="tx-12 mg-b-0">Maecenas tempus, tellus eget condimentum rhoncus</p>
                    </div><!-- card -->

                    <ul class="list-group widget-list-group bg-info mg-t-20">
                        <li class="list-group-item rounded-top-0">
                            <p class="mg-b-0"><i class="fa fa-cube tx-white-7 mg-r-8"></i><strong class="tx-medium">Retina: 13.3-inch</strong> <span class="text-muted">Display</span></p>
                        </li>
                        <li class="list-group-item">
                            <p class="mg-b-0"><i class="fa fa-cube tx-white-7 mg-r-8"></i><strong class="tx-medium">Intel Iris Graphics 6100</strong> <span class="text-muted">Graphics</span></p>
                        </li>
                        <li class="list-group-item">
                            <p class="mg-b-0"><i class="fa fa-cube tx-white-7 mg-r-8"></i><strong class="tx-medium">500 GB</strong> <span class="text-muted">Flash Storage</span></p>
                        </li>
                        <li class="list-group-item">
                            <p class="mg-b-0"><i class="fa fa-cube tx-white-7 mg-r-8"></i><strong class="tx-medium">3.1 GHz Intel Core i7</strong> <span class="text-muted">Processor</span></p>
                        </li>
                        <li class="list-group-item rounded-bottom-0">
                            <p class="mg-b-0"><i class="fa fa-cube tx-white-7 mg-r-8"></i><strong class="tx-tx-medium">16 GB 1867 MHz DDR3</strong> <span class="text-muted">Memory</span></p>
                        </li>
                    </ul>
                </div><!-- col-4 -->
            </div><!-- row -->

        </div><!-- am-pagebody -->


@stop


@section('page_script')


@endsection
