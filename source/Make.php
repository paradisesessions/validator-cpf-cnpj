<?php

/** Namespace */
namespace ParadiseSessions\Validator;

/**
 * Make
 * @package ParadiseSessions\Validator
 */
abstract class Make
{
    /** @var string $document */
    protected string $document;

    /**
     * Constructor
     * @param null|string $document
     */
    public function __construct(null|string $document = null)
    {
        if ($document) {
            $this->setDocument($document);
        }
    }

    abstract public function isValid();

    abstract public function format();

    /**
     * @return string
     */
    protected function getClassName(): string
    {
        return substr(strrchr(get_class($this), '\\'), 1);
    }

    /**
     * @return string
     */
    public function getDocument(): string
    {
        return $this->document;
    }

    /**
     * @param null|string $document
     * @return self
     */
    public function setDocument(null|string $document): self
    {
        $this->document = (string) preg_replace('/[^0-9]/', '', $document);
        return $this;
    }
}
