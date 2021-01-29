<?php namespace JortdeVreeze\ReadingTime;

use System\Classes\PluginBase;

/**
 * ReadingTime Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'ReadingTime',
            'description' => 'Add Twig function reading_time that displays estimated reading time in minutes',
            'author'      => 'Jort de Vreeze',
            'icon'        => 'icon-clock-o',
        ];
    }

    /**
     * Register new Twig function
     *
     * @return array
     */
    public function registerMarkupTags()
    {
        
        $reading_time = function ($content, $speed = 200, $rounding = false) 
        {

            if (true === $rounding) {
                echo (int) ceil(str_word_count(strip_tags($content)) / $speed);
            } else {
                echo (int) round(str_word_count(strip_tags($content)) / $speed);
            }

        };

        return [
            'functions' => [
                'reading_time' => $reading_time
            ],
        ];
        
        /*
        return [
            'functions' => [
                'reading_time' => function($content, $speed = 200, $rounding = false) 
                {
                    if (true === $rounding) {
                        return (int) ceil(str_word_count(strip_tags($content)) / $speed)
                    } else {
                        return (int) round(str_word_count(strip_tags($content)) / $speed)
                    }                    
                }
            ]
        ];
        */
    }

}