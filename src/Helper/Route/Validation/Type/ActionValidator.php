<?php

namespace App\Helper\Route\Validation\Type;

use App\Helper\Route\Route;
use App\Helper\Route\Validation\AbstractType;
use App\Helper\Route\Validation\InterfaceValidator;
use ReflectionException;
use ReflectionMethod;

class ActionValidator extends AbstractType implements InterfaceValidator{

    /**
     * @return bool
     */
    public function isValid(): bool{

        $isValid = false;
        $className = $this->route->getController();
        $actionName = $this->route->getAction();

        if(false === empty($actionName) && false === empty($className)){
            $isValid = $this->doesExist($className, $actionName);
        }

        return $isValid;

    }

    /**
     * @param string $className
     * @param string $actionName
     * @return bool
     */
    public function doesExist(string $className, string$actionName): bool{

        $isValid = true;

        try {
            new ReflectionMethod($className, $actionName);
        } catch (ReflectionException $e) {
            $isValid = false;
        }

        return $isValid;
    }

}