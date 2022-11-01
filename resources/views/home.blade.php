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
                                    <li><a href="{{route('manage.business.overview')}}">Business Overview</a></li>
                                    <li><a href="{{route('manage.our.operations')}}">Our Operation</a></li>
                                    <li><a href="{{route('manage.our.project')}}">Our Project</a></li>
                                    <li><a href="{{route('manage.contact.us')}}">Contact Us</a></li>
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



                        <a style="margin: 15px" class="btn btn-primary" href="{{route('manage.company-profile')}}"> Manage Company Profile</a>
                        <a style="margin: 15px" class="btn btn-primary" href="{{route('manage.business.overview')}}"> Manage Business Overview</a>
                        <a style="margin: 15px" class="btn btn-primary" href="{{route('manage.our.operations')}}"> Manage Our Operation</a>
                        <a style="margin: 15px" class="btn btn-primary" href="{{route('manage.our.project')}}"> Manage Our Project</a>
                        <a style="margin: 15px" class="btn btn-primary" href="{{route('manage.contact.us')}}"> Manage Contact Us</a>


                </div>
            </div>
        </div>
    </div>
</div>




@endsection


