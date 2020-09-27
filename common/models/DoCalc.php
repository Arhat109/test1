<?php
namespace common\models;

/**
 * Calculator business model test input data and calculating result for this.
 *
 * @property integer $iiduser
 * @property string  $inA
 * @property string  $inB
 * @property string  $inC
 * @property string  $result
 * @property string  $error
 */
class DoCalc
{
    const ROUND = 2; /** How many digits has input data and result */

    /** @param array $src -- input raw data */
    public function __construct(array $src)
    {
        $this->iiduser = (int)($src['iiduser']??0);
        $this->inA = round(floatval($src['A']??0.0), static::ROUND);
        $this->inB = round(floatval($src['B']??0.0), static::ROUND);
        $this->inC = round(floatval($src['C']??0.0), static::ROUND);
        $this->result = 0.0;
        $this->error = false;
    }

    /**
     * @return string -- round and convert float field to string
     * @param float   -- only for float field $this
     */
    public static function toString(float $field):string
    {
        return (string)(round($field, static::ROUND));
    }

    /**
     * Only calculate and save result! Not test input data!
     */
    public function calcSave()
    {
        $this->result = round($this->inA * $this->inB / $this->inC, static::ROUND);

        $row = new DbCalculator([
            'iiduser' => $this->iiduser,
            'in_a'    => static::toString($this->inA),
            'in_b'    => static::toString($this->inB),
            'in_c'    => static::toString($this->inC),
            'result'  => static::toString($this->result),
            'created_at' => time(),
            'updated_at' => time()
        ]);
        if( ! $row->save() ){
            $this->error = "ERROR! Can't save input data and result as row. Not saved."
                . print_r($row->getErrors(), true)
            ;
        };
    }

    /** @return bool -- test arguments for correct data */
    public function validate()
    {
        $isValid = ($this->iiduser > 0) &&
            abs($this->inC) >= (1.0 / pow(10, static::ROUND))
        ;
        if( ! $isValid ){
            $this->error = 'ERROR! absent id user OR divider like 0.0';
        }

        return $isValid;
    }

    /** @return array -- for json::{error:message} */
    public function jsonGetError():array
    {
        return ['error'=>$this->error];
    }

    /** @return array -- for json::{a,b,c,r} */
    public function jsonGetResult():array
    {
        return ['a'=>$this->inA, 'b'=>$this->inB, 'c'=>$this->inC, 'r'=>$this->result];
    }
}
