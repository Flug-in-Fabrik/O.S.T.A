<?php

namespace FabrikTeam\OSTA\Commands\OSTA;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\network\mcpe\protocol\OnScreenTextureAnimationPacket;

use FabrikTeam\OSTA\OSTA;
use FabrikTeam\OSTA\API\CommandAPI;

class OSTACommand extends CommandAPI{
	
	public function __construct(OSTA $plugin){
		parent::__construct(
			"osta", 
			"화면 중앙에 포션 이미지를 띄워줍니다.", 
			"/osta", 
			[],
			[[]]
		
			);

		$this->plugin = $plugin;
	}
	
	public function _execute(CommandSender $sender, string $label, array $args) : bool{
		$player = $sender->getPlayer();
		
		if(!isset($args[0])){
			$sender->addTitle("§l§cOSTA", "§f포션효과 코드를 입력해주세요! 숫자로!");
			return true;
		}
		
		else{
			$Number = (int) $args[0];
			
			$packet = new OnScreenTextureAnimationPacket();
			
			if($packet instanceof OnScreenTextureAnimationPacket) {
				$packet = new OnScreenTextureAnimationPacket();
				$packet->effectId = $Number;
				$player->getPlayer()->dataPacket($packet);
			}
			return true;
		}
		return true;
	}
}