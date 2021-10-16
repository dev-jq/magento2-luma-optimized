<?php

namespace JQ\FrontendBase\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    protected $_customerSessionFactory;
    protected $_state;
    protected $_registry;
    protected $_storeManager;
    protected $_reviewFactory;
    protected $_productFactory;
    protected $_categoryRepository;
    protected $_actionContext;
    protected $_variableModel;
    protected $_moduleManager;
    protected $_scopeConfig;

    public function __construct(
        \Magento\Framework\App\State $state,
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Customer\Model\SessionFactory $customerSessionFactory,
        \Magento\Framework\Registry $registry,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Review\Model\ReviewFactory $reviewFactory,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository,
        \Magento\Framework\App\Action\Context $actionContext,
        \Magento\Variable\Model\Variable $variableModel,
        \Magento\Framework\Module\Manager $moduleManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->_customerSessionFactory = $customerSessionFactory;
        $this->_state = $state;
        $this->_registry = $registry;
        $this->_storeManager = $storeManager;
        $this->_reviewFactory = $reviewFactory;
        $this->_productFactory = $productFactory;
        $this->_categoryRepository = $categoryRepository;
        $this->_actionContext = $actionContext;
        $this->_variableModel = $variableModel;
        $this->_moduleManager = $moduleManager;
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function isLoggedIn()
    {
        return $this->_customerSessionFactory->create()->isLoggedIn();
    }

    public function getArea()
    {
        return $this->_state->getAreaCode(); // "frontend" or "backend"
    }

    public function isBackend()
    {
        return $this->getArea() == "backend";
    }

    public function isFrontend()
    {
        return $this->getArea() == "frontend";
    }

    public function getDeployMode()
    {
        return $this->_state->getMode();
    }

    public function isModuleEnable($moduleName = '[Vendor]_[Module]')
    {
        if ($this->_moduleManager->isEnabled($moduleName)) {
            return true;
        } else {
            return false;
        }
    }

    public function getCurrentCategory()
    {
        return $this->_registry->registry('current_category');
    }

    public function getMediaUrl($path)
    {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . $path;
    }

    public function getStoreId()
    {
        return $this->_storeManager->getStore()->getId();
    }

    public function getProductType()
    {
        return $this->_registry->registry('current_product')->getTypeId();
    }

    public function getTotalReview($productId, $approvedOnly = true, $storeId)
    {
        return $this->_reviewFactory->create()->getTotalReviews(
            $productId,
            $approvedOnly,
            $storeId
        );
    }

    public function getProductCategories($productId)
    {
        $product = $this->_productFactory->create()->load($productId);

        return $product->getCategoryIds();
    }

    public function getCategoryById($categoryId){
        try {
            return $category = $this->_categoryRepository->get($categoryId);
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            return ['response' => 'Category Not Found'];
        }
    }

    public function getRequestFullActionName()
    {
        return $this->_actionContext->getRequest()->getFullActionName();
    }

    public function getVariableHtml($code)
    {
        return $this->_variableModel
            ->setStoreId($this->_storeManager->getStore()->getStoreId())
            ->loadByCode($code)
            ->getHtmlValue();
    }

    public function getVariablePlain($code)
    {
        return $this->_variableModel
            ->setStoreId($this->_storeManager->getStore()->getStoreId())
            ->loadByCode($code)
            ->getPlainValue();
    }

    public function getConfig($configPath)
    {
        return $this->scopeConfig->getValue($configPath, \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $this->getStoreId());
    }


}
