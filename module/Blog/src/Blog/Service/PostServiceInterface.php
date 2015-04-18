<?php

namespace Blog\Service;

/**
 * @author David
 */
interface PostServiceInterface {
    public function findAllPosts();
    public function findPost($id);
}
