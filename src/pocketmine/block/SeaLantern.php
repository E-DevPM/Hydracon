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


class SeaLantern extends Solid{

	protected $id = self::SEA_LANTERN;

	public function __construct(){

	}

	public function getResistance(){
		return 1.5;
     }

     public function getLightLevel() {
          return 15;
     }

	public function getHardness(){
		return 0.3;
	}

	public function getName() : string {
		return "SeaLantern";
	}

	public function getDrops(Item $item) : array {
		return [
			[Item::PRISMARINE_CRYSTAL, 0, 3],
		];
	}

}