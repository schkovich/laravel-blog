<?php

namespace LaravelBlog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'content' ];

    /**
     * Returns a formatted post content entry,
     * this ensures that line breaks are returned.
     *
     * @return string
     */
    public function content() {
        return nl2br($this->content);
    }

    /**
     * Returns a formatted post content entry,
     * this ensures that line breaks are returned.
     *
     * @return string
     */
    public function introduction() {
        return nl2br($this->introduction);
    }

    /**
     * Get the blogs's author.
     *
     * @return Blogger
     */
    public function author() {
        return $this->belongsTo('LaravelBlog\Blogger', 'user_id');
    }

    /**
     * Get the post's language.
     *
     * @return Language
     */
    public function language() {
        return $this->belongsTo('LaravelBlog\Language');
    }

    /**
     * Get the post's category.
     *
     * @return BlogCategory
     */
    public function category() {
        return $this->belongsTo('LaravelBlog\BlogCategory');
    }
}
