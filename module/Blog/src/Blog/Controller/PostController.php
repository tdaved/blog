<?php

namespace Blog\Controller;

use Blog\Entity\Posts;
use Blog\Form\BlogForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * @author David
 */
class PostController extends AbstractActionController {
    
    protected $em;

    public function getEntityManager() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
    
    public function indexAction() {
        return new ViewModel(array(
            'post' => $this->getEntityManager()->getRepository('Blog\Entity\Posts')->find($this->params('id')),
        ));
    }
    
    public function addAction() {
        $form = new BlogForm();
        $form->get('post-submit')->setValue('Save changes');
        $request = $this->getRequest();
        $prg = $this->prg();
        
        if($prg === false) {
            return array('form' => $form);
        } elseif($request->isPost()) {
            $post = new Posts();
            $this->getEntityManager();
            $post->exchangeArray($request->getPost());
            $this->em->persist($post);
            $this->em->flush();
            
            $this->redirect()->toRoute('blog');
            return $prg;
        } elseif($request->isGet()) {
            return array('form' => $form);
        }
    }
    
    public function editAction() {
        $form = new BlogForm();
        $form->get('post-submit')->setValue('Save changes');
        $request = $this->getRequest();
        $prg = $this->prg();
        
        if($prg === false) {
            return array('form' => $form);
        } elseif($request->isPost()) {
            $data = $this->getEntityManager()->getRepository('Blog\Entity\Posts')->find($this->params('id'));
            
            return $prg;
        } elseif($request->isGet()) {
            return array('form' => $form);
        }
    }
    
    public function deleteAction() {
        
    }
    
}
