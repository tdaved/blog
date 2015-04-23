<?php

namespace Blog\Controller;

use Blog\Form\BlogForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

/**
 * @author David
 */
class PostController extends AbstractActionController {
    
    public function createAction() {
        
        return new ViewModel();
    }
    
    public function editAction() {
        $form = new BlogForm();
        $form->get('post-submit')->setValue('Edit');
        $request = $this->getRequest();
        $prg = $this->prg();
        
        if($prg === false) {
            return array('form' => $form);
        } elseif($request->isPost()) {
            $this->redirect()->toRoute($this->getEvent()->getRouteMatch());
        } elseif($request->isGet()) {
            echo var_dump($prg);die('GET');
        }
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
