<?php

class UserModel
{
    private string $id;

    private string $username;

    private string $phone;

    private string $email;

    private string $password;

    public function __construct(
        $username,
        $phone,
        $email,
        $password = '',
        $id = 0
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return int|mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|mixed|string $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed|string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed|string $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
}