# Simple related entries filter for Statamic ![Statamic 2.5](https://img.shields.io/badge/statamic-2.5-blue.svg?style=flat-square)

[![StyleCI](https://styleci.io/repos/94096873/shield?branch=master)](https://styleci.io/repos/94096873)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/subpixel-ch/statamic-related/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/subpixel-ch/statamic-related/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/subpixel-ch/statamic-related/badges/build.png?b=master)](https://scrutinizer-ci.com/g/subpixel-ch/statamic-related/build-status/master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/6c00fcd7-73c6-483d-88e4-e2379cb1c32c/mini.png)](https://insight.sensiolabs.com/projects/6c00fcd7-73c6-483d-88e4-e2379cb1c32c)

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
