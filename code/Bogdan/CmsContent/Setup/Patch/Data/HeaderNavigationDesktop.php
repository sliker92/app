<?php
/**
 * @package     Bogdan/CmsContent
 * @version     1.0.1
 * @author      Bogdan <sliker1992@gmail.com>
 * @copyright   Copyright © 2020. All Rights Reserved
 */

namespace Bogdan\CmsContent\Setup\Patch\Data;

use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;

class HeaderNavigationDesktop implements DataPatchInterface
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
        $identifier = 'header_navigation_desktop';
        $blockData = [
            'title' => 'header_navigation_desktop',
            'identifier' => $identifier,
            'content' => '<nav class="header_nav">
    <ul class="header_nav_list">
        <li class="header_nav_item">
            <a href="#" class="header_nav_link">Store Locator</a>
        </li>
        <li class="header_nav_item">
            <a href="#" class="header_nav_link">Quick Order</a>
        </li>
        <li class="header_nav_item">
            <a href="#" class="header_nav_link">Specials and Offers</a>
        </li>
        <li class="header_nav_item">
            <a href="#" class="header_nav_link">Clearance</a>
        </li>
        <li class="header_nav_item">
            <a href="#" class="header_nav_link">Tool Repair</a>
        </li>
        <li class="header_nav_item">
            <a href="#" class="header_nav_link">Resources</a>
        </li>
        <li class="header_nav_item">
            <a href="#" class="header_nav_link">Contact Us</a>
        </li>
    </ul>
</nav> ',
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
