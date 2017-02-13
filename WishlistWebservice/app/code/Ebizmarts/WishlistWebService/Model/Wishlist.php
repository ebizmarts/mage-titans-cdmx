<?php

namespace Ebizmarts\WishlistWebService\Model;

class Wishlist implements \Ebizmarts\WishlistWebService\Api\WishlistInterface
{

    /** @var \Magento\Catalog\Api\ProductRepositoryInterface */
    private $productRepository;

    /** @var \Magento\Customer\Api\CustomerRepositoryInterface */
    private $customerRepository;

    /** @var \Magento\Wishlist\Model\WishlistFactory */
    private $wishlistFactory;

    /**
     * Wishlist constructor.
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository
     * @param \Magento\Wishlist\Model\WishlistFactory $wishlistFactory
     */
    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Wishlist\Model\WishlistFactory $wishlistFactory
    ) {
        $this->wishlistFactory    = $wishlistFactory;
        $this->productRepository  = $productRepository;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param \Ebizmarts\WishlistWebService\Api\Data\AddToWishlistInterface $data
     * @return bool
     */
    public function add(\Ebizmarts\WishlistWebService\Api\Data\AddToWishlistInterface $data)
    {
        $result = true;

        $product = $this->productRepository->get($data->getSku());

        $customer = $this->customerRepository->get($data->getEmail());

        $wishlist = $this->wishlistFactory->create();

        $wishlist->loadByCustomerId($customer->getId());

        //@TODO: We are still missing a lot of validation here :).

        try {
            $wishlist->addNewItem($product);
        } catch(\Exception $e) {
            $result = false;
        }

        return $result;
    }
}