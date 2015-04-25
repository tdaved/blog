<?php
namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Service\EntityManagerAwareInterface;
use Blog\Service\EntityManagerAwareTrait;

/**
 *
 * @author David
 */
class BlogController extends AbstractActionController implements EntityManagerAwareInterface
{
    use EntityManagerAwareTrait;

    public function indexAction()
    {
        $em = $this->getEntityManager();
        $posts = $em->getRepository('Blog\Entity\Posts')->findBy(array(), array(
            'date' => 'DESC'
        ));
        return new ViewModel(array(
            'posts' => $posts
        ));
    }
}