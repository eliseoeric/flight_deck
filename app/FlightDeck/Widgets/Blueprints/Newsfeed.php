<?php namespace FlightDeck\Widgets\Blueprints;


use anlutro\cURL\cURL;
use FlightDeck\Widgets\WidgetBlueprint;

class Newsfeed extends WidgetBlueprint {

	public function render()
	{
		return $this->renderFeed();
	}

	public function renderFeed()
	{
		include(app_path().'/FlightDeck/Core/simpleDomParser.php');
		$doc = simplexml_load_file($this->meta['url'], 'SimpleXMLElement', LIBXML_NOCDATA);
		//extract the post image
		$content = str_get_html($doc->channel->item[5]->children('content', true)->encoded);
		$desc = $doc->channel->item[5]->description;

//		dd();

		$ret = array(
			'logo' => $doc->channel->image->url,
			'link' => $doc->channel->item[5]->guid,
			'title' => substr($desc, 0, 40),
			'description' => substr($desc, 0, 140),
			'img' => $content->find('img')[0]->attr['src']
		);
		return $ret;
	}

}