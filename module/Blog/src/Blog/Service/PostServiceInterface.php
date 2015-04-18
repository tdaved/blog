<?php

namespace Blog\Service;

/**
 * @author David
 */
interface PostServiceInterface {
    /**
     * @return array[Post]
     */
    public function findAllPosts();
    
    /**
     * @param int $id
     * @return Post
     */
    public function findPost($id);
}