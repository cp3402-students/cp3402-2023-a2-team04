# Site

## Goal (Measurable):

The goal of the website is to increase membership sign-ups by 15% (excluding the first month) within 6 months of launch
of the new website.

## Success Evaluation:

On initial launch of the site, the first month would be considered successful if there is at least 50% of existing
members signed up as a member to the website.

The conversion rate will be used to measure the long-term success of this goal, whereby 15 percent of visitors to the
site sign up as a member for a period of six-months. This long term goal should see that new memberships signups are
achieved.

## Target Audience:

The site is targeted at individuals aged between 17-80 that has an interest in participating or spectating country music
gigs. As it is a local association, it is targeted at the geographic area of the Townsville region. In order to cater to
this particular target audience the theme should play on warm or natural tones of the countryside, relaxed fonts for
headings, but ensure that reading fonts are clear and well-sized for older readers.

## Market Size:

The population of the Townsville region is approximately 178,000 people. The potential market size is calculated based
on the likely percentage of having an interest in country music, one study showed in Australia that approximately 24% of
Australian's preferred country music. This targets approximately 42,720 of Townsville's population with a potential to
spectate or listen to country music. Another study from 2007 suggests that 35% of households contain at least one person
who plays a musical instrument, with a household average in at 2.59 as of 2021 this means there is a potential market
size of 5000-6000 people.

## Site Organisation, Maintenance & Updating:
For anyone taking over the development of the site, the main difference from standard Wordpress functionality comes from the plugins used.

### Plugin details:
 - `Advanced Custom Fields` (By: WP Engine, [WordPress.org Plugin Page](https://en-au.wordpress.org/plugins/advanced-custom-fields/))
 - `Export Media Library` (By: Mass Edge Inc., [WordPress.org Plugin Page](https://en-au.wordpress.org/plugins/export-media-library/))
 - `Modula` (By: WPChill, [Wordpress.org Plugin Page](https://en-au.wordpress.org/plugins/modula-best-grid-gallery/))
 - `Show Current Template` (By: JOTAKI Taisuke, [WordPress.org Plugin Page](https://en-au.wordpress.org/plugins/show-current-template/))
 - `Theme Check` (By: Theme Review Team, [WordPress.org Plugin Page](https://en-au.wordpress.org/plugins/theme-check/))
 - `WordPress Importer` (By: wordpressdotorg, [WordPress.org Plugin Page](https://en-au.wordpress.org/plugins/wordpress-importer/))

Details on plugin usages can be found below.

### Updating the site


#### Add a new page
Adding a new page is the same as any default WordPress site. Simply in the dashboard hover over `Pages` and select `Add new`.

If it is a top-level page it will be automatically added to the header and footer navigation menus. However, if a new page is made and has a Parent Page (in `Page Attributes` when editing pages) you will need to manually add it to the menus, found in the dashboard if you hover over `Appearance` and select `Menus`.

For additional information and guides please refer to official [WordPress.org Create Pages](https://wordpress.org/documentation/article/create-pages/) documentation.

#### Add a new post
Currently only the `monthly magazines` have been created as posts. Everything else has either been created in/as a page or event with the Advanced Custom Fields plugin.

As with Pages, very little has been changed with Posts. Creating them can be done through the dashboard selecting `Posts` and then `Add new`.

In the spirit of future-proofing the website, magazines were given the `Magazine` category. This should be applied to any future magazines. If in the future other types of posts are added, they can be given their own category.

For additional information and guides please refer to official [WordPress.org Create Posts](https://wordpress.org/documentation/article/wordpress-block-editor/) documentation.

#### Add a new event (Advanced Custom Fields)

#### Add a new gallery (Modula plugin)
Galleries are currently only present in the magazines but can be added anywhere in the site. The `Modula` plugin was used for this. Galleries created with it will display pictures in a grouped area and users can click on an image to expand and bring it forward on their screen. It also comes with a hover affect. Hovering over an image brings up a caption, which in this case is sometimes used to describe someone or something happening in the image. This caption is displayed at the bottom when an image is selected.

Once installed Modula will appear in the Dashboard. Selecting it will show all existing galleries and an option at the top to `Add new`. Selecting `Add new` will bring up a page to name the gallery and a section underneath where images can be dragged and dropped. They will be uploaded individually one by one.

Each gallery has been consistently named with the same naming format. It is recommended this be followed in the future to avoid any confusion or problems, and make them easier to find and manage. The format is "yyyy.mm.dd event". For example `2022.07.10 Country Music Afternoon`.

The caption displayed for an image can be added/changed by hovering over an image in the same place where you drop and upload it, and select the circular icon `Edit Image`. Be careful not to select the icon under it because that will delete the image. In the `Edit Image` panel you will see options for `Title`, `Alt Text`, `Caption Text`, `Alignment`, and `URL`. The main points of concern is the Caption Text which is where you add the displayed text for that image (if any), and Alignment, where you can change the position of the caption text.

Important: Galleries were not used for each and every image. If an event only has 1-3 images taken for it the default WordPress `Image` or `Media & Text` block is perfectly fine for this, and is in fact recommended. Modula should be used for events with 4 or more images.


#### How to update x
