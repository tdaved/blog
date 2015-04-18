<?php

namespace Blog\Controller;

use Blog\Service\PostService;
use Blog\Service\PostServiceAwareInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * @author David
 */
class ListController extends AbstractActionController implements PostServiceAwareInterface {
    protected $postService;
    
    public function indexAction() {
        return new ViewModel(array(
            'posts' => $this->postService->findAllPosts()
        ));
    }

    public function getPostService() {
        return $this->postService;
    }

    public function setPostService(PostService $service) {
        $this->postService = $service;
    }
}