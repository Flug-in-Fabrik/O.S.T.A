<?php
namespace FabrikTeam\OSTA;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;
use pocketmine\event\player\{PlayerJoinEvent, PlayerQuitEvent};
use pocketmine\utils\Config;

class OSTA extends PluginBase implements Listener{
	
	private static $instance = null;

	public static function getInstance() : OSTA{
		return self::$instance;
	}
	
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
		
		/* 명령어 추가 */
		foreach([
			"OSTACommand"
		] as $class){
			$class = "\\FabrikTeam\\OSTA\\Commands\\OSTA\\" . $class;
			$this->getServer()->getCommandMap()->register("OSTA", new $class($this));
		}
		/* 명령어 추가 */
    }
}