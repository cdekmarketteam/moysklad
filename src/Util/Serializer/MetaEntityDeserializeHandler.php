<?php

namespace MoySklad\Util\Serializer;

use JMS\Serializer\Serializer;
use MoySklad\Entity\Meta;

class MetaEntityDeserializeHandler
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @param $visitor
     * @param array $metaEntity
     * @param array $type
     * @return array|mixed
     */
    public function __invoke($visitor, array $metaEntity, array $type)
    {
        $this->serializer = SerializerInstance::getInstance();

        try {
            $className = Meta::getClassNameByType($metaEntity['meta']['type']);
        } catch (\InvalidArgumentException $exception) {
            //@todo log it
            return $metaEntity;
        }

        return $this->serializer->deserialize(json_encode($metaEntity), $className, 'json');
    }
}
