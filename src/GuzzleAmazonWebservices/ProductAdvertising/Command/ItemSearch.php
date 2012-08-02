<?php

namespace GuzzleAmazonWebservices\ProductAdvertising\Command;

/**
 * AWS operation ItemSearch Command 
 *
 * @author Dani Salgueiro <dani@danisalgueiro.com>
 */
class ItemSearch extends AbstractProductAdvertisingCommand
{
    /**
     * {@inheritdoc}
     */
    protected $operation = 'ItemSearch';
    
    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setAvailability($value)
    {
        $posibleValues = array('Available');
        if (!in_array($value, $posibleValues)) {
            throw new \InvalidArgumentException('Invalid availability value');
        }

        return $this->set('Availability', $value);
    }
    
    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setBrand($value)
    {
        return $this->set('Brand', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setBrowseNode($value)
    {
        return $this->set('BrowseNode', $value);
    }
    
    /**
     * @param string $value
     * 
     * @return ItemSearch
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
     * @param bool $value
     * 
     * @return ItemSearch 
     */
    public function setIncludeReviewsSummary($value)
    {
        return $this->set('IncludeReviewsSummary', (bool) $value);
    }
    
    /**
     * @param int $value
     * 
     * @return ItemSearch
     */
    public function setItemPage($value)
    {
        if ($value < 1 || $value > 10) {
            throw new \InvalidArgumentException('Out of range value for item page');
        }

        return $this->set('ItemPage', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setKeywords($value)
    {
        return $this->set('Keywords', $value);
    }
    
    /**
     * @param float $value
     * 
     * @return ItemSearch 
     */
    public function setMaximumPrice($value)
    {
        return $this->set('MaximumPrice', round($value * 100));
    }

    /**
     * @param float $value
     * 
     * @return ItemSearch 
     */
    public function setMinimumPrice($value)
    {
        return $this->set('MinimumPrice', round($value * 100));
    }
    
    /**
     * @param string $value
     * 
     * @return ItemSearch
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
     * @return ItemSearch
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

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setSort($value)
    {
        return $this->set('Sort', $value);
    }
    
    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setTitle($value)
    {
        return $this->set('Title', $value);
    }
}
