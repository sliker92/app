<?php
/**
 * @package     Bogdan/CmsContent
 * @version     1.0.0
 * @author      Bogdan <sliker1992@gmail.com>
 * @copyright   Copyright © 2020. All Rights Reserved
 */

namespace Bogdan\CmsContent\Setup\Patch\Data;

use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;

class BannerSection implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var BlockFactory
     */
    private $blockFactory;
    /**
     * @var BlockRepositoryInterface
     */
    private $blockRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * AddNewCmsBlock constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param BlockFactory $blockFactory
     * @param BlockRepositoryInterface $blockRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory $blockFactory,
        BlockRepositoryInterface $blockRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockFactory = $blockFactory;
        $this->blockRepository = $blockRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $identifier = 'banner_section';
        $blockData = [
            'title' => 'banner_section',
            'identifier' => $identifier,
            'content' => '<section class="banners_section">
    <div class="banner_container">
        <h5 class="banner_description">NEW</h5>
        <h3 class="banner_header">LiHD 4.0 Ah and 8.0 Ah</h3>
        <a href="#" class="banner_button">Learn more</a>
    </div>
    <div class="banner_container">
        <h5 class="banner_description">When you buy a Select M12 Tool Kit</h5>
        <h3 class="banner_header">Free M12 6.0 Battery</h3>
        <a href="#" class="banner_button">Shop now</a>
    </div>
    <div class="banner_container">
        <h5 class="banner_description">with select Bare Tool purchase</h5>
        <h3 class="banner_header">Free Starter Kit</h3>
        <a href="#" class="banner_button">Shop now</a>
    </div>
</section>',
            'is_active' => 1,
            'stores' => [0]
        ];

        $this->moduleDataSetup->startSetup();
        /* Save CMS Block logic */
        $searchCriteria = $this->searchCriteriaBuilder->addFilter('identifier', $identifier)->create();
        $searchResult = $this->blockRepository->getList($searchCriteria);

        if ($searchResult->getTotalCount() > 0) {
            $items = $searchResult->getItems();
            $block = array_shift($items);
        } else {
            $block = $this->blockFactory->create();
        }
        $block->addData($blockData);
        $this->blockRepository->save($block);
        $this->moduleDataSetup->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getVersion()
    {
        return '1.0.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
