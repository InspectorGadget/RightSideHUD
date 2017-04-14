<?php

/* 
 * 
 *   _____  _______  _____  _____           _____            _             
 *  |  __ \|__   __|/ ____||  __ \         / ____|          | |            
 *  | |__) |  | |  | |  __ | |  | |  __ _ | |      ___    __| |  ___  _ __ 
 *  |  _  /   | |  | | |_ || |  | | / _` || |     / _ \  / _` | / _ \| '__|
 *  | | \ \   | |  | |__| || |__| || (_| || |____| (_) || (_| ||  __/| |   
 *  |_|  \_\  |_|   \_____||_____/  \__,_| \_____|\___/  \__,_| \___||_|
 * 
 * 
 * Copyright (C) 2017 RTG
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * 
 */

namespace RTG\RightSideHUD;

/* Essentials */
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;

use RTG\RightSideHUD\SaveTask;

class Loader extends PluginBase {
    
    public $cfg;
    
    public function onEnable() {
        
        $this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML, array(
            "version" => 1.0,
            "servername" => "",
            "enable-website-display" => true,
            "website_url" => "",
        ));
        
        $this->getServer()->getScheduler()->scheduleRepeatingTask(new SaveTask($this), 2);
        
        $this->getLogger()->warning("\n Everything Loaded!");
       
        
    }
    
    public function onHUDSend(Player $player) {
        
        $servername = $this->cfg->get("servername");
        
        if ($this->cfg->get("enable-website-display") === TRUE) {
            $website = $this->cfg->get("website_url");
            
            $string = TF::RED . "Username: " . $player->getName() . "\n" . TF::RESET . "\n" . "ServerName: " . $servername . "\n" . "Website: " . $website;
            $player->sendPopup($string);
            
        }
        else {
            
            $string = TF::RED . "Username: " . $player->getName() . "\n" . TF::RESET . "\n" . "ServerName: " . $servername;
            $player->sendPopup($string);
            
        }
        
    }
    
    public function onSave() {
        $this->cfg->save();
    }
    
    public function onDisable() {
        $this->cfg->save();
    }
     
}
