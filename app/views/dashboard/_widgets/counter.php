<script id="Counter" type="text/template">
    <div class="panel widget {{ size }}">
        <div class="panel-header">
        <div class="panel-controls">
            <ul>
                <li><a href="#" class="widget-edit"><i class="fa fa-circle-o"></i></a></li>
                <li><a href="#" class="widget-delete"><i class="fa fa-times"></i></a></li>
            </ul>
        </div>
        </div>
        <div id="{{ id }}" class="panel-body">
            <h2>${{ content }}</h2>
            <p>{{ heading }}</p>
        </div>
    </div>
</script>
