<?php

namespace App;

class Sazzy
{
    /**
     * The Spark version.
     */
    public static string $version = '1.0.0';

    /**
     * The number of days to grant to generic trials.
     */
    public static int $trialDays;

    /**
     * All of the plans defined for the application.
     */
    public static array $plans = [];

    /**
     * Get or set the number of days for the generic trial.
     *
     * @param int|null $trialDays
     *
     * @return static|int
     */
    public static function trialDays($trialDays = null)
    {
        if (is_null($trialDays)) {
            return static::$trialDays;
        }

        static::$trialDays = $trialDays;

        return new static();
    }

    /**
     * Create a new plan instance.
     *
     * @param string $name
     * @param string $id
     *
     * @return \App\Plan
     */
    public static function plan($name, $id)
    {
        static::$plans[] = $plan = new Plan($name, $id);

        return $plan;
    }

    /**
     * Get the plans defined for the application.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function allPlans()
    {
        return collect(static::$plans);
    }

    /**
     * Get all of the monthly plans, both individual and teams.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function allMonthlyPlans()
    {
        return static::allPlans()->filter(fn ($plan) => $plan->interval === 'monthly');
    }

    /**
     * Get all of the yearly plans, both individual and teams.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function allYearlyPlans()
    {
        return static::allPlans()->filter(fn ($plan) => $plan->interval === 'yearly');
    }

    /**
     * Get the active plans defined for the application.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function activePlans()
    {
        return static::allPlans()->filter(fn ($plan) => $plan->active);
    }

    /**
     * Get an array of all of the active plan IDs.
     *
     * @return array
     */
    public static function activePlanIds()
    {
        return static::activePlans()->pluck('id')->all();
    }

    /**
     * Get a comma delimited list of active Spark plan IDs.
     *
     * @return string
     */
    public static function activePlanIdList()
    {
        return implode(',', static::activePlanIds());
    }

    /**
     * Determine if paid plans are defined for the application.
     *
     * @return bool
     */
    public static function hasPaidPlans()
    {
        return count(static::allPlans()->filter(fn ($plan) => $plan->price > 0)) > 0;
    }

    /**
     * Determine if active monthly plans are defined.
     *
     * @return bool
     */
    public static function hasMonthlyPlans()
    {
        return static::allPlans()->filter(fn ($plan) => $plan->interval === 'monthly')->count() > 0;
    }

    /**
     * Determine if active yearly plans are defined.
     *
     * @return bool
     */
    public static function hasYearlyPlans()
    {
        return static::allPlans()->filter(fn ($plan) => $plan->interval === 'yearly')->count() > 0;
    }
}
