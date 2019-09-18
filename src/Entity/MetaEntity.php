<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\ApiClient;
use MoySklad\Http\RequestExecutor;

class MetaEntity
{
    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("string")
     */
    public $accountId;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    protected $meta;

    /**
     * @param ApiClient $api
     * @throws \MoySklad\Util\Exception\ApiClientException
     */
    public function fetch(ApiClient $api): void
    {
        $fetched = RequestExecutor::url($api, $this->meta->href)->get(get_class($this));

        foreach ($this as $property => &$value) {
            $value = $fetched->$property;
        }
    }
}
