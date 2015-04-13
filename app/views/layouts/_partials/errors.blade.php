@if ($errors->any())
    @section('notification')
        @foreach($errors->all() as $error)
        var notification = new NotificationFx({
        message : '<div class="ns-thumb error"><i class="fa fa-exclamation-triangle"></i></div><div class="ns-content "><p>{{$error}}</p></div>',
        layout : 'other',
        ttl : 6000,
        effect : 'thumbslider',
        type : 'notice', // notice, warning, error or success
        onClose : function() {
        bttn.disabled = false;
        }
        });
        notification.show();
        @endforeach
    @stop
@endif