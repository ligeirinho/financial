<?php
/* Abstract class that has some basic evalution for all payment classes*/
namespace Jarouche\Financial;
abstract class Payment implements FinancialInterface
{
    protected $objFinancingCoefficient;
    protected $pv;
    protected $pmt;
    protected $type;
    
    /*@method mixed __get a way to became all properties readonly */
    public function __get($property){
        return $this->{$property};
    }
    /*
     * @method __construct set properties to evaluate
     * @param float $InterestRate
     * @param int $periods
     * @param float $pv float favalue of PMT
     * @param int[0,1] $type 0 - No payment for the first period 1 - Payment for first period
     * @uses FinancingCoefficient
     * @todo find a way to config if is literal or evaluation     
     */
    public function __construct(float $InterestRate, int $periods, float $pv, int $type = 0)
    {
        if (!in_array($type, [0,1])) throw new \Exception("Value of type must be 0 or 1");

        $this->objFinancingCoefficient = new FinancingCoefficient($InterestRate,$periods,$type);
        $this->pv = $pv;
        $this->type = $type;
    }
    
    public function evaluate() : float
    {
        return 0;
    }
    
}