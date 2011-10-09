<?php

/**
 * Persistence layer for item objects.
 *
 * @author  Chris Martel <accidentalbits@googlemail.com>
 */

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ShoppingItem
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="text", length=500)
     */
    protected $description;

    /**
     * @ORM\Column(type="integer")
     */
    protected $categoryId;

    /**
     * @ORM\ManyToMany(targetEntity="ShoppingList", mappedBy="items")
     */
    protected $shoppinglistItems;
    public function __construct()
    {
        $this->shoppinglistItems = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Add shoppinglistItems
     *
     * @param Acme\DemoBundle\Entity\ShoppingList $shoppinglistItems
     */
    public function addShoppingList(\Acme\DemoBundle\Entity\ShoppingList $shoppinglistItems)
    {
        $this->shoppinglistItems[] = $shoppinglistItems;
    }

    /**
     * Get shoppinglistItems
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getShoppinglistItems()
    {
        return $this->shoppinglistItems;
    }
}