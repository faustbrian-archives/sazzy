<?php

namespace App;

use JsonSerializable;

class Plan implements JsonSerializable
{
    public $attributes;

    public $type;

    /**
     * The plan's Stripe ID.
     */
    public string $id;

    /**
     * The plan's displayable name.
     */
    public string $name;

    /**
     * The plan's price.
     */
    public int $price = 0;

    /**
     * The plan's discount.
     */
    public int $discount = 0;

    /**
     * The plan's interval.
     */
    public string $interval = 'monthly';

    /**
     * The number of trial days that come with the plan.
     */
    public int $trialDays = 0;

    /**
     * The plan's features.
     */
    public array $features = [];

    /**
     * Indicates if the plan is active.
     */
    public bool $active = true;

    /**
     * Create a new plan instance.
     *
     * @param string $name
     * @param string $id
     *
     * @return void
     */
    public function __construct($name, $id)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    /**
     * Set the price of the plan.
     *
     * @param string|int $price
     *
     * @return $this
     */
    public function price($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set the discount of the plan.
     *
     * @param string|int $discount
     *
     * @return $this
     */
    public function discount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Specify that the plan is on a monthly interval.
     *
     * @return $this
     */
    public function monthly()
    {
        $this->interval = 'monthly';

        return $this;
    }

    /**
     * Specify that the plan is on a yearly interval.
     *
     * @return $this
     */
    public function yearly()
    {
        $this->interval = 'yearly';

        return $this;
    }

    /**
     * Specify the number of trial days that come with the plan.
     *
     * @param int $trialDays
     *
     * @return $this
     */
    public function trialDays($trialDays)
    {
        $this->trialDays = $trialDays;

        return $this;
    }

    /**
     * Specify the plan's features.
     *
     * @param array $features
     *
     * @return $this
     */
    public function features(array $features)
    {
        $this->features = $features;

        return $this;
    }

    /**
     * Indicate that the plan should be archived.
     *
     * @return $this
     */
    public function archived()
    {
        $this->active = false;

        return $this;
    }

    /**
     * Get the array form of the plan for serialization.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'price'      => $this->price,
            'trialDays'  => $this->trialDays,
            'interval'   => $this->interval,
            'features'   => $this->features,
            'active'     => $this->active,
            'attributes' => $this->attributes,
            'type'       => $this->type,
        ];
    }
}
