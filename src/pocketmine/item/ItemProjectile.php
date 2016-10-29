<?php
namespace pocketmine\item;
use pocketmine\entity\Entity;
use pocketmine\entity\Projectile;
use pocketmine\entity\ThrownExpBottle;
use pocketmine\entity\ThrownPotion;
use pocketmine\event\entity\ProjectileLaunchEvent;
use pocketmine\level\sound\LaunchSound;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\ShortTag;
use pocketmine\Player;
abstract class ItemProjectile extends Item{
    public function getMaxStackSize() : int {
        switch($this->getId()){
            case Item::ENCHANTING_BOTTLE:
                return 64;
            case Item::SPLASH_POTION:
                return 1;
        }
        return 16;
    }
    public function summonProjectile(Player $player){
        $projectile = null;
        $nbt = new CompoundTag("", [
            "Pos" => new ListTag("Pos", [
                new DoubleTag("", $player->x),
                new DoubleTag("", $player->y + $player->getEyeHeight()),
                new DoubleTag("", $player->z)
            ]),
            "Motion" => new ListTag("Motion", [
                new DoubleTag("", -sin($player->yaw / 180 * M_PI) * cos($player->pitch / 180 * M_PI)),
                new DoubleTag("", -sin($player->pitch / 180 * M_PI)),
                new DoubleTag("", cos($player->yaw / 180 * M_PI) * cos($player->pitch / 180 * M_PI))
            ]),
            "Rotation" => new ListTag("Rotation", [
                new FloatTag("", $player->yaw),
                new FloatTag("", $player->pitch)
            ]),
        ]);
        $multiplier = 1.0;
        switch($this->getId()) {
            case Item::SNOWBALL:
            case Item::EGG:
                $multiplier = 1.25;
                $projectile = Entity::createEntity($this->getName(), $player->chunk, $nbt, $player);
                break;
            case Item::SPLASH_POTION:
                if($player->getServer()->allowSplashPotion) {
                    $multiplier = 1.1;
                    $nbt = new CompoundTag("", [
                        "Pos" => new ListTag("Pos", [
                            new DoubleTag("", $player->x),
                            new DoubleTag("", $player->y + $player->getEyeHeight()),
                            new DoubleTag("", $player->z)
                        ]),
                        "Motion" => new ListTag("Motion", [
                            new DoubleTag("", -sin($player->yaw / 180 * M_PI) * cos($player->pitch / 180 * M_PI)),
                            new DoubleTag("", -sin($player->pitch / 180 * M_PI)),
                            new DoubleTag("", cos($player->yaw / 180 * M_PI) * cos($player->pitch / 180 * M_PI))
                        ]),
                        "Rotation" => new ListTag("Rotation", [
                            new FloatTag("", $player->yaw),
                            new FloatTag("", $player->pitch)
                        ]),
                        "PotionId" => new ShortTag("PotionId", $this->getDamage()),
                    ]);
                    $projectile = new ThrownPotion($player->chunk, $nbt, $player);
                }
                break;
            case Item::BOTTLE_O_ENCHANTING:
                $multiplier = 1.15;
                $projectile = new ThrownExpBottle($player->chunk, $nbt, $player);
        }
        $projectile->setMotion($projectile->getMotion()->multiply($multiplier));
        if($player->isSurvival()){
            $this->setCount($this->getCount() - 1);
            $player->getInventory()->setItemInHand($this->getCount() > 0 ? $this : Item::get(Item::AIR));
        }
        if($projectile instanceof Projectile){
            $player->getServer()->getPluginManager()->callEvent($projectileEv = new ProjectileLaunchEvent($projectile));
            if($projectileEv->isCancelled()){
                $projectile->kill();
            }else{
                $projectile->spawnToAll();
                $player->level->addSound(new LaunchSound($player), $player->getViewers());
            }
        }else{
            $projectile->spawnToAll();
        }
    }
}