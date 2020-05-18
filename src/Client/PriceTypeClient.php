<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\PostEntitiesEndpoint;
use MoySklad\Entity\ListEntity;
use MoySklad\Entity\PriceType;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class PriceTypeClient extends EntityClientBase
{
    use PostEntitiesEndpoint {
        massUpdate as public traitMassUpdate;
    }

    /**
     * PriceTypeClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/context/companysettings/pricetype/');
    }

    /**
     * @param PriceType $newEntity
     * @return PriceType
     * @throws ApiClientException
     * @throws \Exception
     */
    public function create(PriceType $newEntity): PriceType
    {
        $priceTypeList = $this->getList();
        $priceTypeList->rows[] = $newEntity;

        /** @#var PriceType[] $priceTypes */
        $priceTypes = $this->traitMassUpdate($priceTypeList->rows);

        foreach ($priceTypes as $priceType) {
            if ($priceType->name === $newEntity->name) {
                return $priceType;
            }
        }

        throw new \RuntimeException('Failed to create this PriceType');
    }

    /**
     * @param string $id
     * @return PriceType
     * @throws ApiClientException
     * @throws \Exception
     */
    public function get(string $id): PriceType
    {
        foreach ($this->getList()->rows as $priceType) {
            if ($priceType->id === $id) {
                return $priceType;
            }
        }

        throw new ApiClientException('', 404, '404 Not Found');
    }

    /**
     * @param string $id
     * @param PriceType $updatedPriceType
     * @return PriceType
     * @throws ApiClientException
     * @throws \Exception
     */
    public function update(string $id, PriceType $updatedPriceType): PriceType
    {
        $priceTypes = [];
        foreach ($this->getList()->rows as $priceType) {
            if ($priceType->id === $id) {
                $priceType->name         = $updatedPriceType->name;
                $priceType->externalCode = $updatedPriceType->externalCode;
            }

            $priceTypes[] = $priceType;
        }

        $priceTypes = $this->traitMassUpdate($priceTypes);
        foreach ($priceTypes as $priceType) {
            if ($priceType->id === $id) {
                return $priceType;
            }
        }

        throw new \RuntimeException('Failed to update this PriceType');
    }

    /**
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function getList(array $params = []): ListEntity
    {
        $listEntity = new ListEntity();
        $listEntity->rows = RequestExecutor::path(
            $this->getApi(),
            $this->getPath()
        )
            ->params($params)
            ->get('array<' . PriceType::class . '>');

        return $listEntity;
    }

    /**
     * @param string $id
     * @throws ApiClientException
     * @throws \Exception
     */
    public function delete(string $id): void
    {
        $priceTypes = [];
        foreach ($this->getList()->rows as $priceType) {
            if ($priceType->id === $id) {
                continue;
            }

            $priceTypes[] = $priceType;
        }

        $this->traitMassUpdate($priceTypes);
    }

    /**
     * @param PriceType[] $priceTypes
     *
     * @throws ApiClientException
     */
    public function massDelete(array $priceTypes)
    {
        $deletingPriceTypeHrefs = [];
        foreach ($priceTypes as $priceType) {
            $deletingPriceTypeHrefs[] = $priceType['meta']->href;
        }

        $existingPriceTypes = [];
        foreach ($this->getList()->rows as $existingPriceType) {
            if (in_array($existingPriceType->getMeta()->href, $deletingPriceTypeHrefs)) {
                continue;
            }

            $existingPriceTypes[] = $existingPriceType;
        }

        $this->traitMassUpdate($existingPriceTypes);
    }

    /**
     * @param PriceType[] $entities
     *
     * @return array
     * @throws ApiClientException
     */
    public function massUpdate(array $entities): array
    {
        $existingEntities = $this->getList()->rows;

        $newEntities = [];
        foreach ($entities as $entity) {
            if (empty($entity->id)) {
                $newEntities[] = $entity;
                continue;
            }

            foreach ($existingEntities as &$existingEntity) {
                if ($entity->id === $existingEntity->id) {
                    $existingEntity = $entity;
                }
            }
        }

        $allEntities = $this->traitMassUpdate(array_merge($existingEntities, $newEntities));
        $allEntities = $this->indexObjectsList($allEntities, 'name');

        $updatedEntities = [];
        foreach ($entities as $entity) {
            $name = $entity->name;
            if (isset($allEntities[$name])) {
                $updatedEntities[] = $allEntities[$name];
            } else {
                throw new \RuntimeException("The PriceType with name = '$name' not found. May be it wasn't created");
            }
        }

        return $updatedEntities;
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return PriceType::class;
    }

    protected function indexObjectsList(array $objects, string $indexProperty): array
    {
        $indexedList = [];
        foreach ($objects as $object) {
            $indexedList[$object->$indexProperty] = $object;
        }

        return $indexedList;
    }
}
