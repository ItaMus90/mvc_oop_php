<?php

namespace App\Helper\HTTP\Validation\Type;

use App\Helper\HTTP\Validation\AbstractType;
use App\Helper\HTTP\Validation\InterfaceValidator;
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