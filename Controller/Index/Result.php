<?php
namespace Training\CurrencyConverter\Controller\Index;

class Result extends Base
{
    public function execute()
    {
        $from = $this->getRequest()->getParam('from');
        $to = $this->getRequest()->getParam('to');
        $amount = $this->getRequest()->getParam('amount');
        $convertedAmount = $this->getRequest()->getParam('convertedAmount');

        $resultPage = $this->pageFactory->create();

        $resultPage->getLayout()->getBlock('converter.result')
            ->setFrom($from)
            ->setTo($to)
            ->setAmount($amount)
            ->setConvertedAmount($convertedAmount);

        return $resultPage;
    }

}