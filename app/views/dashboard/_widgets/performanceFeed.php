<script id="PerformanceFeed" type="text/template">
	<div class="panel widget {{ size }}">
		<div class="panel-header">
			<div class="panel-controls">
				<ul>
					<li><a href="#" class="widget-edit"><i class="fa fa-circle-o"></i></a></li>
					<li><a href="#" class="widget-delete"><i class="fa fa-times"></i></a></li>
				</ul>
			</div>
		</div>
		<div id="" class="panel-body">
			<div class="row no-padding">
				<h3>DMG Performance Feed</h3>
				<div class="eight columns" id="feed_{{ id }}"></div>
				<div class="three columns m-l-20">
					<h3>Region Sales Breakdown</h3>
					<h4><strong>Total Sales: </strong>${{content.performance.total}}</h4>
					{{#each content.performance.regions}}
					<div>
						<p>{{this.name}} -- {{calcPerc this.sales ../content.performance.total}}%</p>
						<div class="performance-bar">
							<div class="performance-bar_indicator animated" style="width:{{calcPerc this.sales ../content.performance.total}}%;"></div>
						</div>
					</div>
					{{/each }}
				</div>
			</div>
		</div>
	</div>
</script>
