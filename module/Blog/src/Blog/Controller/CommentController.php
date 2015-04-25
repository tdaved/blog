<?php
namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Blog\Service\EntityManagerAwareInterface;
use Blog\Service\EntityManagerAwareTrait;
use Blog\Entity\Comments;
use Blog\Form\CommentForm;

class CommentController extends AbstractActionController implements EntityManagerAwareInterface
{
    use EntityManagerAwareTrait;

    /**
     * Save if the form is valid, otherwice just return to the blog post
     */
    public function addAction()
    {
        $form = new CommentForm();
        $form->setData($this->params()
            ->fromPost());
        if ($form->isValid()) {
            $comments = new Comments();
            $comments->exchangeArray($this->params()
                ->fromPost());
            $comments->setPost($this->em->getRepository('Blog\Entity\Posts')
                ->find($this->params('id')));
            $this->em->persist($comments);
            $this->em->flush();
        }
        $this->redirect()->toRoute('post', array(
            'id' => $this->params('id')
        ));
    }
}
