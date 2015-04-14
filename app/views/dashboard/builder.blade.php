
<section id="builder-sidebar" class="sidebar builder"  gumby-fixed="top" >
   <div class="panel">
       <div class="toggler-tab">
           <a href="#" class="toggle" gumby-trigger="#builder-sidebar"><i class="fa fa-sliders"></i></a>
       </div>
       <header class="panel-header">
           <h3 class="panel-title">Dashboard Builder</h3>
       </header>
       <div class="panel-body">
           <h4>{{$dashboard->heading}}</h4>
           <p>Dashboards made eaiser.</p>

           {{Form::open(['route' => ['admin.widgets.store'], 'method' => 'put', 'id' => 'addWidget'])}}
            @include('dashboard._widgets.widgetForm')
           {{Form::close()}}
       </div>
   </div>
</section>