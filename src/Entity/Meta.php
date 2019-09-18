<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

final class Meta
{
    private const TYPES = [
        'counterparty' => Agent\Counterparty::class,
        'employee' => Agent\Employee::class,
        'organization' => Agent\Organization::class,
        'bonusprogram' => Discount\BonusProgram::class,
        'account' => Account::class,
        'address' => Address::class,
        'cashier' => Cashier::class,
        'contactperson' => ContactPerson::class,
        'context' => Context::class,
        'country' => Country::class,
        'note' => Note::class,
        'group' => Group::class,
        'image' => Image::class,
        'pricetype' => PriceType::class,
        'region' => Region::class,
        'productfolder' => ProductFolder::class,
        'state' => State::class,
    ];

    /**
     * @Type("string")
     */
    private $href;

    /**
     * @Type("string")
     */
    private $metadataHref;

    /**
     * @Type("string")
     */
    private $type;

    /**
     * @Type("string")
     */
    private $mediaType;

    /**
     * @Type("string")
     */
    private $uuidHref;

    /**
     * @Type("int")
     */
    private $size;

    /**
     * @Type("int")
     */
    private $limit;

    /**
     * @Type("int")
     */
    private $offset;

    /**
     * @param string $type
     * @return string
     */
    public static function getClassNameByType(string $type): string
    {
        if (!isset(self::TYPES[$type])) {
            throw new \InvalidArgumentException('MetaEntity type unsupported');
        }

        return self::TYPES[$type];
    }
}
