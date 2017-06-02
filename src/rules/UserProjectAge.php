<?php


namespace SamIT\abac\rules;


use SamIT\abac\interfaces\Authorizable;
use SamIT\abac\Manager;
use SamIT\abac\interfaces\Rule;

/**
 * Class UserProjectAge
 * This is an example rule.
 * @package prime\auth\rules
 */
abstract class UserProjectAge implements Rule
{



    /**
     * @inheritdoc
     */
    public function getDescription(): string
    {
        return "your age is > 18.";
    }

    /**
     * @inheritdoc
     */
    public function execute(Authorizable $source, Authorizable $target, \ArrayAccess $environment, Manager $manager, string $permission): bool
    {
        return ($source instanceof User)
            && ($target instanceof Project)
            && $source->getAuthAttributes()['age'] > 18;
    }

    /**
     * @inheritdoc
     */
    public function getTargetNames(): array
    {
        return [Project::class];
    }

    /**
     * @return string The name of the permission that this rule grants.
     */
    public function getPermissions(): array
    {
        return [Manager::PERMISSION_READ];
    }
}