@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}



                        <ul class="nav navbar-nav" style="float: right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options <b class="caret"></b></a>
                                <ul class="dropdown-menu" style="text-align: center">
                                    <li><a href="{{route('manage.company-profile')}}">Company Profile</a></li>
                                    <li><a href="#">Business Overview</a></li>
                                    <li><a href="#">Our Operation</a></li>
                                    <li><a href="#">Our Project</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </li>
                        </ul>




                </div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
