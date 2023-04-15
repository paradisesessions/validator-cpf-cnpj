<?php

/** Namespace */
namespace ParadiseSessions\Validator;

/**
 * Cnpj
 * @package ParadiseSessions\Validator
 */
class Cnpj extends Make
{
    /** @var array $blacklist */
    protected array $blacklist = [
        '00000000000000',
        '11111111111111',
        '22222222222222',
        '33333333333333',
        '44444444444444',
        '55555555555555',
        '66666666666666',
        '77777777777777',
        '88888888888888',
        '99999999999999',
    ];

    /**
     * @return false|string
     */
    public function isValid(): false|string
    {
        if (strlen($this->document) != 14) {
            return false;
        }

        if (in_array($this->document, $this->blacklist)) {
            return false;
        }

        for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++) {
            $sum += $this->document[$i] * $j;
            $j = $j == 2 ? 9 : $j - 1;
        }

        $result = $sum % 11;

        if ($this->document[12] != ($result < 2 ? 0 : 11 - $result)) {
            return false;
        }

        for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++) {
            $sum += $this->document[$i] * $j;
            $j = $j == 2 ? 9 : $j - 1;
        }

        $result = $sum % 11;

        return $this->document[13] == ($result < 2 ? 0 : 11 - $result);
    }

    /**
     * @return false|string
     */
    public function format(): false|string
    {
        if (!$this->isValid()) {
            return false;
        }

        $result = substr($this->document, 0, 2) . '.';
        $result .= substr($this->document, 2, 3) . '.';
        $result .= substr($this->document, 5, 3) . '/';
        $result .= substr($this->document, 8, 4) . '-';
        $result .= substr($this->document, 12, 2);

        return $result;
    }
}
