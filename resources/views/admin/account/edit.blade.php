@extends('layouts.backend')
@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Account Edit</h3>
                            </div>
                            <hr>
                            <form action="{{route('admin#changedDetail',Auth::user()->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-3">
                                        @if(Auth::user()->image == null)
                                            <img src="{{asset('images/default_user.jpg')}}" alt="" class="rounded shadow">
                                        @else
                                            <img src="{{Auth::user()->image}}" alt="{{Auth::user()->image}}"/>
                                        @endif
                                        <div class="mt-2">
                                            <input type="file" name="newImage" class="form" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <!-- <label for="name" class="">Name</label> -->
                                        <input type="name" name="name" value="{{Auth::user()->name}}" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" placeholder="Name">
                                        @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('name')}}
                                        </div>
                                        @endif

                                        <!-- <label for="email" class="">Email</label> -->
                                        <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control my-2{{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Email">
                                        @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('email')}}
                                        </div>
                                        @endif
                                       
                            
                                        <input type="number" name="phone" value="{{Auth::user()->phone}}" class="form-control my-2{{$errors->has('phone') ? 'is-invalid' : ''}}" placeholder="phone">
                                        @if($errors->has('phone'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('phone')}}
                                        </div>
                                        @endif

                                        <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control my-2{{$errors->has('address') ? 'is-invalid' : ''}}" placeholder="address">
                                        @if($errors->has('address'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('address')}}
                                        </div>
                                        @endif
                                       
                                    </div>

                                </div>
                                <div class="mt-2">
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Confirm</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        <i class="fa-solid fa-circle-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

@endsection