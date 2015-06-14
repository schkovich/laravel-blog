<?php
/**
 * Created by PhpStorm.
 * User: goran
 * Date: 14/06/15
 * Time: 21:02
 */

namespace LaravelBlog\Faker\Provider;

use Faker\Provider\Base;

class Blog extends Base
{
    /**
     * Generates blog title
     * @param int $nbWords
     *
     * @return string
     */
    public function title($nbWords = 5)
    {
        $sentence = $this->generator->sentence($nbWords);

        return substr($sentence, 0, strlen($sentence) - 1);
    }
}
