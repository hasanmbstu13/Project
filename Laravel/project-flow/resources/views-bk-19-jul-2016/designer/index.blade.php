@extends('layouts.jobs')
@section('content')
<div class="container" id="work-flow-container">

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
{!! Html::script('assetes/js/designer.js') !!}
@endsection

