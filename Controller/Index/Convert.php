<?php
namespace Training\CurrencyConverter\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Data\Form\FormKey\Validator;

class Convert extends Action
{
    private $formKeyValidator;

    CONST USD = 66;

    public function __construct(
        Context $context,
        Validator $formKeyValidator
    ) {
        $this->formKeyValidator = $formKeyValidator;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($this->formKeyValidator->validate($this->getRequest())) {
            $resultRedirect->setPath('*/*/error');
            return $resultRedirect;
        }

//        $from = $this->getRequest()->getParam('from');
//        $to = $this->getRequest()->getParam('to');
        $amount = $this->getRequest()->getParam('amount');

        $convertedAmount = $this->convert($amount);

        $resultRedirect->setPath('*/*/result', [ 'convertedAmount' => $convertedAmount]);

        return $resultRedirect;
    }

    private function convert($amount)
    {
        return $amount * self::USD;
    }

}