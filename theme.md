# Theme

This page should help a new developer to continue developing your theme. Include relevant information about what
features your theme has, files that would need editing, design decisions, colours, etc. You do not need to produce a
serious design document or reproduce basic details about WordPress theme development, only what is specific to your
theme.

## Features

* A custom logo that can be added into the header.
* A custom header image that can be added. It will not appear on smaller screens to save space and only appears on the
  front page.
* Social media icons in place in the footer.
* A secondary navigation menu for shorter navigation in the footer.

## Design

### Layout

A global layout file is used for general content areas to apply across multiple pages or posts. Add in any general
styling into this file.

### Colours

Enter into the colour.scss variables file. The colours used should be under the colour variables section; whilst the
colours used in each element should be listed by purpose. This will ensure that changing all site colours can occur from
a single location.

## Continued Development

### New Site Parts

Site specific sections should be added under the sass/site folder e.g. header and footer. Any of these items should have
their import statements added to the site.scss file.

### Requires Attention

The Google fonts were attempted to be added to the functions.php enqueue, but only the first font would be accessible. A
import statement in the typography file was used to use all fonts, but is not the ideal solution. This requires further
attention. 

