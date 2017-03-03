<?php

namespace Jarouche\Financial;

class FinancingCoefficient implements FinancialInterface
{
    protected $objInterestRate;
    protected $periods;
    protected $FCValue;
    protected $type;
    
    // to set properties are readOnly
    public function __get($property){
        return $this->{$property};
    }
    
    public function __construct(float $InterestRate, int $periods,int $type = 0)
    {
        if (!in_array($type, [0,1])) throw new \Exception("Value of type must be 0 or 1");
        // todo: find a way to config if is literal or evaluation
        $this->objInterestRate = InterestRate::rateFromEvaluation($InterestRate);
        $this->periods = $periods;
        $this->type = $type;
    }
    
    public function evaluate(): float
    {
        $this->FCValue = $this->objInterestRate->getEvaluation() / (1 - (1 / pow(1 + $this->objInterestRate->getEvaluation(), ($this->periods - $this->type))));
        return $this->FCValue;
    }


}
