<?php

/**
 * Persistence layer for list objects.
 *
 * @author  Chris Martel <accidentalbits@googlemail.com>
 */

// src/Acme/StoreBundle/Entity/Product.php
namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ShoppingList
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
     * @ORM\ManyToMany(targetEntity="ShoppingItem", inversedBy="shoppinglistItems")
     * @ORM\JoinTable(name="shoppinglistItems",
     *   joinColumns={@ORM\JoinColumn(name="shoppinglistId", referencedColumnName="id", onDelete="CASCADE")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="itemId", referencedColumnName="id")}
     * )
     */
    protected $items;


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
    public function __construct()
    {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add items
     *
     * @param Acme\DemoBundle\Entity\ShoppingItem $items
     */
    public function addShoppingItem(\Acme\DemoBundle\Entity\ShoppingItem $items)
    {
        $this->items[] = $items;
    }

    /**
     * Get items
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }
}