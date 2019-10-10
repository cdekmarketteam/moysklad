<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntitiesEndpoint;
use MoySklad\Client\Endpoint\DeleteEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Client\Endpoint\GetMetadataAttributeEndpoint;
use MoySklad\Client\Endpoint\PostEntitiesEndpoint;
use MoySklad\Client\Endpoint\PostEntityEndpoint;
use MoySklad\Client\Endpoint\PutEntityEndpoint;
use MoySklad\Entity\Account;
use MoySklad\Entity\Agent\Counterparty;
use MoySklad\Entity\ContactPerson;
use MoySklad\Entity\ListEntity;
use MoySklad\Entity\Metadata\AdditionMetadata;
use MoySklad\Entity\Note;
use MoySklad\Entity\State;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class CounterpartyClient extends EntityClientBase
{
    use
        GetEntitiesListEndpoint,
        GetEntityEndpoint,
        PutEntityEndpoint,
        PostEntityEndpoint,
        DeleteEntityEndpoint,
        GetMetadataAttributeEndpoint,
        PostEntitiesEndpoint,
        DeleteEntitiesEndpoint;

    /**
     * CounterpartyClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/counterparty/');
    }

    /**
     * @param string $counterpartyId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getAccountsList(string $counterpartyId, array $params = []): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/accounts')->params($params)->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @param string $counterpartyId
     * @param string $accountId
     * @return Account
     * @throws ApiClientException
     */
    public function getAccount(string $counterpartyId, string $accountId): Account
    {
        /** @var $account Account */
        $account = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/accounts/'.$accountId)->get(Account::class);

        return $account;
    }

    /**
     * @return AdditionMetadata
     * @throws ApiClientException
     */
    public function getMetadata(): AdditionMetadata
    {
        /** @var $additionMetadata AdditionMetadata */
        $additionMetadata = RequestExecutor::path($this->getApi(), $this->getPath().'metadata')->get(AdditionMetadata::class);

        return $additionMetadata;
    }

    /**
     * @param string $counterpartyId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getContactPersonsList(string $counterpartyId, array $params = []): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/contactpersons')->params($params)->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @param string $counterpartyId
     * @param ContactPerson $contactPerson
     * @return ContactPerson[]
     * @throws ApiClientException
     * @throws \Exception
     */
    public function createContactPerson(string $counterpartyId, ContactPerson $contactPerson): array
    {
        $className = ContactPerson::class;

        /** @var ContactPerson[] $contactPersons */
        $contactPersons = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/contactpersons')->body($contactPerson)->post("array<{$className}>");

        return $contactPersons;
    }

    /**
     * @param string $counterpartyId
     * @param string $contactPersonId
     * @return ContactPerson
     * @throws ApiClientException
     */
    public function getContactPerson(string $counterpartyId, string $contactPersonId): ContactPerson
    {
        /** @var ContactPerson $contactPerson */
        $contactPerson = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/contactpersons/'.$contactPersonId)->get(ContactPerson::class);

        return $contactPerson;
    }

    /**
     * @param string $counterpartyId
     * @param string $contactPersonId
     * @param ContactPerson $updatedContactPerson
     * @return ContactPerson
     * @throws ApiClientException
     */
    public function updateContactPerson(string $counterpartyId, string $contactPersonId, ContactPerson $updatedContactPerson): ContactPerson
    {
        /** @var ContactPerson $contactPerson */
        $contactPerson = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/contactpersons/'.$contactPersonId)->body($updatedContactPerson)->put(ContactPerson::class);

        return $contactPerson;
    }

    /**
     * @param string $counterpartyId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getNotesList(string $counterpartyId, array $params = []): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/notes')->params($params)->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @param string $counterpartyId
     * @param Note $note
     * @return Note[]
     * @throws ApiClientException
     * @throws \Exception
     */
    public function createNote(string $counterpartyId, Note $note): array
    {
        $className = Note::class;

        /** @var Note[] $notes */
        $notes = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/notes')->body($note)->post("array<{$className}>");

        return $notes;
    }

    /**
     * @param string $counterpartyId
     * @param string $noteId
     * @return Note
     * @throws ApiClientException
     */
    public function getNote(string $counterpartyId, string $noteId): Note
    {
        /** @var Note $note */
        $note = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/notes/'.$noteId)->get(Note::class);

        return $note;
    }

    /**
     * @param string $counterpartyId
     * @param string $noteId
     * @param Note $updatedNote
     * @return Note
     * @throws ApiClientException
     */
    public function updateNote(string $counterpartyId, string $noteId, Note $updatedNote): Note
    {
        /** @var Note $note */
        $note = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/notes/'.$noteId)->body($updatedNote)->put(Note::class);

        return $note;
    }

    /**
     * @param string $counterpartyId
     * @param string $noteId
     * @throws ApiClientException
     */
    public function deleteNote(string $counterpartyId, string $noteId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/notes/'.$noteId)->delete();
    }

    /**
     * @param State $state
     * @return State
     * @throws ApiClientException
     * @throws \Exception
     */
    public function createState(State $state): State
    {
        /** @var State $state */
        $state = RequestExecutor::path($this->getApi(), $this->getPath().'metadata/states')->body($state)->post(State::class);

        return $state;
    }

    /**
     * @param string $stateId
     * @param State $updatedState
     * @return State
     * @throws ApiClientException
     * @throws \Exception
     */
    public function updateState(string $stateId, State $updatedState): State
    {
        /** @var State $state */
        $state = RequestExecutor::path($this->getApi(), $this->getPath().'metadata/states/'.$stateId)->body($updatedState)->put(State::class);

        return $state;
    }

    /**
     * @param string $stateId
     * @throws ApiClientException
     */
    public function deleteState(string $stateId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath().'/metadata/states/'.$stateId)->delete();
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Counterparty::class;
    }
}
