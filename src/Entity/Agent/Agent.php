<?php

namespace MoySklad\Entity\Agent;

use MoySklad\Entity\Group;
use MoySklad\Entity\MetaEntity;

abstract class Agent extends MetaEntity
{
    const COUNTERPARTY = 'counterparty',
        EMPLOYEE = 'employee',
        ORGANIZATION = 'organization';

    /** @var Employee */
    public $owner;

    /** @var bool */
    public $shared;

    /** @var Group */
    public $group;

    /** @var string */
    public $externalCode;

    /** @var \DateTime */
    public $created;

    /** @var \DateTime */
    public $updated;

    /** @var array */
    public $attributes = [];

    /**
     * @param array $data
     * @return Agent
     */
    public static function createFromArray(array $data): Agent
    {
        switch ($data['type']) {
            case self::COUNTERPARTY:
                $entity = Counterparty::createFromArray($data);
                break;
            case self::EMPLOYEE:
                $entity = Employee::createFromArray($data);
                break;
            case self::ORGANIZATION:
                $entity = Organization::createFromArray($data);
                break;
            default:
                throw new \InvalidArgumentException(sprintf("Unsupported agent's type '%s'", $data['type']));
        }

        return $entity;
    }
}
