<!DOCTYPE html>
<html lang="en">
<head>
    <title>Square44 Project Management Solution</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS And JavaScript -->
    {!! Html::style('assetes/css/bootstrap.min.css') !!}
    {!! Html::style('assetes/css/select2.min.css') !!}
    {!! Html::style('assetes/css/select2-bootstrap.css') !!}
    {!! Html::style('assetes/css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('assetes/css/style.css') !!}
</head>

<body class="@yield('body_class')">
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{!! url('/') !!}" class="navbar-brand">Square PM</a>
        </div>
        <ul class="nav nav-pills pull-right">                        
            @if(Sentinel::check())
                @if(Sentinel::getUser()->inRole('super-user'))
                     <li class="dropdown @if ((Request::path() == 'projects/create') or (Request::path() == 'projects'))
                        {{ 'active' }}
                     @endif">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li {{-- {{ Request::path() == 'projects/create' ? 'class=active' : '' }} --}}><a href="{!! route('projects.create') !!}">Create New Project</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{!! route('projects.index') !!}">Projects List</a></li>
                        </ul>
                    </li>
                    <li {{ (Request::is('dashboard') ? 'class=active' : '') }}><a href="{!! url('/dashboard') !!}">Dashboard</a></li>
                    <li><a href="{!! route('weeklyReview') !!}">Weekly Review</a></li>                    
                @elseif(Sentinel::getUser()->inRole('project-manager'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{!! route('projects.create') !!}">Create Project</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{!! route('projects.index') !!}">Projects List</a></li>
                        </ul>
                    </li>
                    <li><a href="{!! route('workflow') !!}">Dashboard</a></li>
                    <li><a href="{!! route('weeklyReview') !!}">Weekly Review</a></li>
                @elseif(Sentinel::getUser()->inRole('designer'))
                    <li><a href="{!! route('designer.workflow') !!}">Dashboard</a></li>
                    <li><a href="{!! route('weeklyReview') !!}">Weekly Review</a></li>
                @endif
                <li><a href="{!! route('logout') !!}">Log Out</a></li>
            @else
                {{--<li><a href="{!! route('getlogin') !!}">Login</a></li>--}}
            @endif
        </ul>
    </div>
</nav>

@yield('content')

{!! Html::script('assetes/js/jquery-1.11.3.min.js') !!}
{!! Html::script('assetes/js/moment.js') !!}
{!! Html::script('assetes/js/bootstrap.min.js') !!}
{!! Html::script('assetes/js/select2.min.js') !!}
{!! Html::script('assetes/js/bootstrap-datetimepicker.min.js') !!}
{!! Html::script('assetes/js/jqColorPicker.min.js') !!}
{!! Html::script('assetes/js/jquery.noty.packaged.min.js') !!}

{{-- Html::script('assetes/js/jquery.fn.sortable.js') --}}
{!! Html::script('assetes/js/custom.js') !!}

@yield('footer-script')
</body>
</html>