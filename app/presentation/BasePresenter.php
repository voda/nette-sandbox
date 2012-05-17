<?php

abstract class BasePresenter extends Nette\Application\UI\Presenter {

	public function formatLayoutTemplateFiles() {
		return array(
			__DIR__.'/templates/@layout.latte'
		);
	}

	public function formatTemplateFiles() {
		$dir = dirname($this->getReflection()->getFileName());
		return array(
			"$dir/templates/$this->view.latte"
		);
	}
}
