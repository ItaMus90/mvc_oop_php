<?php

use DateTime;

abstract class AbstractEntity{

    /**
     * @var null|int
     */
    protected $id;

    /**
     * @var null|DateTime
     */
    protected $dateCreated;


    /**
     * @return int|null
     */
    public function getId(): ?int{
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return AbstractEntity
     */
    public function setId(?int $id): AbstractEntity{

        $this->id = $id;
        return $this;

    }

    /**
     * @return \DateTime|null
     */
    public function getDateCreated(): ?DateTime{
        return $this->dateCreated;
    }
}

