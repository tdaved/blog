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
class ListController extends AbstractActionController implements PostServiceAwareInterface {
    /**
     * @var PostServiceInterface
     */
    protected $postService;

    public function indexAction() {
        return new ViewModel(array(
            'posts' => $this->postService->findAllPosts()
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