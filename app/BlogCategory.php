<?php

namespace LaravelBlog;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    /**
     * Holds the name of the corresponding table
     * @var string
     */
    protected $table = "blog_categories";
    /**
     * Returns a formatted post content entry, this ensures that line breaks are returned.
     *
     * @return string
     */
    public function description()
    {
        return nl2br($this->description);
    }
    /**
     * Gets the author.
     *
     * @return Blogger
     */
    public function author()
    {
        return $this->belongsTo('LaravelBlog\Blogger');
    }
    /**
     * Gets blogs in the category.
     *
     * @return array
     */
    public function blogs()
    {
        return $this->hasMany('LaravelBlog\Blog');
    }
    /**
     * Get the category's language.
     *
     * @return Language
     */
    public function language()
    {
        return $this->belongsTo('LaravelBlog\Language');
    }
}
