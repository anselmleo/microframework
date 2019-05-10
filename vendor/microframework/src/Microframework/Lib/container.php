<?php

    namespace Microframework\Lib; 

    class Container
    {
        public function resolve($class)
        {
            // Reflect on the $class
            $reflectionClass = new \ReflectionClass($class);

            // Fetch the constructor (instance of ReflectionMethod)
            $constructor = $reflectionClass->getConstructor();

            // If there is no constructor, there is no
            // dependencies, which means that our job is done.
            if ( ! $constructor)
                return new $class;

            // Fetch the arguments from the constructor
            // (collection of ReflectionParameter instances)
            $params = $constructor->getParameters();

            // If there is a constructor, but no dependencies,
            // our job is done.
            if (count($params) === 0)
                return new $class;

            // This is were we store the dependencies
            $newInstanceParams = [];

            // Loop over the constructor arguments
            foreach ($params as $param) {

                // Here we should perform a bunch of checks, such as:
                // isArray(), isCallable(), isDefaultValueAvailable()
                // isOptional() etc.

                // For now, we just check to see if the argument is
                // a class, so we can instantiate it,
                // otherwise we just pass null.
                if (is_null($param->getClass())) {
                    $newInstanceParams[] = null;
                    continue;
                }


                // This is where 'the magic happens'. We resolve each
                // of the dependencies, by recursively calling the
                // resolve() method.
                // At one point, we will reach the bottom of the
                // nested dependencies we need in order to instantiate
                // the class.
                $newInstanceParams[] = $this->resolve(
                    $param->getClass()->getName()
                );
            }

            // Return the reflected class, instantiated with all its
            // dependencies (this happens once for all the
            // nested dependencies).
            return $reflectionClass->newInstanceArgs(
                $newInstanceParams
            );
        }

    }
