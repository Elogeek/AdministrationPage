<?php

namespace Elogeek\AdministrationPage\Model\Entity;

class User
{

    private ?int $id;
    private ?string $name;
    private ?string $lastname;
    private ?string $password;
    private ?string $mail;

    /**
     * User constructor.
     * @param string|null $name
     * @param string|null $lastname
     * @param string|null $password
     * @param int|null $id
     * @param string|null $mail
     */
    public function __construct(int $id = null, string $name = null, string $lastname = null, string $password = null, string $mail = null) {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->password = $password;
        $this->mail = $mail;
    }

    /**
     * Return id of the user
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return User
     */
    public function setId(?int $id): User {
        $this->id = $id;
        return $this;
    }

    /**
     * Return name of the user
     * @return string|null
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return User
     */
    public function setName(?string $name): User {
        $this->name = $name;
        return $this;
    }

    /**
     * Return lastname of the user
     * @return string|null
     */
    public function getLastname(): ?string {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     * @return User
     */
    public function setLastname(?string $lastname):User {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Return password of the user
     * @return string|null
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return User
     */
    public function setPassword(?string $password): User {
        $this->password = $password;
        return $this;
    }

    /**
     * Return email address of the user
     * @return string|null
     */
    public function getMail(): ?string {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     * @return User
     */
    public function setMail(?string $mail):User {
        $this->mail = $mail;
        return $this;
    }

}