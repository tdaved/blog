<?php

namespace Blog\Service;

use Blog\Model\Post;

/**
 * @author David
 */
class PostService implements PostServiceInterface
{
    /**
     * 
     * @return array[Post]
     */
    public function findAllPosts() {
        $allPosts = array();
        
        foreach ($this->data as $key => $post) {
            $allPosts[] = $this->findPost($key);
        }
        
        return $allPosts;
    }
    
    /**
     * 
     * @param $id
     * @return Post
     */
    public function findPost($id) {
        $postData = $this->data[$id];
        
        $model = new Post();
        $model->setId($postData['id']);
        $model->setTitle($postData['title']);
        $model->setText($postData['text']);
        
        return $model;
    }
}
