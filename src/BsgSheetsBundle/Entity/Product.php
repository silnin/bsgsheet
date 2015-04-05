<?php
namespace BsgSheetsBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Table(name="product" )
 * @ORM\Entity(repositoryClass="BsgSheetsBundle\Entity\ProductRepository")
 *
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @var string
    *
    * @ORM\Column(name="name", type="string", length=255)
    */
    protected $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}