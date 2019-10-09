<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Entity\CompanySettings;
use MoySklad\Entity\PriceType;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

class CompanySettingsClient extends EntityClientBase
{
    /**
     * CompanySettingsClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/context/companysettings/');
    }

    /**
     * @return PriceType[]
     * @throws ApiClientException
     */
    public function getPriceTypes(): array
    {
        $className = PriceType::class;

        /** @var PriceType[] $priceTypes */
        $priceTypes = RequestExecutor::path($this->getApi(), $this->getPath().'pricetype')->get("array<{$className}>");

        return $priceTypes;
    }

    /**
     * @param array $priceTypes
     * @return array
     * @throws ApiClientException
     */
    public function editPriceTypes(array $priceTypes): array
    {
        $className = PriceType::class;

        /** @var PriceType[] $priceTypes */
        $priceTypes = RequestExecutor::path($this->getApi(), $this->getPath().'pricetype')->bodyArray($priceTypes)->post("array<{$className}>");

        return $priceTypes;
    }

    /**
     * @param string $priceTypeId
     * @return PriceType
     * @throws ApiClientException
     */
    public function getPriceTypeById(string $priceTypeId): PriceType
    {
        /** @var PriceType $priceType */
        $priceType = RequestExecutor::path($this->getApi(), $this->getPath().'pricetype/'.$priceTypeId)->get(PriceType::class);

        return $priceType;
    }

    /**
     * @param PriceType $priceType
     * @return PriceType
     * @throws ApiClientException
     */
    public function getPriceTypeByEntity(PriceType $priceType): PriceType
    {
        return $this->getPriceTypeById($priceType->id);
    }

    /**
     * @return PriceType
     * @throws ApiClientException
     */
    public function getDefaultPriceType(): PriceType
    {
        /** @var PriceType $priceType */
        $priceType = RequestExecutor::path($this->getApi(), $this->getPath().'pricetype/default')->get(PriceType::class);

        return $priceType;
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return CompanySettings::class;
    }
}
