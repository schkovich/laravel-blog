<?php

namespace LaravelBlog;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * Deletes a gallery all
     * the associated images.
     *
     * @return bool
     */
    public function delete()
    {
        // Delete the gallery images
        $this->photos()->delete();

        // Delete the gallery
        return parent::delete();
    }

    /**
     * Get the blog's author.
     *
     * @return Blogger
     */
    public function author()
    {
        return $this->belongsTo('LaravelBlog\Blogger', 'blogger_id');
    }

    /**
     * Get the post's comments.
     *
     * @return array
     */
    public function photos()
    {
        return $this->hasMany('LaravelBlog\Photo');
    }

    /**
     * Get the photo album's language.
     *
     * @return Language
     */
    public function language()
    {
        return $this->belongsTo('LaravelBlog\Language');
    }
}
