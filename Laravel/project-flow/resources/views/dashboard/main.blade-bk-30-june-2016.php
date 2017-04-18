@extends('layouts.jobs')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('_partials.admin-sidebar')
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                {{-- <h1 class="page-header">Dashboard</h1> --}}
                <div class="container" id="work-flow-container">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-script')
    <script>
        $(function () {
            // load dynamic data container
            var dynamic_link_url = '{!! route('workflowDynamic') !!}';
            dynamic_workflow_load(dynamic_link_url);
        });
    </script>
@endsection

