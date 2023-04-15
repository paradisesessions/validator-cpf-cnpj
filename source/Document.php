<?php

/** Namespace */
namespace ParadiseSessions\Validator;

/**
 * Document
 * @return ParadiseSessions\Validator
 */
class Document extends Make
{
    /** @var Cpf|Cnpj $obj */
    public Cpf|Cnpj $obj;

    /**
     * @return string
     */
    public function getType(): string
    {
        return strtoupper($this->obj->getClassName());
    }

    /**
     * @return false|string
     */
    public function isValid(): false|string
    {
        return $this->obj->isValid();
    }

    /**
     * @return false|string
     */
    public function format(): false|string
    {
        return $this->obj->format();
    }

    /**
     * @return string
     */
    public function getDocument(): string
    {
        return $this->obj->getDocument();
    }

    /**
     * @param null|string $document
     * @return self
     */
    public function setDocument(null|string $document = null): self
    {
        $document = (string) preg_replace('/[^0-9]/', '', $document);

        if (strlen($document) === 11) {
            $this->obj = new Cpf($document);
        } else {
            $this->obj = new Cnpj($document);
        }

        return $this;
    }
}
