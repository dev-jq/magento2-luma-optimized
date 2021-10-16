<?php

namespace JQ\FrontendBase\Block\Magento\Theme\Html\Header;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\View\Asset\Repository;
use Magento\Framework\View\Asset\File\NotFoundException;

class CriticalCss extends \Magento\Theme\Block\Html\Header\CriticalCss
{

    /**
     * @var Repository
     */
    private $assetRepo;

    /**
     * @var $filePath
     */
    private $filePath;

    /**
     * @param Repository $assetRepo
     * @param string $filePath
     */
    public function __construct(
        Repository $assetRepo,
        string $filePath = ''
    ) {
        $this->assetRepo = $assetRepo;
        $this->filePath = $filePath;

    }

    /**
     * Returns critical css data as string.
     *
     * @return bool|string
     */
    public function getCriticalCssData()
    {
        try {
            $asset = $this->assetRepo->createAsset($this->filePath, ['_secure' => 'false']); // default critical.css - for all pages (header, bredcrumbs, etc.)
            $content = $asset->getContent();
        } catch (LocalizedException | NotFoundException $e) {
            $content = '';
        }

        return $content;
    }

    /**
     * Returns critical css data as string for home page.
     *
     * @return bool|string
     */
    public function getCriticalCssHomepageData()
    {
        try {
            $asset = $this->assetRepo->createAsset('css/critical-for-homepage.css', ['_secure' => 'false']);
            $content = $asset->getContent();
        } catch (LocalizedException | NotFoundException $e) {
            $content = '';
        }

        return $content;
    }

    /**
     * Returns critical css data as string for category page.
     *
     * @return bool|string
     */
    public function getCriticalCssCategoryData()
    {
        try {
            $asset = $this->assetRepo->createAsset('css/critical-for-category.css', ['_secure' => 'false']);
            $content = $asset->getContent();
        } catch (LocalizedException | NotFoundException $e) {
            $content = '';
        }

        return $content;
    }

    /**
     * Returns critical css data as string for product page.
     *
     * @return bool|string
     */
    public function getCriticalCssProductData()
    {
        try {
            $asset = $this->assetRepo->createAsset('css/critical-for-product.css', ['_secure' => 'false']);
            $content = $asset->getContent();
        } catch (LocalizedException | NotFoundException $e) {
            $content = '';
        }

        return $content;
    }

    /**
     * Returns critical css data as string for blog pages.
     *
     * @return bool|string
     */
    public function getCriticalCssBlogListData()
    {
        try {
            $asset = $this->assetRepo->createAsset('css/critical-for-blog-list.css', ['_secure' => 'false']);
            $content = $asset->getContent();
        } catch (LocalizedException | NotFoundException $e) {
            $content = '';
        }

        return $content;
    }
    public function getCriticalCssBlogPostData()
    {
        try {
            $asset = $this->assetRepo->createAsset('css/critical-for-blog-post.css', ['_secure' => 'false']);
            $content = $asset->getContent();
        } catch (LocalizedException | NotFoundException $e) {
            $content = '';
        }

        return $content;
    }

    /**
     * Returns critical css data as string for static pages (CMS, login, register, etc).
     *
     * @return bool|string
     */
    public function getCriticalCssStaticPagesData()
    {
        try {
            $asset = $this->assetRepo->createAsset('css/critical-for-staticpages.css', ['_secure' => 'false']);
            $content = $asset->getContent();
        } catch (LocalizedException | NotFoundException $e) {
            $content = '';
        }

        return $content;
    }
    public function getCriticalCssCustomerPagesData()
    {
        try {
            $asset = $this->assetRepo->createAsset('css/critical-for-customerpages.css', ['_secure' => 'false']);
            $content = $asset->getContent();
        } catch (LocalizedException | NotFoundException $e) {
            $content = '';
        }

        return $content;
    }

    /**
     * Returns critical css data as string for checkout cart.
     *
     * @return bool|string
     */
    public function getCriticalCssCartData()
    {
        try {
            $asset = $this->assetRepo->createAsset('css/critical-for-cart.css', ['_secure' => 'false']);
            $content = $asset->getContent();
        } catch (LocalizedException | NotFoundException $e) {
            $content = '';
        }

        return $content;
    }

    /**
     * Returns critical css data as string for customer account.
     *
     * @return bool|string
     */
    public function getCriticalCssCustomerAccountData()
    {
        try {
            $asset = $this->assetRepo->createAsset('css/critical-for-customer-account.css', ['_secure' => 'false']);
            $content = $asset->getContent();
        } catch (LocalizedException | NotFoundException $e) {
            $content = '';
        }

        return $content;
    }
}
