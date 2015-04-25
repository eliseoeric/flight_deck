<script id="Newsfeed" type="text/template">
    <div class="panel widget {{ size }} newsfeed" >
        <div class="maintain-aspect">
            <div class="panel-background" style="background-image:url({{ content.img }});"></div>
            <div class="panel-header">
                <div class="panel-controls negative">
                    <ul>
                        <li><a href="#" class="widget-edit"><i class="fa fa-circle-o"></i></a></li>
                        <li><a href="#" class="widget-delete"><i class="fa fa-times"></i></a></li>
                    </ul>
                </div>
            </div>
            <div id="{{ id }}" class="panel-body backdrop">
                <p class="default label">News</p><p class="m-l-5 default label">{{ heading }}</p>
                <a href="{{content.link.[0]}}">
                    <h2>{{ content.title }}</h2>
                    <p class="desc">{{ content.description }}</p>
                </a>
            </div>
        </div>
    </div>
</script>
