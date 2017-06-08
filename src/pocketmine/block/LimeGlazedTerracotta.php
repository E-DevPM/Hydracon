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

class LimeGlazedTerracotta extends Solid{

	protected $id = self::LIME_GLAZED_TERRACOTTA;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getHardness(){
		return 1.4;
	}

	public function getName(){
		return "Lime Glazed Terracotta";
	}

	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}
}