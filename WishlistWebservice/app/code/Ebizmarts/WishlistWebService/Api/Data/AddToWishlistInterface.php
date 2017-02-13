<?php

namespace Ebizmarts\WishlistWebService\Api\Data;

interface AddToWishlistInterface
{
    const SKU   = 'sku';
    const EMAIL = 'email';

    /**
     * @param string $sku
     * @return void
     */
    public function setSku($sku);

    /**
     * @return string
     */
    public function getSku();

    /**
     * @param string $email
     * @return void
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getEmail();
}