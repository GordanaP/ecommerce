<?php

namespace App\Services\ValueObjects;

use Illuminate\Support\Facades\Storage;

class Image
{
    /**
     * The image.
     *
     * @var string
     */
    public $image;

    /**
     * Create a new class instance.
     *
     * @param string $image
     * @return  void
     */
    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * Get an object as a string.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->image;
    }

    /**
     * Get the image path.
     *
     * @return strig
     */
    public function asPath()
    {
        return $this->image ? 'storage/'. $this->image : '';
    }

    /**
     * Display the image.
     *
     * @param  string $default_path
     * @return
     */
    public function display($default_path = 'images/no_image_available.png')
    {
        return asset($this->image ? $this->asPath() : $default_path);
    }

    /**
     * Remove the old image image.
     *
     * @param  string $image
     * @return void
     */
    public function removeFromStorage($image)
    {
        Storage::disk('public')->delete($image);
    }
}
