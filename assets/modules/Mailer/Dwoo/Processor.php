<?php
namespace Dwoo;
/**
 * base class for processors
 *
 * This software is provided 'as-is', without any express or implied warranty.
 * In no event will the authors be held liable for any damages arising from the use of this software.
 *
 * @author     Jordi Boggiano <j.boggiano@seld.be>
 * @copyright  Copyright (c) 2008, Jordi Boggiano
 * @license    http://dwoo.org/LICENSE   Modified BSD License
 * @link       http://dwoo.org/
 * @version    2.0
 * @date       2013-09-08
 * @package    Dwoo
 */
abstract class Processor {
	/**
	 * the compiler instance that runs this processor
	 *
	 * @var Core
	 */
	protected $compiler;

	/**
	 * constructor, if you override it, call parent::__construct($dwoo); or assign
	 * the dwoo instance yourself if you need it
	 *
	 * @param Compiler $compiler
	 */
	public function __construct(Compiler $compiler) {
		$this->compiler = $compiler;
	}

	/**
	 * processes the input and returns it filtered
	 *
	 * @param string $input the template to process
	 *
	 * @return string
	 */
	abstract public function process($input);
}
