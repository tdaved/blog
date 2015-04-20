<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * @author David
 */
class PostController extends AbstractActionController {
    
    public function createAction() {
        
        return new ViewModel();
    }
    
    public function editAction() {
        
        return new ViewModel();
    }
    
    public function postAction() {
        $postId = $this->params('id');
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $data = $em->getRepository('Blog\Entity\Posts')->find($postId);
        return new ViewModel(array(
            'post' => $data
        ));
    }
    
}
