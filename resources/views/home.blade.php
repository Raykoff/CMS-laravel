@extends('layouts.app')

@section('content')
    <div class="container">
            @include('flash::message')
    </div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                <div>
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form"
                              action="{{ url('/logout') }}"
                              method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
