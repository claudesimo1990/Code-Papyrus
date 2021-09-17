<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @Assert\NotBlank
     */
    public $name;

    /**
     * @Assert\NotBlank\Email
     */
    public $email;

    /**
     * @Assert\NotBlank
     */
    public $message;
}
