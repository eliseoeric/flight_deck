@if ($errors->any())
    <div data-alert class="alert-box warning">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <a href="#" class="close">&times;</a>
    </div>
@endif