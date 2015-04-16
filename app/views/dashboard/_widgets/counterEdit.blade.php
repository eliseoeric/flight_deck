<script id="editWidgetTemplate" type="text/template">
    <form action="" id="editWidget">
        <h4>Edit Counter</h4>
        <p>Fill out the fields to edit the widget</p>
        <div class="form-group form-group-default">
            <label for="heading">Heading</label>
            <input id="heading" class="form-control" type="text" placeholder="<%= heading %>">
        </div>
        <! -- Manufacturer Form Input -->
        <div class="form-group form-group-default">
            {{ Form::label('type', 'Query Type:') }}
            {{ Form::select('type', $widgetTypes, null, ['class' => 'form-control type-select']) }}
        </div>
        <! -- Class Form Input -->
        <div class="form-group form-group-default">
            {{ Form::label('class', 'CSS Classes:') }}
            <input id="heading" class="form-control" type="text" placeholder="">
        </div>
        <! -- Size Form Input -->
        <div class="form-group form-group-default">
            {{ Form::label('size', 'Widget Size:') }}
            {{ Form::select('size', $widgetSize, 'large-3', ['class' => 'form-control widget-select']) }}
        </div>
        <div class="row">
            <div class="medium primary rounded  btn">
                {{ Form::submit('Save Widget', ['class' => '']) }}
            </div>
        </div>
    </form>
</script>