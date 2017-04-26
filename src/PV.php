<?php
namespace Jarouche\Financial;

class PV extends Payment
{
    protected $objFinancingCoefficient;
    protected $pv;
    protected $pmt;
    protected $type;
    
    /*
     * @method __construct set properties to evaluate
     * @param float $InterestRate
     * @param int $periods
     * @param float PMT float favalue of PMT
     * @param int[0,1] $type 0 - No payment for the first period 1 - Payment for first period
     * @uses FinancingCoefficient
     * @todo find a way to config if is literal or evaluation     
     */
    
    public function __construct(
        float $InterestRate, 
        int $periods, 
        float $pmt, 
        int $type = 0
    ) {
            if (!in_array($type, [0,1])) throw new \Exception("Value of type must be 0 or 1");

            $this->objFinancingCoefficient = new FinancingCoefficient($InterestRate,$periods,$type);
            $this->pmt = $pmt;
            $this->type = $type;
    }
    
    public function evaluate() : float
    {
        $this->pv = $this->pmt / $this->objFinancingCoefficient->evaluate() * ($this->type == 0 ? 1 : (1 + $this->objFinancingCoefficient->evaluate()) );
        return $this->pv; 
    }
}
