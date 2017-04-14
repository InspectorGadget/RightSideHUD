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

use pocketmine\scheduler\PluginTask;

class SaveTask extends PluginTask {
    
    public $plugin;
    
    public function __construct(Loader $plugin) {
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }
    
    public function onRun($currentTick) {
        
        $this->plugin->onSave();
        
    }
        
}
