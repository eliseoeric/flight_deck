<div class="row">
    {{Form::hidden('dashboard_id', $dashboard->id, array('id' => 'dashboard_id'))}}
    <div class="form-col-12">
        <! -- Widget TItle Form Input -->
        <div class="form-group form-group-default">
            {{ Form::label('heading', 'Widget Title:') }}
            {{ Form::text('heading', null, ['class' => 'form-control', 'id' => 'heading', 'placeholder' => 'New Widget']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="">
        <div class="medium primary rounded  btn">
            {{ Form::submit('Add Widget', ['class' => '']) }}
        </div>
    </div>
</div>