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
    {!! Html::style('assetes/js/bootstrap-editable/css/bootstrap-editable.css') !!}
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
            <a href="{!! url('/') !!}" class="navbar-logo"><img src="{{asset('assetes/images/logo.png')}}" class="img-responsive"></a> <span class="navbar-brand">@if($user = Sentinel::getUser()){{ $user->nick_name }}'s @endif Work Flow</span>
        </div>
        <ul class="nav nav-pills pull-right">           
            @if(Sentinel::check())
                @if(Sentinel::getUser()->inRole('super-user'))
                    <li {{ (Request::is('projects*') ? 'class=active' : '') }}><a href="{!! route('projects.index') !!}">Projects List</a></li>                                 
                    <li {{ (Request::is('dashboard') ? 'class=active' : '') }}><a href="{!! url('/dashboard') !!}">Live Status</a></li>
                    <li {{ (Request::is('weeklyWorkflow') ? 'class=active' : '') }}><a href="{!! route('weeklyWorkflow') !!}">Workflow</a></li>                    
                @elseif(Sentinel::getUser()->inRole('project-manager'))
                    <li {{ (Request::is('projects*') ? 'class=active' : '') }}><a href="{!! route('projects.index') !!}">Projects List</a></li>            
                    <li {{ (Request::is('workflow') ? 'class=active' : '') }}><a href="{!! route('workflow') !!}">Live Status</a></li>
                    <li {{ (Request::is('weeklyWorkflow') ? 'class=active' : '') }}><a href="{!! route('weeklyWorkflow') !!}">Workflow</a></li>
                @elseif(Sentinel::getUser()->inRole('designer'))
                    <li {{ (Request::is('projects*') ? 'class=active' : '') }}><a href="{!! route('projects.index') !!}">Projects List</a></li>          
                    <li @if ((Request::path() == 'designer')) {{ 'class=active' }} @endif><a href="{!! route('designer.workflow') !!}">Live Status</a></li>
                    {{-- <li {{ (Request::is('workflow') ? 'class=active' : '') }}><a href="{!! route('workflow') !!}">Live Status</a></li> --}}
                    <li {{ (Request::is('weeklyWorkflow') ? 'class=active' : '') }}><a href="{!! route('weeklyWorkflow') !!}">Workflow</a></li>
                @endif
                <li><a href="{!! route('logout') !!}">Log Out</a></li>
            @else
                <li><a href="{!! route('getlogin') !!}">Login</a></li>
            @endif
        </ul>
    </div>
</nav>

@yield('content')

@yield('workflow_content')

{!! Html::script('assetes/js/jquery-1.11.3.min.js') !!}
{!! Html::script('assetes/js/moment.js') !!}
{!! Html::script('assetes/js/bootstrap.min.js') !!}
{!! Html::script('assetes/js/select2.min.js') !!}
{!! Html::script('assetes/js/bootstrap-datetimepicker.min.js') !!}
{!! Html::script('assetes/js/jqColorPicker.min.js') !!}
{!! Html::script('assetes/js/vendor/noty/jquery.noty.packaged.min.js') !!}
{!! Html::script('assetes/js/vendor/noty/relax.js') !!}

{{-- Html::script('assetes/js/jquery.fn.sortable.js') --}}
{!! Html::script('assetes/js/custom.js') !!}
{!! Html::script('assetes/js/bootstrap-editable/js/bootstrap-editable.js') !!}

@yield('footer-script')
<div class="loader"><!-- Place at bottom of page --></div>
</body>
</html>