<?php

namespace Ebizmarts\WishlistWebService\Api\Data;

class AddToWishlist extends \Magento\Framework\Api\AbstractExtensibleObject implements AddToWishlistInterface
{

    /**
     * @param string $sku
     * @return void
     */
    public function setSku($sku)
    {
        $this->setData(self::SKU, $sku);
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->_get(self::SKU);
    }

    /**
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->setData(self::EMAIL, $email);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_get(self::EMAIL);
    }
}