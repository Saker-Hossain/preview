@extends('user_template.layouts.template')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-4" style="color: red">
            <div class="box_main" >
                <ul>
                    <li><a href="{{route('userprofile')}}" style="color: black">Dashboard</a></li>
                    <li><a href="{{route('pendingorders')}}"style="color: black">Pending Orders</a></li>
                    <li><a href="{{route('history')}}"style="color: black">History</a></li>
                    <li><a href=""style="color: black">logout</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box_main">
                @yield('profilecontent')
            </div>
        </div>
    </div>
</div>
@endsection
