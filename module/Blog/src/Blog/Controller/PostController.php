<?php

namespace Blog\Controller;

use Blog\Form\BlogForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;

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
    
    public function editAction() {
        $form = new BlogForm();
        $form->get('post-submit')->setValue('Edit');
        $request = $this->getRequest();
        $prg = $this->prg();
        //$em = $this->getEntityManager();
        
        if($prg === false) {
            return array('form' => $form);
        } elseif($request->isPost()) {
            $data = $this->getEntityManager()->getRepository('Blog\Entity\Posts')->find($this->params('id'));
            
            $data->setTitle($title);
            $data->setContent($text);
            
            return $prg;
        } elseif($request->isGet()) {
            return array('form' => $form);
        }
    }
    
    public function postAction() {
        return new ViewModel(array(
            'post' => $this->getEntityManager()->getRepository('Blog\Entity\Posts')->find($this->params('id')),
        ));
    }
    
}
