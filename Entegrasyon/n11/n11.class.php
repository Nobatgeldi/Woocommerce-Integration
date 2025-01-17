<?php
Class N11 {
    protected static $_appKey, $_appSecret, $_parameters, $_sclient;
    public $_debug = false;
    
    public function __construct(array $attributes = array()) {
        self::$_appKey = $attributes['appKey'];
        self::$_appSecret = $attributes['appSecret'];
        self::$_parameters = ['auth' => ['appKey' => self::$_appKey, 'appSecret' => self::$_appSecret]];
    }
    
    public function setUrl($url) {
        self::$_sclient = new \SoapClient($url);
    }
 
    public function GetTopLevelCategories() {
        $this->setUrl('https://api.n11.com/ws/CategoryService.wsdl');
        return self::$_sclient->GetTopLevelCategories(self::$_parameters);
    }

    public function GetSubCategories($categoryId) {
        $this->setUrl('https://api.n11.com/ws/CategoryService.wsdl');
        self::$_parameters['categoryId'] = $categoryId;
        return self::$_sclient->GetSubCategories(self::$_parameters);
    }

    public function GetCities() {
        $this->setUrl('https://api.n11.com/ws/CityService.wsdl');
        return self::$_sclient->GetCities(self::$_parameters);
    }
 
    public function GetProductList($itemsPerPage, $currentPage) {
        $this->setUrl('https://api.n11.com/ws/ProductService.wsdl');
        self::$_parameters['pagingData'] = ['itemsPerPage' => $itemsPerPage, 'currentPage' => $currentPage];
        return self::$_sclient->GetProductList(self::$_parameters);
    }
 
    public function GetProductBySellerCode($sellerCode) {
        $this->setUrl('https://api.n11.com/ws/ProductService.wsdl');
        self::$_parameters['sellerCode'] = $sellerCode;
        return self::$_sclient->GetProductBySellerCode(self::$_parameters);
    }
 
    public function SaveProduct(array $product = Array()) {
        $this->setUrl('https://api.n11.com/ws/ProductService.wsdl');
        self::$_parameters['product'] = $product;
        return self::$_sclient->SaveProduct(self::$_parameters);
    }
 
    public function DeleteProductBySellerCode($sellerCode) {
        $this->setUrl('https://api.n11.com/ws/ProductService.wsdl');
        self::$_parameters['productSellerCode'] = $sellerCode;
        return self::$_sclient->DeleteProductBySellerCode(self::$_parameters);
    }
    
    public function OrderList(array $searchData = Array()) {
        $this->setUrl('https://api.n11.com/ws/OrderService.wsdl');
        self::$_parameters['searchData'] = $searchData;
        return self::$_sclient->OrderList(self::$_parameters);
    }

    public function OrderDetail(array $orderRequest = Array()) {
        $this->setUrl('https://api.n11.com/ws/OrderService.wsdl');
        self::$_parameters['orderRequest'] = $orderRequest;
        return self::$_sclient->OrderDetail(self::$_parameters);
    }

    public function OrderItemAccept(array $orderItemList = Array()) {
        $this->setUrl('https://api.n11.com/ws/OrderService.wsdl');
        self::$_parameters['orderItemList'] = $orderItemList;
        return self::$_sclient->OrderItemAccept(self::$_parameters);
    }

    public function GetShipmentTemplate($name) {
        $this->setUrl('https://api.n11.com/ws/ShipmentCompanyService.wsdl');
        self::$_parameters['name'] = $name;
        return self::$_sclient->GetShipmentTemplate(self::$_parameters);
    }
    public function GetShipmentTemplateList() {
        $this->setUrl('https://api.n11.com/ws/OrderService.wsdl');
        return self::$_sclient->GetShipmentTemplateList(self::$_parameters);
    }

    public function DetailedOrderList($searchData) {
        $this->setUrl('https://api.n11.com/ws/OrderService.wsdl');
        self::$_parameters['searchData'] = $searchData;
        return self::$_sclient->DetailedOrderList(self::$_parameters);
    }
    public function __destruct() {
        if ($this->_debug) {
            print_r(self::$_parameters);
        }
    }   
}