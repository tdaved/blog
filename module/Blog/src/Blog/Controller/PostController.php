<?php
namespace Blog\Controller;

use Blog\Entity\Posts;
use Blog\Form\BlogForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Service\EntityManagerAwareInterface;
use Blog\Service\EntityManagerAwareTrait;
use Blog\Form\CommentForm;

/**
 *
 * @author David
 */
class PostController extends AbstractActionController implements EntityManagerAwareInterface
{
    
    use EntityManagerAwareTrait;

    protected function prg($callInvoke = false)
    {
        $prg = $this->getPluginManager()->get('prg');
        if ($callInvoke) {
            return $prg();
        }
        return $prg;
    }

    public function indexAction()
    {
        $form = new CommentForm();
        $form->setAttribute('action', $this->url()
            ->fromRoute('post/comment', array(), true));
        $post = $this->getEntityManager()
            ->getRepository('Blog\Entity\Posts')
            ->find($this->params('id'));
        $comments = $this->getEntityManager()
            ->getRepository('Blog\Entity\Comments')
            ->findByPost($this->params('id'));
        
        return new ViewModel(array(
            'post' => $post,
            'comments' => $comments,
            'form' => $form
        ));
    }

    public function editAction()
    {
        /* @var $form BlogForm */
        $form = new BlogForm();
        $form->get('post-submit')->setValue('Save changes');
        $request = $this->getRequest();
        $prg = $this->prg(true);
        /* @var $post Posts */
        $post = $this->getEntityManager()
            ->getRepository('Blog\Entity\Posts')
            ->find($this->params('id'));
        if ($post === null) {
            $post = new Posts();
        }
        if ($prg === false) {
            $form->setData([
                'post-text' => $post->getContent(),
                'post-title' => $post->getTitle()
            ]);
        } elseif ($request->isPost()) {
            $form->setData($this->params()
                ->fromPost());
            if ($form->isValid()) {
                $post->exchangeArray($request->getPost());
                $this->em->persist($post);
                $this->em->flush();
                unset($this->prg()->getSessionContainer()->post);
                $this->redirect()->toRoute('blog');
                return $this->response;
            } else {
                $this->prg()->getSessionContainer()->messages = $form->getMessages();
            }
        } elseif ($request->isGet()) {
            $form->setData($prg);
            $form->setMessages($this->prg()
                ->getSessionContainer()->messages);
            unset($this->prg()->getSessionContainer()->messages);
        }
        return array(
            'form' => $form
        );
    }

    public function deleteAction()
    {
        $post = $this->getEntityManager()
            ->getRepository('Blog\Entity\Posts')
            ->find($this->params('id'));
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');
            if ($del === 'Yes') {
                $this->getEntityManager()->remove($post);
                $this->getEntityManager()->flush();
            }
            $this->redirect()->toRoute('blog');
        }
        
        return array(
            'post' => $post
        );
    }
}
