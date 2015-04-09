@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('layouts._partials.modal', ['modalID' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        @section('notification')
            var notification = new NotificationFx({
            message : '<div class="ns-thumb {{ Session::get('flash_notification.level') }}"><i class="fa {{ Session::get('flash_notification.fa_icon') }}"></i></div><div class="ns-content "><p>{{ Session::get('flash_notification.message') }}</p></div>',
            layout : 'other',
            ttl : 6000,
            effect : 'thumbslider',
            type : 'notice', // notice, warning, error or success
            onClose : function() {
            bttn.disabled = false;
            }
            });
            notification.show();
        @stop
    @endif
@endif

