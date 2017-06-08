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

class ShulkerBox extends Solid{
	
	protected $id = self::SHULKER_BOX;
	
	public function __construct($meta = 0){
		$this->meta = $meta;
		
	}
	
	public function getHardness(){
		return 6;
	}
	
	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}
	
	public function getName(){
		static $names = [
			0 => "White Shulker Box",
			1 => "Orange Shulker Box",
			2 => "Magenta Shulker Box",
			3 => "Light Blue Shulker Box",
			4 => "Yellow Shulker Box",
			5 => "Lime Shulker Box",
			6 => "Pink Shulker Box",
			7 => "Gray Shulker Box",
			8 => "Silver Shulker Box",
			9 => "Cyan Shulker Box",
			10 => "Purple Shulker Box",
			11 => "Blue Shulker Box",
			12 => "Brown Shulker Box",
			13 => "Green Shulker Box",
			14 => "Red Shulker Box",
			15 => "Black Shulker Box",
		];
		return $names[$this->meta & 0x0f];
	}
}