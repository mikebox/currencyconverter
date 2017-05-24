<?php
namespace Training\CurrencyConverter\Block;

use Magento\Framework\View\Element\Template;

class Form extends Template
{
    public function getFormAction()
    {
        return $this->getUrl('*/*/convert');
    }

    public function getFrom()
    {
        return ["USD"];
    }

    public function getTo()
    {
        return ["INR"];
    }
}