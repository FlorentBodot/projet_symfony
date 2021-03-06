<?php

namespace BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 *
 * @ORM\Table(name="books")
 * @ORM\Entity(repositoryClass="BookBundle\Repository\BooksRepository")
 */
class Books
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string", length=255, nullable=true)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=255, nullable=true)
     */
    private $cover;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_publish", type="date")
     */
    private $datePublish;

    /**
     * Relationship
     * =============================
     */

    /**
      * Un livre peut être éditer par un éditeur
      * @ORM\ManyToOne (
      *         targetEntity="BookBundle\Entity\Editors",
      *         inversedBy="book"
      *)
      */
    private $editors;

    /**
      * Un livre peut être écrit par un auteur
      * @ORM\ManyToOne (
      *         targetEntity="BookBundle\Entity\Authors",
      *         inversedBy="book"
      * )
      */
      private $authors;

    /**
     * Constructors
     * =============================
     */


    public function __construct() {
        $this->setDatePublish(new \DateTime() );
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Books
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Books
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set cover
     *
     * @param string $cover
     *
     * @return Books
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set datePublish
     *
     * @param \DateTime $datePublish
     *
     * @return Books
     */
    public function setDatePublish($datePublish)
    {
        $this->datePublish = $datePublish;

        return $this;
    }

    /**
     * Get datePublish
     *
     * @return \DateTime
     */
    public function getDatePublish()
    {
        return $this->datePublish;
    }

 

    /**
     * Set editors
     *
     * @param \BookBundle\Entity\Editors $editors
     *
     * @return Books
     */
    public function setEditors(\BookBundle\Entity\Editors $editors = null)
    {
        $this->editors = $editors;

        return $this;
    }

    /**
     * Get editors
     *
     * @return \BookBundle\Entity\Editors
     */
    public function getEditors()
    {
        return $this->editors;
    }

    /**
     * Set authors
     *
     * @param \BookBundle\Entity\Authors $authors
     *
     * @return Books
     */
    public function setAuthors(\BookBundle\Entity\Authors $authors = null)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * Get authors
     *
     * @return \BookBundle\Entity\Authors
     */
    public function getAuthors()
    {
        return $this->authors;
    }
}
