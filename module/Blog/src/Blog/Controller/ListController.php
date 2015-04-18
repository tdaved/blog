<?php

namespace Blog\Controller;

use Blog\Service\PostServiceAwareInterface;
use Blog\Service\PostServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * @author David
 */
class ListController extends AbstractActionController implements PostServiceAwareInterface {
    protected $postService;
    
    public function __construct(PostServiceInterface $postService) {
        $this->postService = $postService;
    }
    
    public function indexAction() {
        return new ViewModel(array(
            'posts' => $this->postService->findAllPosts()
        ));
    }
}
