<?php

/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */

/* * ***************************Includes********************************* */
require_once __DIR__  . '/../../../../core/php/core.inc.php';

class usb8relais extends eqLogic {
    /*     * *************************Attributs****************************** */
    
  /*
   * Permet de définir les possibilités de personnalisation du widget (en cas d'utilisation de la fonction 'toHtml' par exemple)
   * Tableau multidimensionnel - exemple: array('custom' => true, 'custom::layout' => false)
	public static $_widgetPossibility = array();
   */
    
    /*     * ***********************Methode static*************************** */

    /*
     * Fonction exécutée automatiquement toutes les minutes par Jeedom
      public static function cron() {
      }
     */

    /*
     * Fonction exécutée automatiquement toutes les 5 minutes par Jeedom
      public static function cron5() {
      }
     */

    /*
     * Fonction exécutée automatiquement toutes les 10 minutes par Jeedom
      public static function cron10() {
      }
     */
    
    /*
     * Fonction exécutée automatiquement toutes les 15 minutes par Jeedom
      public static function cron15() {
      }
     */
    
    /*
     * Fonction exécutée automatiquement toutes les 30 minutes par Jeedom
      public static function cron30() {
      }
     */
    
    /*
     * Fonction exécutée automatiquement toutes les heures par Jeedom
      public static function cronHourly() {
      }
     */

    /*
     * Fonction exécutée automatiquement tous les jours par Jeedom
      public static function cronDaily() {
      }
     */



    /*     * *********************Méthodes d'instance************************* */
    
 // Fonction exécutée automatiquement avant la création de l'équipement 
    public function preInsert() {
        
    }

 // Fonction exécutée automatiquement après la création de l'équipement 
    public function postInsert() {
        
    }

 // Fonction exécutée automatiquement avant la mise à jour de l'équipement 
    public function preUpdate() {
        
    }

 // Fonction exécutée automatiquement après la mise à jour de l'équipement 
    public function postUpdate() {
        
    }

 // Fonction exécutée automatiquement avant la sauvegarde (création ou mise à jour) de l'équipement 
    public function preSave() {
        
    }

 // Fonction exécutée automatiquement après la sauvegarde (création ou mise à jour) de l'équipement 
    public function postSave() {
        $cmd_list = array(
				'etr1' => array(
					'name' => __('Etat relais 1', __FILE__),
					'subtype' => 'binary',
					'type' => 'info',
                    'order' => 1,
				),
				'etr2' => array(
					'name' => __('Etat relais 2', __FILE__),
					'subtype' => 'binary',
					'type' => 'info',
					'order' => 2,
				),
				'etr3' => array(
					'name' => __('Etat relais 3', __FILE__),
					'subtype' => 'binary',
					'type' => 'info',
					'order' => 3,
				),
				'etr4' => array(
					'name' => __('Etat relais 4', __FILE__),
					'subtype' => 'binary',
					'type' => 'info',
					'order' => 4,
				),
				'etr5' => array(
					'name' => __('Etat relais 5', __FILE__),
					'subtype' => 'binary',
					'type' => 'info',
					'order' => 5,
				),
				'etr6' => array(
					'name' => __('Etat relais 6', __FILE__),
					'subtype' => 'binary',
					'type' => 'info',
					'order' => 6,
				),
				'etr7' => array(
					'name' => __('Etat relais 7', __FILE__),
					'subtype' => 'binary',
					'type' => 'info',
					'order' => 7,
				),
				'etr8' => array(
					'name' => __('Etat relais 8', __FILE__),
					'subtype' => 'binary',
					'type' => 'info',
					'order' => 8,
				),
			);
		foreach ($this->getCmd() as $cmd) {
			if (!isset($cmd_list[$cmd->getLogicalId()]) && $cmd->getLogicalId() != 'refresh') {
				$cmd->remove();
			}
		}
		
		foreach ($cmd_list as $key => $cmd_info) {
			$cmd = $this->getCmd(null, $key);
			if (!is_object($cmd)) {
				$cmd = new usb8relaisCmd();
				$cmd->setLogicalId($key);
				$cmd->setIsVisible(1);
				$cmd->setName($cmd_info['name']);
				$cmd->setOrder($cmd_info['order']);
			}
			$cmd->setType($cmd_info['type']);
			$cmd->setSubType($cmd_info['subtype']);
			$cmd->setEqLogic_id($this->getId());
			$cmd->setEventOnly(1);
			$cmd->save();
		}
		
		$usb8relaiscmd = $this->getCmd(null, 'r1on');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 1 ON',__FILE__));
		$usb8relaiscmd->setLogicalId('r1on');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r2on');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 2 ON',__FILE__));
		$usb8relaiscmd->setLogicalId('r2on');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r3on');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 3 ON',__FILE__));
		$usb8relaiscmd->setLogicalId('r3on');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r4on');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 4 ON',__FILE__));
		$usb8relaiscmd->setLogicalId('r4on');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r5on');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 5 ON',__FILE__));
		$usb8relaiscmd->setLogicalId('r5on');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r6on');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 6 ON',__FILE__));
		$usb8relaiscmd->setLogicalId('r6on');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r7on');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 7 ON',__FILE__));
		$usb8relaiscmd->setLogicalId('r7on');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r8on');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 8 ON',__FILE__));
		$usb8relaiscmd->setLogicalId('r8on');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();



    	$usb8relaiscmd = $this->getCmd(null, 'r1off');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 1 OFF',__FILE__));
		$usb8relaiscmd->setLogicalId('r1off');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_OFF');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r2off');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 2 OFF',__FILE__));
		$usb8relaiscmd->setLogicalId('r2off');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_OFF');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r3off');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 3 OFF',__FILE__));
		$usb8relaiscmd->setLogicalId('r3off');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_OFF');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r4off');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 4 OFF',__FILE__));
		$usb8relaiscmd->setLogicalId('r4off');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_OFF');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r5off');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 5 OFF',__FILE__));
		$usb8relaiscmd->setLogicalId('r5off');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_OFF');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r6off');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 6 OFF',__FILE__));
		$usb8relaiscmd->setLogicalId('r6off');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_OFF');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r7off');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 7 OFF',__FILE__));
		$usb8relaiscmd->setLogicalId('r7off');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_OFF');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r8off');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 8 OFF',__FILE__));
		$usb8relaiscmd->setLogicalId('r8off');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_OFF');
		$usb8relaiscmd->save();



    	$usb8relaiscmd = $this->getCmd(null, 'r1imp');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 1 IMPULSION',__FILE__));
		$usb8relaiscmd->setLogicalId('r1imp');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r2imp');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 2 IMPULSION',__FILE__));
		$usb8relaiscmd->setLogicalId('r2imp');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r3imp');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 3 IMPULSION',__FILE__));
		$usb8relaiscmd->setLogicalId('r3imp');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r4imp');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 4 IMPULSION',__FILE__));
		$usb8relaiscmd->setLogicalId('r4imp');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r5imp');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 5 IMPULSION',__FILE__));
		$usb8relaiscmd->setLogicalId('r5imp');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r6imp');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 6 IMPULSION',__FILE__));
		$usb8relaiscmd->setLogicalId('r6imp');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r7imp');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 7 IMPULSION',__FILE__));
		$usb8relaiscmd->setLogicalId('r7imp');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

    	$usb8relaiscmd = $this->getCmd(null, 'r8imp');
		if (!is_object($usb8relaiscmd)) {
			$usb8relaiscmd = new usb8relaiscmd();
		}
        $usb8relaiscmd->setName(__('Relais 8 IMPULSION',__FILE__));
		$usb8relaiscmd->setLogicalId('r8imp');
	    $usb8relaiscmd->setEqLogic_id($this->getId());
		$usb8relaiscmd->setType('action');
		$usb8relaiscmd->setSubType('other');	
		$usb8relaiscmd->setDisplay('generic_type','LIGHT_ON');
		$usb8relaiscmd->save();

		$refresh = $this->getCmd(null, 'refresh');
		if (!is_object($refresh)) {
			$refresh = new usb8relaisCmd();
			$refresh->setName(__('Rafraichir', __FILE__));
		}
		$refresh->setEqLogic_id($this->getId());
		$refresh->setLogicalId('refresh');
		$refresh->setType('action');
		$refresh->setSubType('other');
		$refresh->setOrder(99);
		$refresh->save();

		$this->majInfo();
	}
		
		public function majinfo() {
			include "php_serial.class.php";      
			// Let's start the class
			$serial = new phpSerial;
			// First we must specify the device. This works on both linux and windows (if
			// your linux serial device is /dev/ttyS0 for COM1, etc)
			$serial->deviceSet($this->getconfiguration('port_carte'));
			$nom_carte=$this->getconfiguration('name');
			// We can change the baud rate, parity, length, stop bits, flow control
/*      	$serial->confBaudRate(9600);
			$serial->confParity("none");
			$serial->confCharacterLength(8);
			$serial->confStopBits(1);
			$serial->confFlowControl("none");
			// Then we need to open it
*/        	$serial->deviceOpen();

			do {

            // To write into
            $serial->sendMessage("?RLY");
            // Or to read from
            sleep (0.200); 
            $read = $serial->readPort(10);
            // If you want to change the configuration, the device must be closed
			}
			while (substr($read,0,1)=="0" || substr($read,0,1)=="1");
			$serial->deviceClose();

			$listecomm=eqlogic::byid($this->getid());
			$nomcomm="";
			foreach($listecomm->getcmd() as $comm) {
				$nomcomm = $comm->getlogicalid();    
				if ( $nomcomm =='etr1') {
					$valrel=substr($read,1,1);
					$comm->setvalue ($valrel);
					$comm->save();
					$comm->event($valrel);
				}
				if ( $nomcomm =='etr2') {
					$valrel=substr($read,2,1);
					$comm->setvalue ($valrel);
					$comm->save();
					$comm->event($valrel);
				}
				if ( $nomcomm =='etr3') {
					$valrel=substr($read,3,1);
					$comm->setvalue ($valrel);
					$comm->save();
					$comm->event($valrel);
				}
				if ( $nomcomm =='etr4') {
					$valrel=substr($read,4,1);
					$comm->setvalue ($valrel);
					$comm->save();
					$comm->event($valrel);
				}
				if ( $nomcomm =='etr5') {
					$valrel=substr($read,5,1);
					$comm->setvalue ($valrel);
					$comm->save();
					$comm->event($valrel);
				}
				if ( $nomcomm =='etr6') {
					$valrel=substr($read,6,1);
					$comm->setvalue ($valrel);
					$comm->save();
					$comm->event($valrel);
				}
				if ( $nomcomm =='etr7') {
					$valrel=substr($read,7,1);
					$comm->setvalue ($valrel);
					$comm->save();
					$comm->event($valrel);
				}
				if ( $nomcomm =='etr8') {
					$valrel=substr($read,8,1);
					$comm->setvalue ($valrel);
					$comm->save();
					$comm->event($valrel);
				}
			}     
        }
		
		
		public function actionrelais ($action,$num_relais) {
        

			$port_carte=$this->getconfiguration('port_carte');
			$nom_carte=$this->getconfiguration('name');
			$duree_imp=$this->getconfiguration('duree_impulsion');

			if ($action=="on") {
				$mess='echo RLY'.$num_relais.'1 >'.$port_carte;
				exec ($mess);
			//print $mess.$port_carte;
			}

			if ($action=="off") {
				$mess='echo RLY'.$num_relais.'0 >'.$port_carte;
				exec ($mess);
			}

			if ($action=="imp") {
				$mess='echo RLY'.$num_relais.'1 >'.$port_carte;
				exec ($mess);
				usleep($duree_imp*1000000);
				$mess='echo RLY'.$num_relais.'0 >'.$port_carte;
				exec ($mess);
			}
        
   
		}

    
 // Fonction exécutée automatiquement avant la suppression de l'équipement 
    public function preRemove() {
        
    }

 // Fonction exécutée automatiquement après la suppression de l'équipement 
    public function postRemove() {
        
    }

    /*
     * Non obligatoire : permet de modifier l'affichage du widget (également utilisable par les commandes)
      public function toHtml($_version = 'dashboard') {

      }
     */

    /*
     * Non obligatoire : permet de déclencher une action après modification de variable de configuration
    public static function postConfig_<Variable>() {
    }
     */

    /*
     * Non obligatoire : permet de déclencher une action avant modification de variable de configuration
    public static function preConfig_<Variable>() {
    }
     */

    /*     * **********************Getteur Setteur*************************** */
}

class usb8relaisCmd extends cmd {
    /*     * *************************Attributs****************************** */
    
    /*
      public static $_widgetPossibility = array();
    */
    
    /*     * ***********************Methode static*************************** */


    /*     * *********************Methode d'instance************************* */

    /*
     * Non obligatoire permet de demander de ne pas supprimer les commandes même si elles ne sont pas dans la nouvelle configuration de l'équipement envoyé en JS
      public function dontRemoveCmd() {
      return true;
      }
     */

  // Exécution d'une commande  
     public function execute($_options = array()) {
		$eqLogic = $this->getEqLogic();
        switch ($this->getlogicalid()) {
            case 'refresh' :
    	    $eqLogic->majinfo();
            break; 
            
            case 'r1on' : 
            $eqLogic->actionrelais("on","1");    
            $eqLogic->majinfo();
            
            break;

            case 'r1off' : 
            $eqLogic->actionrelais ("off","1");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r1imp' : 
            $eqLogic->actionrelais ("imp","1");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r2on' : 
            $eqLogic->actionrelais("on","2");    
            $eqLogic->majinfo();
            
            break;

            case 'r2off' : 
            $eqLogic->actionrelais ("off","2");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r2imp' : 
            $eqLogic->actionrelais ("imp","2");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r3on' : 
            $eqLogic->actionrelais("on","3");    
            $eqLogic->majinfo();
            
            break;

            case 'r3off' : 
            $eqLogic->actionrelais ("off","3");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r3imp' : 
            $eqLogic->actionrelais ("imp","3");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r4on' : 
            $eqLogic->actionrelais("on","4");    
            $eqLogic->majinfo();
            
            break;

            case 'r4off' : 
            $eqLogic->actionrelais ("off","4");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r4imp' : 
            $eqLogic->actionrelais ("imp","4");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r5on' : 
            $eqLogic->actionrelais("on","5");    
            $eqLogic->majinfo();
            
            break;

            case 'r5off' : 
            $eqLogic->actionrelais ("off","5");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r5imp' : 
            $eqLogic->actionrelais ("imp","5");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r6on' : 
            $eqLogic->actionrelais("on","6");    
            $eqLogic->majinfo();
            
            break;

            case 'r6off' : 
            $eqLogic->actionrelais ("off","6");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r6imp' : 
            $eqLogic->actionrelais ("imp","6");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r7on' : 
            $eqLogic->actionrelais("on","7");    
            $eqLogic->majinfo();
            
            break;

            case 'r7off' : 
            $eqLogic->actionrelais ("off","7");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r7imp' : 
            $eqLogic->actionrelais ("imp","7");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r8on' : 
            $eqLogic->actionrelais("on","8");    
            $eqLogic->majinfo();
            
            break;

            case 'r8off' : 
            $eqLogic->actionrelais ("off","8");    
    	    $eqLogic->majinfo();
            
            break;

            case 'r8imp' : 
            $eqLogic->actionrelais ("imp","8");    
    	    $eqLogic->majinfo();
            
            break;



        }    
        
     }

    /*     * **********************Getteur Setteur*************************** */
}


