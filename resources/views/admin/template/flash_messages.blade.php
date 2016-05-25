@if(Session::has('admin_flash_message_error'))
<!-- Error Flash Messages -->
    <div class="row">
      <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="callout callout-danger">
                 <p>{!! session('admin_flash_message_error') !!}</p>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
@endif


@if(Session::has('admin_flash_message_success'))
<!-- Success Flash Messages -->
         <div class="row">
           <div class="col-md-12">
               <div class="box box-default">
                 <div class="box-header with-border">
                   <i class="fa fa-bullhorn"></i>
                 </div>
                 <!-- /.box-header -->
                 <div class="box-body">
                   <div class="callout callout-success">
                      <p>{!! session('admin_flash_message_success') !!}</p>
                   </div>

                 </div>
                 <!-- /.box-body -->
               </div>
           </div>
       </div>
@endif


@if(Session::has('admin_flash_message_info'))
 <!-- Info Flash Messages -->
 <div class="row">
   <div class="col-md-12">
       <div class="box box-default">
         <div class="box-header with-border">
           <i class="fa fa-bullhorn"></i>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
           <div class="callout callout-info">
              <p>{!! session('admin_flash_message_info') !!}</p>
           </div>

         </div>
         <!-- /.box-body -->
       </div>
   </div>
</div>
@endif
