<?php

namespace Spatie\Searchable;

class SearchableAttribute
{
    /** @var string */
    protected $attribute;

    /** @var string */
    protected $type;

    public function __construct(string $attribute, $type = 'partial')
    {
        $this->attribute = $attribute;

        $this->type = $type;
    }

    public static function create(string $attribute, $type = 'partial'): self
    {
        return new self($attribute, $type);
    }

    public static function createExact(string $attribute): self
    {
        return static::create($attribute, 'exact');
    }

    public static function createStart(string $attribute): self
    {
        return static::create($attribute, 'start');
    }

    public static function createMany(array $attributes): array
    {
        return collect($attributes)
            ->map(function ($attribute) {
                return new self($attribute);
            })
            ->toArray();
    }

    public function getAttribute(): string
    {
        return $this->attribute;
    }

    public function type(): string
    {
        return $this->type;
    }
}
