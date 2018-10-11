<?php
namespace Fort\Di;

interface DiContainerInterface {
    /**
     * Build an entry of the container by its name.
     *
     * This method behave like get() except resolves the entry again every time.
     * For example if the entry is a class then a new instance will be created each time.
     *
     * This method makes the container behave like a factory.
     *
     * @param string $name       Entry name or a class name.
     * @param array  $parameters Optional parameters to use to build the entry. Use this to force specific parameters
     *                           to specific values. Parameters not defined in this array will be resolved using
     *                           the container.
     *
     * @throws InvalidArgumentException The name parameter must be of type string.
     * @throws DependencyException Error while resolving the entry.
     * @throws NotFoundException No entry found for the given name.
     * @return mixed
     */
    public function make($name, array $parameters = []);

     /**
     * Inject all dependencies on an existing instance.
     *
     * @param object $instance Object to perform injection upon
     * @throws InvalidArgumentException
     * @throws DependencyException Error while injecting dependencies
     * @return object $instance Returns the same instance
     */
    public function injectOn($instance);
}