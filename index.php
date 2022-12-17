<?php
class Customer 
{
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
    public array $accounts;


    function __construct(string $firstname, string $lastname, string $email, string $password, array $accounts)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->accounts = $accounts;
    }

    function getFullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

}
?>