<?php

namespace BrokerAction\DTO;

class FeeMessageDTO implements \JsonSerializable
{
    /** @var int */
    private $productId;
    /** @var int|null */

    private $parentId;
    /** @var int */

    private $debtorAccountId;
    /** @var int|null */
    private $amount;

    /** @var string|null */
    private $purpose;

    public function __construct(
        int $debtorAccountId,
        int $productId,
        ?int $amount = null,
        ?int $parentId = null,
        ?string $purpose = null
    ) {
        $this->debtorAccountId = $debtorAccountId;
        $this->productId = $productId;
        $this->parentId = $parentId;
        $this->amount = $amount;
        $this->purpose = $purpose;
    }

    public static function fromJson(string $json): FeeMessageDTO
    {
        $message = json_decode($json);
        return new static($message->debtor_account_id, $message->product_id, isset($message->parent_id) ? $message->parent_id : null);
    }
    /**
     * @param int $debtorAccountId
     * @return FeeMessageDTO
     */
    public function setDebtorAccountId(int $debtorAccountId): FeeMessageDTO
    {
        $this->debtorAccountId = $debtorAccountId;
        return $this;
    }

    /**
     * @param int $parentId
     * @return FeeMessageDTO
     */
    public function setParentId(int $parentId): FeeMessageDTO
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @param int $productId
     * @return FeeMessageDTO
     */
    public function setProductId(int $productId): FeeMessageDTO
    {
        $this->productId = $productId;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'product_id' => $this->productId,
            'debtor_account_id' => $this->debtorAccountId,
            'parent_id' => $this->parentId
        ];
    }

    /**
     * @return int
     */
    public function getDebtorAccountId(): int
    {
        return $this->debtorAccountId;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return FeeMessageDTO
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPurpose(): ?string
    {
        return $this->purpose;
    }

    /**
     * @param string|null $purpose
     * @return FeeMessageDTO
     */
    public function setPurpose(?string $purpose): self
    {
        $this->purpose = $purpose;
        return $this;
    }
}