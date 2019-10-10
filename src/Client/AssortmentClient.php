<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntitiesEndpoint;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Entity\Assortment;
use MoySklad\Entity\ListEntity;
use MoySklad\Entity\Template\EmbeddedTemplate;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class AssortmentClient extends EntityClientBase
{
    use
        GetEntitiesListEndpoint,
        DeleteEntitiesEndpoint;

    /**
     * AssortmentClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/assortment/');
    }

    /**
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getEmbeddedTemplatesList(array $params = []): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath().'metadata/embeddedtemplate')->params($params)->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @param string $embeddedTemplateId
     * @return EmbeddedTemplate
     * @throws ApiClientException
     */
    public function getEmbeddedTemplate(string $embeddedTemplateId): EmbeddedTemplate
    {
        /** @var $embeddedTemplate EmbeddedTemplate */
        $embeddedTemplate = RequestExecutor::path($this->getApi(), $this->getPath().'metadata/embeddedtemplate/'.$embeddedTemplateId)->get(EmbeddedTemplate::class);

        return $embeddedTemplate;
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Assortment::class;
    }
}
