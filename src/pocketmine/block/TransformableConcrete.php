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

use pocketmine\entity\Entity;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\ListTag;

abstract class TransformableConcrete extends Solid{

	public function onUpdate($type){
		if($type === Level::BLOCK_UPDATE_NORMAL or $type === Level::BLOCK_UPDATE_TOUCH){
			$down = $this->getSide(Vector3::SIDE_DOWN);
		   for($range = -1; $range <= 1; $range++){
			 if($down->getId() === self::AIR or ($down instanceof Liquid)){
				$this->level->setBlock($this, Block::get(Block::AIR), true, true);
				$fall = Entity::createEntity("BlockEntity", $this->getLevel(), new CompoundTag("", [
					"Pos" => new ListTag("Pos", [
						new DoubleTag("", $this->x + 0.5),
						new DoubleTag("", $this->y),
						new DoubleTag("", $this->z + 0.5)
					]),
					"Motion" => new ListTag("Motion", [
						new DoubleTag("", 0),
						new DoubleTag("", 0),
						new DoubleTag("", 0)
					]),
					"Rotation" => new ListTag("Rotation", [
						new FloatTag("", 0),
						new FloatTag("", 0)
					]),
					"TileID" => new IntTag("TileID", $this->getId()),
					"Data" => new ByteTag("Data", $this->getDamage()),
				]));
				
				$fall->spawnToAll();
			}elseif($this->level->getBlockIdAt($this->x + $range, $this->y, $this->z) == 8){
				$this->level->setBlock($this, Block::get(Block::CONCRETE, $this->meta), true);
			}elseif($this->level->getBlockIdAt($this->x, $this->y, $this->z + $range) == 8){
				$this->level->setBlock($this, Block::get(Block::CONCRETE, $this->meta), true);
			}
	 	 }
	  }
	}
}