<?php namespace FlightDeck\Core;


class WidgetFactory {

	public static function render($widget)
	{
		$class = 'FlightDeck\Widgets\Blueprints\\'.$widget->type;

		if(class_exists($class))
		{
			switch ($widget->type) {
				case 'PerformanceFeed':
					$content =  new $class($widget->meta);
					break;

				default:
					$content =  new $class($widget->meta);
					break;
			}


			return $widget = array(
				'id' => $widget->id,
				'heading' => $widget->heading,
				'size' => $widget->size,
				'class' => $widget->class,
				'type' => $widget->type,
				'content' => $content->render()
			);
		}


	}
	
}