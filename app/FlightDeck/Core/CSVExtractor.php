<?php namespace FlightDeck\Core;


class CSVExtractor {

	public function extractInfo($filepath)
	{
		$data = $this->buildCSVObject( $filepath );
		return $data;
	}

	public function getOrderList( $data )
	{
		$orders = [];
		foreach ( $data as $entry ) {
			dd($data);
		}

	}



	public function buildCSVObject($filepath)
	{
		if( !file_exists( $filepath ) || !is_readable( $filepath ) )
		{
			return "file was not readable or does not exist.";
		}

		$header = NULL;
		$data = [];

		if( ( $handle = fopen( $filepath, 'r' ) ) !== FALSE )
		{
			while( ( $row = fgetcsv( $handle, 1000, ',' ) ) !== FALSE )
			{
				if( !$header )
				{
					$header = $row;
				}
				else
				{
					$data[] = array_combine( $header, $row );
				}
			}
			fclose( $handle );
		}

		return $data;
	}

}