<?php

/**
 * User: Bob song <song01140228@163.com>
 * @date 18-7-10 下午2:08
 */


namespace Silk\Paypal\Model;


class Config extends \Magento\Paypal\Model\Config
{
    /**
     * Return start url for PayPal Basic
     *
     * @param string $token
     * @return string
     */
    public function getPayPalBasicStartUrl($token)
    {
        $params = [
            'cmd'   => '_express-checkout',
            'token' => $token,
            'locale.x' => 'ja_JP',//en_GB
            'Localecode' => 'JP',
            'SOLUTIONTYPE' => 'Sole',//solution_type Sole Mark
            'LANDINGPAGE' => 'Billing',//Login Billing
            'USERSELECTEDFUNDINGSOURCE' => 'CreditCard'//funding_source
        ];

        if ($this->isOrderReviewStepDisabled()) {
            $params['useraction'] = 'commit';
        }

        return $this->getPaypalUrl($params);
    }
}
