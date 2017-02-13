<?php

namespace Ebizmarts\WishlistWebService\Api;

interface WishlistInterface
{

    /**
     * @param \Ebizmarts\WishlistWebService\Api\Data\AddToWishlistInterface $data
     * @return bool
     */
    public function add(\Ebizmarts\WishlistWebService\Api\Data\AddToWishlistInterface $data);

}