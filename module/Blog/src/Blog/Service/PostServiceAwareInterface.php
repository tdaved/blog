<?php

namespace Blog\Service;

/**
 * @author David
 */
interface PostServiceAwareInterface {
    /**
     * @return PostServiceInterface
     */
    public function getPostService();
    /**
     * @param PostServiceInterface $service
     */
    public function setPostService(PostServiceInterface $service);
}