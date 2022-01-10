<?php

namespace Elogeek\AdministrationPage\Model\Entity;

class Article {

    private ?int $id;
    private ?string $title;
    private ?string $content;
    private ?int $authorFk;

    /**
     * Article construct
     * @param string|null $title
     * @param string|null $content
     * @param int|null $authorFk
     */
    public function __construct(int $id = null, string $title = null, string $content = null, int $authorFk=null) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->authorFk = $authorFk;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * Return id of the article
     * @param int|null $id
     * @return Article
     */
    public function setId(?int $id): Article {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * Return the title of the article
     * @param string|null $title
     * @return Article
     */
    public function setTitle(?string $title): Article {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string {
        return $this->content;
    }

    /**
     * Return the content of the article
     * @param string|null $content
     * @return Article
     */
    public function setContent(?string $content): Article {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAuthorFk(): ?int {
        return $this->authorFk;
    }

    /**
     * Return the author of the article
     * @param int|null $authorFk
     * @return Article
     */
    public function setAuthorFk(?int $authorFk): Article {
        $this->authorFk = $authorFk;
        return $this;
    }


}