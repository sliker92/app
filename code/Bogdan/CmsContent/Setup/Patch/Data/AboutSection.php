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

class AboutSection implements DataPatchInterface
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
        $identifier = 'about_section';
        $blockData = [
            'title' => 'about_section',
            'identifier' => $identifier,
            'content' => '<section class="about_section">
<h2 class="about_section_header">We are Southern Carlson</h2>
<div class="about_section_block"><img class="about_section_block_image" src="{{view url=Bogdan_CmsContent/images/repair.png}}" alt="repair">
<div class="about_section_block_content">
<h3 class="about_section_block_content_header">Tool Repair</h3>
<div class="about_section_block_content_description">Do you need to repair your broken pneumatic or electric tool? Get help from the repair specialists of Southern Carlson.</div>
</div>
</div>
<div class="about_section_block"><img class="about_section_block_image" src="{{view url=Bogdan_CmsContent/images/service.png}}" alt="service">
<div class="about_section_block_content">
<h3 class="about_section_block_content_header">Customer Service</h3>
<div class="about_section_block_content_description">We are committed to providing you with the best customer service experience. Tell us how can we help you today.</div>
</div>
</div>
<div class="about_section_block"><img class="about_section_block_image" src="{{view url=Bogdan_CmsContent/images/location.png}}" alt="location">
<div class="about_section_block_content">
<h3 class="about_section_block_content_header">140 locations</h3>
<div class="about_section_block_content_description">Supported by our network of service and repair technicians, the company encompass over 140 locations in 34 States and Mexico.</div>
</div>
</div>
<div class="about_section_block"><img class="about_section_block_image" src="{{view url=Bogdan_CmsContent/images/service.png}}" alt="service">
<div class="about_section_block_content">
<h3 class="about_section_block_content_header">Quality Service since 1947</h3>
<div class="about_section_block_content_description">This success story had its humble beginning in Omaha, NE, when in 1947, Carl and Julia Carlson founded Carlson Stapler &amp; Supply.</div>
</div>
</div>
</section>
',
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
