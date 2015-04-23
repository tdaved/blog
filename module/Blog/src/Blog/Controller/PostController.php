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
        $form->setAttribute('method', 'post');
        $form->setAttribute('action', '?');
        
        $prg = $this->prg('/blog/' . $this->params()->fromRoute('id'), true);
        
        //echo '<pre>' . var_dump('/blog/' . $this->params()->fromRoute('id')) . '</pre>';die();
        
        /*if($prg instanceof \Zend\Http\PhpEnvironment\Response) {
            $data = $this->prg();//getRequest()->getPost();
            if($form->isValid()) {
                $prg = $this->prg($this->params('slug'), true);
            } else {
                $this->flashMessenger()->addErrorMessage('Form is not valid.');
            }
        } elseif($prg === false) {
            ;
        }
        
        return new ViewModel(array(
            'form' => $form
        ));*/
        
        if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
            $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
            $data = $em->getRepository('Blog\Entity\Posts')->find($this->params('id'));
            $data->setTitle($prg['post-title']);
            $data->setContent($prg['post-text']);
            return $prg;
        } elseif ($prg === false) {
            return array('form' => $form);
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
