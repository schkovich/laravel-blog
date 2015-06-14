<?php

namespace LaravelBlog;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    /**
     * Deletes a gallery image.
     *
     * @return bool
     */
    public function delete()
    {
        // Delete the gallery image
        return parent::delete();
    }

    /**
     * Get the blog's author.
     *
     * @return Blogger
     */
    public function author()
    {
        return $this->belongsTo('LaravelBlog\Blogger');
    }

    /**
     * Get the gallery for pictures.
     *
     * @return array
     */
    public function album()
    {
        return $this->belongsTo('LaravelBlog\Album');
    }

    /**
     * Get the photo's language.
     *
     * @return Language
     */
    public function language()
    {
        return $this->belongsTo('LaravelBlog\Language');
    }
}
