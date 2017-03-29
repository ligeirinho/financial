<?php
/*class to evaluate FV execl formula
 *  @uses PMT::evaluate()
 */

namespace Jarouche\Financial;
class FV extends PMT
{
    protected $fv;
    public function evaluate(): float
    {
        $this->fv = parent::evaluate() * $this->objFinancingCoefficient->periods;
        return $this->fv;
    }
}
