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

namespace pocketmine\item;

class PrismarineCrystal extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::PRISMARINE_CRYSTAL, $meta, $count, "Prismarine Crystal");
	}

}

