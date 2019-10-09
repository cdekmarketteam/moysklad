<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteByEndpoint;
use MoySklad\Client\Endpoint\GetByEndpoint;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Client\Endpoint\GetMetadataAttributeEndpoint;
use MoySklad\Client\Endpoint\PostEndpoint;
use MoySklad\Client\Endpoint\PutByEndpoint;
use MoySklad\Entity\Account;
use MoySklad\Entity\Agent\Counterparty;
use MoySklad\Entity\ContactPerson;
use MoySklad\Entity\ListEntity;
use MoySklad\Entity\Metadata\AdditionMetadata;
use MoySklad\Entity\Metadata\Metadata;
use MoySklad\Entity\Note;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class CounterpartyClient extends EntityClientBase
{
    use
        GetListEndpoint,
        GetByEndpoint,
        PutByEndpoint,
        PostEndpoint,
        DeleteByEndpoint,
        GetMetadataAttributeEndpoint;

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
     * @param Param[] $params
     * @return Account
     * @throws ApiClientException
     */
    public function getAccount(string $counterpartyId, string $accountId, array $params = []): Account
    {
        /** @var $account Account */
        $account = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/accounts/'.$accountId)->params($params)->get(Account::class);

        return $account;
    }

    /**
     * @return Metadata
     * @throws ApiClientException
     */
    public function getMetadata(): Metadata
    {
        /** @var $metadata AdditionMetadata */
        $metadata = RequestExecutor::path($this->getApi(), $this->getPath().'metadata')->get(AdditionMetadata::class);

        return $metadata;
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
     * @return ContactPerson
     * @throws ApiClientException
     * @throws \Exception
     */
    public function createContactPerson(string $counterpartyId, ContactPerson $contactPerson): ContactPerson
    {
        /** @var ContactPerson $contactPerson */
        $contactPerson = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/contactpersons')->body($contactPerson)->post(ContactPerson::class);

        return $contactPerson;
    }

    /**
     * @param string $counterpartyId
     * @param string $contactPersonId
     * @param Param[] $params
     * @return ContactPerson
     * @throws ApiClientException
     */
    public function getContactPerson(string $counterpartyId, string $contactPersonId, array $params = []): ContactPerson
    {
        /** @var ContactPerson $contactPerson */
        $contactPerson = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/contactpersons/'.$contactPersonId)->params($params)->get(ContactPerson::class);

        return $contactPerson;
    }

    /**
     * @param string $counterpartyId
     * @param string $contactPersonId
     * @param ContactPerson $updatedContactPerson
     * @return ContactPerson
     * @throws ApiClientException
     */
    public function editContactPerson(string $counterpartyId, string $contactPersonId, ContactPerson $updatedContactPerson): ContactPerson
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
     * @return Note
     * @throws ApiClientException
     * @throws \Exception
     */
    public function createNote(string $counterpartyId, Note $note): Note
    {
        /** @var Note $note */
        $note = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/notes')->body($note)->post(Note::class);

        return $note;
    }

    /**
     * @param string $counterpartyId
     * @param string $noteId
     * @param Param[] $params
     * @return Note
     * @throws ApiClientException
     */
    public function getNote(string $counterpartyId, string $noteId, array $params = []): Note
    {
        /** @var Note $note */
        $note = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/notes/'.$noteId)->params($params)->get(Note::class);

        return $note;
    }

    /**
     * @param string $counterpartyId
     * @param string $noteId
     * @param Note $updatedNote
     * @return Note
     * @throws ApiClientException
     */
    public function editNote(string $counterpartyId, string $noteId, Note $updatedNote): Note
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
    public function deleteNoteById(string $counterpartyId, string $noteId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/notes/'.$noteId)->delete();
    }

    /**
     * @param string $counterpartyId
     * @param Note $note
     * @throws ApiClientException
     */
    public function deleteNoteByEntity(string $counterpartyId, Note $note): void
    {
        $this->deleteNoteById($counterpartyId, $note->id);
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Counterparty::class;
    }
}
