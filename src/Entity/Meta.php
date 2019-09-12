<?php

namespace MoySklad\Entity;

use MoySklad\Entity\Agent\Counterparty;
use MoySklad\Entity\Agent\Employee;
use MoySklad\Entity\Agent\Organization;

final class Meta
{
    private const TYPES = [
        AgentAccount::class => 'account',
        Counterparty::class => 'counterparty',
        Employee::class => 'counterparty',
        Organization::class => 'organization',
        Group::class => 'group',
    ];

    /**
     * @var string
     */
    private $href;

    /**
     * @var string
     */
    private $metadataHref;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $mediaType;

    /**
     * @var string
     */
    private $uuidHref;

    /**
     * @var int
     */
    private $size;

    /**
     * @var int
     */
    private $limit;

    /**
     * @var int
     */
    private $offset;

    /**
     * Meta constructor.
     * @param MetaEntity|null $entity
     * @param string $host
     */
    public function __construct(MetaEntity $entity = null, string $host = '')
    {
        if (is_null($entity) || is_null($entity->id) || empty($host)) {
            return;
        }

//        $this->type = self::TYPES[get_class($entity)];
//        $this->href = MetaHrefUtils::makeHref($this->type, $entity, $host);
//
//        if ($this->type != self::TYPES[CustomTemplate::class] && $this->type != self::TYPES[EmbeddedTemplate::class]) {
//            $this->metadataHref = MetaHrefUtils::makeMetadataHref($this->type, $entity, $host);
//        }
    }
}
