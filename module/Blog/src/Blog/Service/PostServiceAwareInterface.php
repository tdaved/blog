<?php

namespace Blog\Service;

/**
 * @author David
 */
interface PostServiceAwareInterface {
    public function getPostService();
    public function setPostService(PostService $service);
}
