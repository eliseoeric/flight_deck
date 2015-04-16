
<section id="builder-sidebar" class="sidebar builder"  gumby-fixed="top" >
   <div class="panel">
       <div class="toggler-tab">
           <a href="#" id="builder-sidebar-trigger" class="toggle" gumby-trigger="#builder-sidebar"><i class="fa fa-sliders"></i></a>
       </div>
       <header class="panel-header">
           <h3 class="panel-title">Dashboard Builder</h3>
       </header>
       <div class="panel-body">

           <section id="widgetBuilder-tabs" class="tabs pill">
               <ul class="tab-nav">
                   <li><a href="#" >New Widget</a></li>
                   <li class="active"><a href="#">Edit Widget</a></li>
                   <li><a href="#">Third Tab</a></li>
               </ul>

               <div class="tab-content">
                   <h4>{{$dashboard->heading}}</h4>
                   <p>Dashboards made eaiser.</p>
                   {{Form::open(['route' => ['admin.widgets.store'], 'method' => 'put', 'id' => 'addWidget'])}}
                   @include('dashboard._widgets.widgetForm')
                   {{Form::close()}}
               </div>
               <div class="tab-content active">
                   <p>Please select a widget to edit</p>
                   <div id="editWidgetForm-shell">

                   </div>
               </div>
               <div class="tab-content">
                   <p>Don't forget about me! I'm tab 3!</p>
               </div>
           </section>
       </div>
   </div>
</section>

