<?php

/** Namespace */
namespace ParadiseSessions\Validator;

/**
 * Cpf
 * @package ParadiseSessions\Validator
 */
class Cpf extends Make
{
    /** @var array $blacklist */
    protected array $blacklist = [
        '00000000000',
        '11111111111',
        '22222222222',
        '33333333333',
        '44444444444',
        '55555555555',
        '66666666666',
        '77777777777',
        '88888888888',
        '99999999999',
    ];

    /**
     * @return false|string
     */
    public function isValid(): false|string
    {
        if (strlen($this->document) != 11) {
            return false;
        }

        if (in_array($this->document, $this->blacklist)) {
            return false;
        }

        for ($i = 0, $j = 10, $sum = 0; $i < 9; $i++ . $j--) {
            $sum += $this->document[$i] * $j;
        }

        $result = $sum % 11;

        if ($this->document[9] != ($result < 2 ? 0 : 11 - $result)) {
            return false;
        }

        for ($i = 0, $j = 11, $sum = 0; $i < 10; $i++, $j--) {
            $sum += $this->document[$i] * $j;
        }

        $result = $sum % 11;

        return $this->document[10] == ($result < 2 ? 0 : 11 - $result);
    }

    /**
     * @return false|string
     */
    public function format(): false|string
    {
        if (!$this->isValid()) {
            return false;
        }

        $result = substr($this->document, 0, 3) . '.';
        $result .= substr($this->document, 3, 3) . '.';
        $result .= substr($this->document, 6, 3) . '-';
        $result .= substr($this->document, 9, 2);

        return $result;
    }
}
