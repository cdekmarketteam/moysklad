<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Image;
use MoySklad\Entity\ListEntity;
use MoySklad\Entity\Product\Product;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class ProductClient extends EntityClientBase
{
    use GetListEndpoint;

    /**
     * ProductClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/product/');
    }

    /**
     * @param string $productId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getImagesList(string $productId, array $params = []): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath().$productId.'/images')->params($params)->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @param string $productId
     * @param Image $image
     * @return Image
     * @throws ApiClientException
     * @throws \Exception
     */
    public function addImage(string $productId, Image $image): Image
    {
        $className = Image::class;

        /** @var Image $image */
        $image = RequestExecutor::path($this->getApi(), $this->getPath().$productId.'/images')->body($image)->post("array<{$className}>");

        return $image;
    }

    /**
     * @param string $productId
     * @param string $imageId
     * @throws ApiClientException
     */
    public function deleteImageById(string $productId, string $imageId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath().$productId.'/images/'.$imageId)->delete();
    }

    /**
     * @param string $productId
     * @param Image $image
     * @throws ApiClientException
     */
    public function deleteImageByEntity(string $productId, Image $image): void
    {
        $this->deleteImageById($productId, $image->id);
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Product::class;
    }
}
