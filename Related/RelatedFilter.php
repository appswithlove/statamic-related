<?php
/**
 * @author Rémy M. Böhler <remy.boehler@subpixl.ch>
 */

namespace Statamic\Addons\Related;

use Statamic\Contracts\Data\Entries\Entry;
use Statamic\Extend\Filter;

/**
 * Class RelatedFilter
 * @package Statamic\Addons\Related
 */
class RelatedFilter extends Filter
{
    /**
     * Perform filtering on a collection
     *
     * @return \Illuminate\Support\Collection
     */
    public function filter()
    {
        $taxonomy = $this->get('rel_taxonomy', 'tags');
        $terms = $this->get('rel_terms');
        if (!is_array($terms)) {
            $terms = explode('|', $terms);
        }

        return $this->collection->filter(function (Entry $entry) use ($taxonomy, $terms) {
            return count(array_intersect($terms, $entry->get($taxonomy, []))) > 0;
        });
    }
}
