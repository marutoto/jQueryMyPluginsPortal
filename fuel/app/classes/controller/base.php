<?php

class Controller_Base extends Controller_Template {

	public $resources;

	public function before() {

		$this->resources = Config::get('path.resources');

	}

}


