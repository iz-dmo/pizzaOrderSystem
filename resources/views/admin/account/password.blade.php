@extends('layouts.backend')
@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Change Password</h3>
                            </div>
                            <hr>
                            <form action="{{route('admin#changedPassword')}}" method="post" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <input id="name" name="currentPassword" type="password" class="form-control my-3 rounded 
                                    @if (session('notMatch')) is-invalid @endif {{$errors->has('currentPassword') ? 'is-invalid' : ''}} "
                                     aria-required="true" aria-invalid="false" placeholder="Current Password">
                                    <div class="invalid-feedback">
                                        {{$errors->first('currentPassword')}}
                                    </div>
                                   @if(session('notMatch'))
                                   <div class="invalid-feedback">
                                        <small class="text-danger">{{session('notMatch')}}</small>
                                   </div>
                                   @endif
                                    <input id="name" name="newPassword" type="password" class="form-control my-3 rounded {{$errors->has('newPassword') ? 'is-invalid' : ''}}"
                                     aria-required="true" aria-invalid="false" placeholder="New Password">
                                    <div class="invalid-feedback">
                                        {{$errors->first('newPassword')}}
                                    </div>

                                    <input id="name" name="confirmPassword" type="password" class="form-control my-3 rounded {{$errors->has('confirmPassword') ? 'is-invalid' : ''}}"
                                     aria-required="true" aria-invalid="false" placeholder="Confirm Password">
                                    <div class="invalid-feedback">
                                        {{$errors->first('confirmPassword')}}
                                    </div>
                                </div>
                                
                                <div>
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