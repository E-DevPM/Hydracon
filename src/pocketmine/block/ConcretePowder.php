<?php

/*
 * ╔╗ ╔╗     ╔╗
 * ║║ ║║     ║║
 * ║╚═╝╠╗ ╔╦═╝╠═╦══╦══╦══╦══╗
 * ║╔═╗║║ ║║╔╗║╔╣╔╗║╔═╣╔╗║╔╗║
 * ║║ ║║╚═╝║╚╝║║║╔╗║╚═╣╚╝║║║║
 * ╚╝ ╚╩═╗╔╩══╩╝╚╝╚╩══╩══╩╝╚╝
 *     ╔═╝║
 *     ╚══╝
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
*/

namespace pocketmine\block;

use pocketmine\item\Tool;

class ConcretePowder extends TransformableConcrete{

	protected $id = self::CONCRETE_POWDER;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getHardness(){
		return 0.5;
	}

	public function getToolType(){
		return Tool::TYPE_SHOVEL;
	}

	public function getName(){
		static $names = [
			0 => "White Concrete Powder",
			1 => "Orange Concrete Powder",
			2 => "Magenta Concrete Powder",
			3 => "Light Blue Concrete Powder",
			4 => "Yellow Concrete Powder",
			5 => "Lime Concrete Powder",
			6 => "Pink Concrete Powder",
			7 => "Gray Concrete Powder",
			8 => "Silver Concrete Powder",
			9 => "Cyan Concrete Powder",
			10 => "Purple Concrete Powder",
			11 => "Blue Concrete Powder",
			12 => "Brown Concrete Powder",
			13 => "Green Concrete Powder",
			14 => "Red Concrete Powder",
			15 => "Black Concrete Powder",
		];
		return $names[$this->meta & 0x0f];
	}

}
