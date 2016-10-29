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
use pocketmine\Player;
class SlimeBlock extends Solid{
	protected $id = self::SLIME_BLOCK;
	public function __construct($meta = 15){
		$this->meta = $meta;
	}
	public function hasEntityCollision(){
		return true;
	}
	public function getHardness() {
		return 0;
	}
	public function getName() : string{
		return "Slime Block";
	}
}