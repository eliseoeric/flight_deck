@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('layouts._partials.modal', ['modalID' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <div data-alert class="alert-box {{ Session::get('flash_notification.level') }}">
            {{ Session::get('flash_notification.message') }}
            <a href="#" class="close">&times;</a>
        </div>
    @endif
@endif