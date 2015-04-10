<?php namespace FlightDeck\Repos;


abstract class DbRepository {
	protected $model;

	function __construct($model)
	{
		$this->model = $model;
	}

	public function getById($id)
	{
		return $this->model->find($id);
	}

	public function getAll()
	{
		return $this->model->get();
	}

	function save($model)
	{
		return $model->save();
	}

	function delete($id)
	{
		return $this->model->findOrFail($id)->delete();
	}
}