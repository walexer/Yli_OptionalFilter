<?php
/** @var Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->addAttribute('catalog_category', 'exclude_in_layer_attributes', array(
	'type'            => 'varchar',
	'label'           => 'Exclude in Layer Attributes',
	'input'           => 'multiselect',
	'source'          => 'filter/config_source_attribute',
	'backend'         => 'filter/category_attribute_backend_filter',
	'global'          => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
	'required'        => 0,
	'default'         => '',
	'user_defined'    => 0,
    'group'           => 'Display Settings',
    'position'          => 31,
));

$installer->endSetup();