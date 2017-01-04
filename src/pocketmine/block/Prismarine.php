<?php

/*
 *
 * | |  | |         | |                          
 * | |__| |_   _  __| |_ __ __ _  ___ ___  _ __  
 * |  __  | | | |/ _` | '__/ _` |/ __/ _ \| '_ \ 
 * | |  | | |_| | (_| | | | (_| | (_| (_) | | | |
 * |_|  |_|\__, |\__,_|_|  \__,_|\___\___/|_| |_|
 *         __/ |                                
 *      |___/
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author Hydracon Team
 * 
 * 
 *
*/

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class Prismarine extends Solid{

	const PRISMARINE = 0;
	const PRISMARINE_BRICKS = 1;
	const DARK_PRISMARINE = 2;

	protected $id = self::PRISMARINE_BLOCK;

	public function __construct($meta = 0){
         $this->meta = $meta;
	}

	public function getHardness(){
		return 1.5;
	}

	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}

	public function getName() : string{
        static $names = [
			self::PRISMARINE => "Prismarine",
			self::PRISMARINE_BRICKS => "Prismarine Bricks",
			self::DARK_PRISMARINE => "Dark Prismarine",
		];
		return $names[$this->meta & 0x07];
	}
}