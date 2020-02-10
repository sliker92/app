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

class FooterNavigation implements DataPatchInterface
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
        $identifier = 'footer_links';
        $blockData = [
            'title' => 'footer_links',
            'identifier' => $identifier,
            'content' => '<div class="footer_navigation_wrapper accordion" id="accordion"
     data-mage-init=\'{"accordion_custom": {"breakpoint":"768", "headerClass": "accordion_links_header"}}\'>
    <div data-role="collapsible" class="footer_navigation_block">
        <div class="accordion_links_header accordion_closed" data-role="trigger">About Us</div>
        <ul class="footer_navigation_list" data-role="content">
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Company</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">CCCV</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Contact Us</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Help</a>
            </li>
        </ul>
    </div>
    <div data-role="collapsible" class="footer_navigation_block">
        <div class="accordion_links_header accordion_closed" data-role="trigger">Fasteners</div>
        <ul class="footer_navigation_list" data-role="content">
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Nails</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Staples</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Screws</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Anchors</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Bolts Nuts & Washers</a>
            </li>
        </ul>
    </div>
    <div data-role="collapsible" class="footer_navigation_block">
        <div class="accordion_links_header accordion_closed" data-role="trigger">Nails</div>
        <ul class="footer_navigation_list" data-role="content">
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Nailers</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Staplers</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Compressors & Generators</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Power Tools</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Screw Driving Systems</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Hand Tools</a>
            </li>
        </ul>
    </div>
    <div data-role="collapsible" class="footer_navigation_block">
        <div class="accordion_links_header accordion_closed" data-role="trigger">Construction Products</div>
        <ul class="footer_navigation_list" data-role="content">
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Framing Hardware</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Surface Protection</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Weather Barriers</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Adhesives & Sealants</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Building Products</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Ladders Platforms & Scaffolding</a>
            </li>
        </ul>
    </div>
    <div data-role="collapsible" class="footer_navigation_block">
        <div class="accordion_links_header accordion_closed" data-role="trigger">Packing</div>
        <ul class="footer_navigation_list" data-role="content">
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Film</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Poly Strapping</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Corner Edge & Dunnage Protection</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Protection</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Boxes Pads & Sheets</a>
            </li>
            <li class="footer_navigation_item">
                <a href="#" class="footer_navigation_link">Interior Packaging Supplies</a>
            </li>
        </ul>
    </div>
</div>',
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
