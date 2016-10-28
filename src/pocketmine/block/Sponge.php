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

use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\block\Block;

class Sponge extends Solid{

	protected $id = self::SPONGE;

	public function __construct($meta = 0){
$this->meta = $meta;
	}

	public function getHardness(){
		return 0.6;
	}

	public function getName(){
     if($this->meta == 0){
		return "Sponge";
     }else{
          return "Wet Sponge";
	}
}

  public function onUpdate($type){
  	if($type == Level::BLOCK_UPDATE_NORMAL){
  		if($this->meta == 0){
  			$block = $this;
  		$vec = [
  		new Vector3($block->x + 1,$block->y,$block->z),
  		 new Vector3($block->x,$block->y,$block->z + 1),
  		 new Vector3($block->x - 1,$block->y,$block->z),
  		 new Vector3($block->x,$block->y,$block->z - 1),
  		 new Vector3($block->x + 1,$block->y,$block->z + 1),
  		 new Vector3($block->x - 1,$block->y,$block->z - 1),
  		 new Vector3($block->x + 1,$block->y,$block->z - 1),
  		 new Vector3($block->x - 1,$block->y,$block->z + 1)
  		];
  		$water = false;
    $i = 0;
  		while($i < 8){
  			 $up = $this->getLevel()->getBlock(new Vector3($vec[$i]->x,$vec[$i]->y + 1,$vec[$i]->z));
  			 $down = $this->getLevel()->getBlock(new Vector3($vec[$i]->x,$vec[$i]->y - 1,$vec[$i]->z));
  			 $center = $this->getLevel()->getBlock(new Vector3($vec[$i]->x,$vec[$i]->y,$vec[$i]->z));
  			if($up->getId() == self::WATER){
  				$this->getLevel()->setBlock($up,new Block(self::AIR));
  				$water = true;
  			}
  			if($down->getId() == self::WATER){
  				$this->getLevel()->setBlock($down,new Block(self::AIR));
  				$water = true;
  			}
  			if($center->getId() == self::WATER){
  				$this->getLevel()->setBlock($center,new Block(self::AIR));
  				$water = true;
  			}
  			$i++;
  			if($i == 9){
  				$u = new Vector3($block->x,$block->y - 1,$block->z);
  				$d = new Vector3($block->x,$block->y + 1,$block->z);
  				if($this->getLevel()->getBlock($u)->getId() == self::WATER){
  					$this->getLevel()->setBlock($u,new Block(self::AIR));
  					$water = true;
  				}
  				if($this->getLevel()->getBlock($d)->getId() == self::WATER){
  					$this->getLevel()->setBlock($d,new Block(self::AIR));
  					$water = true;
  				}
  			}
  		}
  		if($water){
  			$this->getLevel()->setBlock($block,new Block(self::SPONGE,1));
  		}
  	 }
  	 return $type;
  	}
 }

}
