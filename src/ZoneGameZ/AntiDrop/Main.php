<?php

namespace ZoneGameZ\AntiDrop;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		@mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->getResource("config.yml");
		}
	
	public function onDrop(PlayerDropItemEvent $ev){
		$p = $ev->getPlayer();
		// World Name
		$map = $this->getConfig()->get("Worlds");
		if($p->getLevel()->getName() === $map){
			$p->sendMessage($this->getConfig()->get("Message"));
			$ev->setCancelled(true);
			}
		}
	}