<?php

namespace Stats\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Orm\TableRegistry;
use Stats\Model\Entity\Stat;
use Cake\Core\Configure;

/**
 * StatisticsComponent
 * logs access to controller/action/params with user id performing the action
 * @author Andrea Cappalunga <andrea.cappalunga@doriansrl.it>
 */
class StatisticsComponent extends Component{
    
    private $controller;
    private $lastEntry;
    
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->Stats = TableRegistry::get('Stats.Stats');
        $this->auth_class = Configure::read('Stats.auth_class')?:'Auth';
    }

    public function beforeFilter(Event $event){
        
        $this->controller = $this->_registry->getController();
        $this->Auth =$this->controller->Auth;
        
        $req = $this->controller->request;
        

        $user = $this->getUser();
        $entry = $this->Stats->createNewRecord($req->params,$user);
     
        $this->lastEntry = $this->Stats->save($entry);
    }
    
    public function beforeRender(Event $event){
        $this->lastEntry->returned = time(); //automaticly converted by orm to datetime
        $this->Stats->save($this->lastEntry);
    }


    /**
     * Retrieve user from current controller and configured auth class
     * Auth Class should be configured in bootstrap.php 
     */
    private function getUser(){
    	try{
        	return $this->controller->{$this->auth_class}->user();
    	}catch(\Exception $e){
    		return null;
    	}catch(\Error $e){
    		return null;
    	}
    }
}
