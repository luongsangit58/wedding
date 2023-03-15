@extends('layouts.poem')

@section('content-poem')
    <div class="wrapper">
        @include('poem.block.bio')    
        <div class="content">
            @include('poem.block.navbar')    
            <!-- Page Header Start -->
            <!-- <div class="container py-5 px-2 bg-primary">
                <div class="row py-5 px-4">
                    <div class="col-sm-6 text-center text-md-left">
                        <h1 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold">My Blog</h1>
                    </div>
                    <div class="col-sm-6 text-center text-md-right">
                        <div class="d-inline-flex pt-2">
                            <h4 class="m-0 text-white"><a class="text-white" href="">Home</a></h4>
                            <h4 class="m-0 text-white px-2">/</h4>
                            <h4 class="m-0 text-white">My Blog</h4>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Page Header End -->

            @include('poem.block.carousel')
            @include('poem.block.listpoem')

            <!-- Footer Start -->
            <div class="container py-4 bg-secondary text-center">
                <p class="m-0 text-white">
                    &copy; Nguyễn Lương Sang
                </p>
            </div>
            <!-- Footer End -->
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
@endsection