@extends('layouts.backend')
@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin#edit',Auth::user()->id)}}" class="btn btn-primary float-right">Edit</a>
                            <div class="card-title">
                                <h3 class=" title-2  text-center">Account Info</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3 offset-1">
                                    @if(Auth::user()->image == null)
                                        <img src="{{asset('images/default_user.jpg')}}" alt="" class="rounded shadow">
                                    @else
                                        <img src="{{Auth::user()->image}}" alt="{{Auth::user()->image}}" />
                                    @endif
                                </div>
                                <div class="col-8 ">
                                    <h4 class="mx-5 mt-4"><i class="fa-solid fa-user me-2"></i> {{Auth::user()->name}}</h4>
                                    <h4 class="mx-5 my-4"><i class="fa-solid fa-envelope me-2"></i> {{Auth::user()->email}}</h4>
                                    <h4 class="mx-5 my-4"><i class="fa-solid fa-phone me-2"></i> {{Auth::user()->phone}}</h4>
                                    <h4 class="mx-5 "><i class="fa-solid fa-location-dot me-2"></i> {{Auth::user()->address}}</h4>

                                </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

@endsection