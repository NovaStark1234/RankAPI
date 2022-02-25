<?php
declare(strict_types=1);

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use Nova\RankAPI\command\RankCommand;

class RankAPI extends PluginBase implements Listener {
	protected function onEnable() :void {
		$this->getServer()->getCommandMap()->register("RankAPI", new RankCommand($this));
	}
}