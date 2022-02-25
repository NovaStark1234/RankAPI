<?php
declare(strict_types=1);

namespace Nova\RankAPI\command;

use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginOwned;
use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use Nova\RankAPI\RankAPI;

class RankCommand extends Command implements PluginOwned {
	protected $main;
	
	public function __construct(RankAPI $main) {
		$this->main = $main;
		parent::__construct("rank", "RankAPI Command", null, []);
		$this->setPermission("rankapi.command.use");
	}
	
	public function getOwningPlugin() :Plugin {
		return $this->main;
	}
	
	public function execute(CommandSender $sender, string $commandLabel, array $args) :bool {
		$this->testPermission($sender);
		if(!isset($args[0])) $sender->sendMessage("Usage: /rank help");
		switch($args[0]) {
			case "help":
				$helps = [
					"/rank set => Set player rank",
					"/rank add => Add new rank",
					"/rank addperm => Add permission to rank",
					"/rank delete => Delete a rank",
					"/rank removeperm => Remove permission of rank",
					"/rank addpperm => Add permission to player",
					"/rank removepperm => Remove permission of player",
					"/rank list => List of all rank"
				];
				foreach($helps as $help) {
					$sender->sendMessage($help);
				}
			break;
			case "set":
				if(!isset($args[1]) || !isset($args[2])) $sender->sendMessage("Usage: /rank set [player] [rank]");
				if(!$this->getOwningPlugin()->getSevrer()->getPlayerByprefix($args[1])) $sender->sendMessage("Cannot found player: {$args[1]}");
				if(!RankAPI::haveRank($args[2])) $sender->sendMessage("Rank: {$args[2]} not found");
				RankAPI::setRank($args[1], $args[2]);
			break;
			case "add":
				if(!isset($args[1])) $sender->sendMessage("Usage: /rank add [rank]");
				RankAPI::addRank($args[1]);
			break;
			case "addperm":
			
			break;
			case "delete":
			
			break;
			case "removeperm":
			
			break;
			case "addpperm":
			
			break;
			case "removepperm":
			
			break;
		}
		return true;
	}
}