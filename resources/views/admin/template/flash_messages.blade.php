@if (Session::has('flash_notification.message'))
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-bullhorn"></i>
            </div>aa
            <!-- /.box-header -->
            <div class="box-body">
                <div class="callout callout-{{ Session::get('flash_notification.level') }}">
                    <p>{{ Session::get('flash_notification.message') }}</p>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@endif