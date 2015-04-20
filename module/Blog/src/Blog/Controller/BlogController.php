<?php
namespace Blog\Controller;

use Blog\Service\PostServiceAwareInterface;
use Blog\Service\PostServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 *
 * @author David
 */
class BlogController extends AbstractActionController implements PostServiceAwareInterface {
    /**
     * @var PostServiceInterface
     */
    protected $postService;

    public function indexAction() {
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $data = $em->getRepository('Blog\Entity\Posts')->findAll();
        return new ViewModel(array(
            'posts' => $data
        ));
    }

    /**
     * @see \Blog\Service\PostServiceAwareInterface::getPostService()
     * @return PostServiceInterface
     */
    public function getPostService() {
        return $this->postService;
    }

    /**
     * @see \Blog\Service\PostServiceAwareInterface::setPostService()
     * @param PostServiceInterface $service
     */
    public function setPostService(PostServiceInterface $service) {
        $this->postService = $service;
    }
}