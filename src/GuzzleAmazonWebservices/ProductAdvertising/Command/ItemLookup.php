<?php

namespace GuzzleAmazonWebservices\ProductAdvertising\Command;

/**
 * AWS operation ItemLookup Command 
 *
 * @author Dani Salgueiro <dani@danisalgueiro.com>
 */
class ItemLookup extends AbstractProductAdvertisingCommand
{
    /**
     * {@inheritdoc}
     */
    protected $operation = 'ItemLookup';
    
    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setCondition($value)
    {
        $posibleValues = array(
            'New',
            'Used',
            'Collectible',
            'Refurbished',
            'All'
        );
        if (!in_array($value, $posibleValues)) {
            throw new \InvalidArgumentException('Invalid condition value');
        }

        return $this->set('Condition', $value);
    }
    
    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setIdType($value)
    {
        $posibleValues = array(
            'SKU',
            'UPC',
            'EAN',
            'ISBN'
        );
        if (!in_array($value, $posibleValues)) {
            throw new \InvalidArgumentException('Invalid ID type value');
        }

        return $this->set('IdType', $value);
    }
    
    /**
     * @param bool $value
     * 
     * @return ItemLookup 
     */
    public function setIncludeReviewsSummary($value)
    {
        return $this->set('IncludeReviewsSummary', (bool) $value);
    }
    
    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setItemId($value)
    {
        return $this->set('ItemId', $value);
    }
    
    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setResponseGroup($value)
    {
        $posibleValues = array(
            'Accessories',
            'BrowseNodes',
            'EditorialReview',
            'ItemAttributes',
            'ItemIds',
            'Large',
            'Medium',
            'OfferFull',
            'Offers',
            'OfferSummary',
            'Reviews',
            'RelatedItems',
            'SearchBins',
            'Similarities',
            'Small',
            'Tracks',
            'Variations',
            'VariationSummary'
        );
        if (!in_array($value, $posibleValues)) {
            throw new \InvalidArgumentException('Invalid response group value');
        }

        return $this->set('ResponseGroup', $value);
    }
    
    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setSearchIndex($value)
    {
        $posibleValues = array(
            'All',
            'Apparel',
            'Appliances',
            'ArtsAndCrafts',
            'Automotive',
            'Baby',
            'Beauty',
            'Blended',
            'Books',
            'Classical',
            'DigitalMusic',
            'DVD',
            'Electronics',
            'ForeignBooks',
            'GourmetFood',
            'Grocery',
            'HealthPersonalCare',
            'Hobbies',
            'HomeGarden',
            'HomeImprovement',
            'Industrial',
            'Jewelry',
            'KindleStore',
            'Kitchen',
            'Lighting',
            'Magazines',
            'Miscellaneous',
            'MobileApps',
            'MP3Downloads',
            'Music',
            'MusicalInstruments',
            'MusicTracks',
            'OfficeProducts',
            'OutdoorLiving',
            'Outlet',
            'PCHardware',
            'PetSupplies',
            'Photo',
            'Shoes',
            'Software',
            'SoftwareVideoGames',
            'SportingGoods',
            'Tools',
            'Toys',
            'UnboxVideo',
            'VHS',
            'Video',
            'VideoGames',
            'Watches',
            'Wireless',
            'WirelessAccessories'
        );
        if (!in_array($value, $posibleValues)) {
            throw new \InvalidArgumentException('Invalid search index value');
        }

        return $this->set('SearchIndex', $value);
    }
}
