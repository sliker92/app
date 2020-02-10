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

class CategoriesBlock implements DataPatchInterface
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
        $identifier = 'categories_block';
        $blockData = [
            'title' => 'categories_block',
            'identifier' => $identifier,
            'content' => '<div class="categories_block">
    <h1 class="categories_block_header">Featured Categories</h1>
    <div class="categories_block_content">
        <img src="{{view url=Bogdan_CmsContent/images/bulk.png}}" alt="Bulk Nails" class="categories_block_content_image">
        <div class="categories_block_content_item">Bulk Nails</div>
    </div>
    <div class="categories_block_content">
        <img src="{{view url=Bogdan_CmsContent/images/collated.png}}" alt="Collated Nails" class="categories_block_content_image">
        <div class="categories_block_content_item">Collated Nails</div>
    </div>
    <div class="categories_block_content">
        <img src="{{view url=Bogdan_CmsContent/images/staplers.png}}" alt="Staplers" class="categories_block_content_image">
        <div class="categories_block_content_item">Staplers</div>
    </div>
    <div class="categories_block_content">
        <img src="{{view url=Bogdan_CmsContent/images/shrink.png}}" alt="Shrink Film" class="categories_block_content_image">
        <div class="categories_block_content_item">Shrink Film</div>
    </div>
    <div class="categories_block_content">
        <img src="{{view url=Bogdan_CmsContent/images/storage.png}}" alt="Tool Storage" class="categories_block_content_image">
        <div class="categories_block_content_item">Tool Storage</div>
    </div>
</div>

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
