<?php
// DELIVERY ORDER ROUTE 
class deliveryOrder extends Route{
    // INISIALISASI STATE
    private $sn = 'deliveryOrderData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> bind('dasbor/deliveryOrder/deliveryOrder');
    }

}