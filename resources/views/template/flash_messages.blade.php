@if(Session::has('flash_message_error'))
<!-- Error Flash Messages -->
     <div class="alert alert-danger">
         <em> {!! session('flash_message_error') !!}</em>
     </div>
@endif

@if(Session::has('flash_message_success'))
<!-- Success Flash Messages -->
     <div class="alert alert-success">
         <em> {!! session('flash_message_success') !!}</em>
     </div>
@endif


@if(Session::has('flash_message_info'))
 <!-- Info Flash Messages -->
     <div class="alert alert-info">
         <em> {!! session('flash_message_info') !!}</em>
     </div>
@endif
