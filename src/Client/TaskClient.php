<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntitiesEndpoint;
use MoySklad\Client\Endpoint\DeleteEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Client\Endpoint\GetEntityEndpoint;
use MoySklad\Client\Endpoint\PostEntitiesEndpoint;
use MoySklad\Client\Endpoint\PostEntityEndpoint;
use MoySklad\Client\Endpoint\PutEntityEndpoint;
use MoySklad\Entity\ListEntity;
use MoySklad\Entity\Task;
use MoySklad\Entity\TaskNote;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class TaskClient extends EntityClientBase
{
    use
        GetEntitiesListEndpoint,
        PostEntityEndpoint,
        PostEntitiesEndpoint,
        DeleteEntityEndpoint,
        DeleteEntitiesEndpoint,
        GetEntityEndpoint,
        PutEntityEndpoint;

    /**
     * TaskClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/task/');
    }

    /**
     * @param string $taskId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getTaskNotesList(string $taskId, array $params = []): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath().$taskId.'/notes')->params($params)->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @param string $taskId
     * @param TaskNote $taskNote
     * @return TaskNote[]
     * @throws ApiClientException
     * @throws \Exception
     */
    public function createTaskNote(string $taskId, TaskNote $taskNote): array
    {
        $className = TaskNote::class;

        /** @var TaskNote[] $taskNotes */
        $taskNotes = RequestExecutor::path($this->getApi(), $this->getPath().$taskId.'/notes')->body($taskNote)->post("array<{$className}>");

        return $taskNotes;
    }

    /**
     * @param string $taskId
     * @param string $taskNoteId
     * @return TaskNote
     * @throws ApiClientException
     * @throws \Exception
     */
    public function getTaskNote(string $taskId, string $taskNoteId): TaskNote
    {
        /** @var TaskNote $taskNote */
        $taskNote = RequestExecutor::path($this->getApi(), $this->getPath().$taskId.'/notes/'.$taskNoteId)->get(TaskNote::class);

        return $taskNote;
    }

    /**
     * @param string $taskId
     * @param string $taskNoteId
     * @param TaskNote $updatedTaskNote
     * @return TaskNote
     * @throws ApiClientException
     * @throws \Exception
     */
    public function updateTaskNote(string $taskId, string $taskNoteId, TaskNote $updatedTaskNote): TaskNote
    {
        /** @var TaskNote $taskNote */
        $taskNote = RequestExecutor::path($this->getApi(), $this->getPath().$taskId.'/notes/'.$taskNoteId)->body($updatedTaskNote)->put(TaskNote::class);

        return $taskNote;
    }

    /**
     * @param string $taskId
     * @param string $taskNoteId
     * @throws ApiClientException
     * @throws \Exception
     */
    public function deleteTaskNote(string $taskId, string $taskNoteId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath().$taskId.'/notes/'.$taskNoteId)->delete();
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Task::class;
    }
}
