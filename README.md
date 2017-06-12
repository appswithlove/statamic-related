# Simple related entries filter for Statamic ![Statamic 2.5](https://img.shields.io/badge/statamic-2.5-blue.svg?style=flat-square)

Entries are filtered by overlapping/intersecting terms.



## Installation

Copy the `Related` folder to your `site/addons` folder

## Example usage

Show related entries based on the current entry by passing the tags (`:rel_terms="tags_raw"`)

```
{{ collection:blog slug:isnt="{slug}" filter="Related" rel_taxonomy="tags" :rel_terms="tags_raw" as="items"}}
{{ unless no_results }}
    <section class="related">
        <h2>Related</h2>
        {{ items }}
            {{ partial:blog/item }}
        {{ /items }}
    </section>
{{ /unless }}
{{ /collection:blog }}
```

Show entries based on a hardcoded list of terms (`rel_terms="bacon|whiskey|…"`)

```
{{ collection:blog slug:isnt="{slug}" filter="Related" rel_taxonomy="tags" rel_terms="bacon|whiskey|burger" as="items"}}
{{ unless no_results }}
    <section class="related">
        <h2>Related</h2>
        {{ items }}
            {{ partial:blog/item }}
        {{ /items }}
    </section>
{{ /unless }}
{{ /collection:blog }}
```

**Hint:** Use the `slug:isnt="{slug}"` condition to filter out the current post.

## Attributes

Those attributes are available on the `collection` tag.

| Attribute      | Description |
|----------------|-------------------------------------------------------------------|
| `rel_taxonomy` | The name of the taxonomy field in the fieldset to compare against |
| `rel_terms`    | The list of terms to use |