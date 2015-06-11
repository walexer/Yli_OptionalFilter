<?php 

class Yli_OptionalFilter_Model_Catalog_Layer extends Mage_Catalog_Model_Layer
{
    public function getFilterableAttributes()
    {

        $setIds = $this->_getSetIds();
        if (!$setIds) {
            return array();
        }
        /** @var $collection Mage_Catalog_Model_Resource_Product_Attribute_Collection */
        $collection = Mage::getResourceModel('catalog/product_attribute_collection');
        $collection
        ->setItemObjectClass('catalog/resource_eav_attribute')
        ->setAttributeSetFilter($setIds)
        ->addStoreLabel(Mage::app()->getStore()->getId())
        ->setOrder('position', 'ASC');
        $collection = $this->_prepareAttributeCollection($collection);
        
        $category = $this->getCurrentCategory();
        $exclude_atts = $category->getData('exclude_in_layer_attributes');
        foreach ($exclude_atts as $exclude_att){
            $collection->addFieldToFilter('attribute_code',array('neq'=>$exclude_att));
        }
        
        $collection->load();
    
        return $collection;
    }
}