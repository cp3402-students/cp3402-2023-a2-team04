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
- `Forminator` (By: WPMU DEV, [WordPress.org Plugin Page](https://wordpress.org/plugins/forminator/))
- `Feed Them Social` (By: SlickRemix, [WordPress.org Plugin Page](https://wordpress.org/plugins/feed-them-social/))

Details on plugin usages can be found below.

### Updating the site

#### Add a new page
Adding a new page is the same as any default WordPress site. Simply in the dashboard hover over `Pages` and select `Add new`.

If it is a top-level page it will be automatically added to the header and footer navigation menus. However, if a new page is made and has a Parent Page (in `Page Attributes` when editing pages) you will need to manually add it to the menus, found in the dashboard if you hover over `Appearance` and select `Menus`.

For additional information and guides please refer to official [WordPress.org Create Pages](https://wordpress.org/documentation/article/create-pages/) documentation.

#### Add a new post
Currently only the `monthly newsletters` have been created as posts. Everything else has either been created in/as a page or event with the Advanced Custom Fields plugin.

As with Pages, very little has been changed with Posts. Creating them can be done through the dashboard selecting `Posts` and then `Add new`.

In the spirit of future-proofing the website, newsletters were given the `newsletter` category. This should be applied to any future newsletters. If in the future other types of posts are added, they can be given their own category.

For additional information and guides please refer to official [WordPress.org Create Posts](https://wordpress.org/documentation/article/wordpress-block-editor/) documentation.

#### Add a new event (Advanced Custom Fields)
Advanced Custom Fields, or `ACF`, was used to add event forms in the Events page. Two field groups were made; `Event` and `LineUp`.

Event has 5 fields:
- Date (Label: `Date:`, Name: `event_date`, Type: `Date Picker`)
- Time (Label: `Time:`, Name: `event_time`, Type: `Time Picker`)
- Venue (Label: `Venue:`, Name: `event_venue`, Type: `Text`)
- Details (Label: `Details:`, Name: `event_details`, Type: `Text Area`)
- Recurring (Label: `Recurring:`, Name: `event_recurring`, Type: `True/False`)

Date ofcourse is the day of the event, time is the exact starting time, venue is the location where the event is being held, details are notes and information on things such as pricing, and recurring handles whether the event will occur again.

LineUp has 2 fields:
- Performer (Label: `Performer:`, Name: `performer_name`, Type: `Text`)
- Performer Time (Label: `Performer Time:`, Name: `performer_time`, Type: `Time Picker`)

Sometimes events wont have details for performers, however if they do they can be added with this group.

Neither the Event nor LineUp field group should be changed at all.

To use these, create a new page for an event, and in the edit page view, under `Summary` is an option for `Template`. You can choose from a few but for events specifically select `Single Event` to create an event, and `All Events` to create a page that shows all events. `All Events` shouldn't need to be used again as there is already a page for it (Events page). Selecting `Single Event` will show the two field groups in the page and developers can enter event information accordingly.

The `Recurring` option will determine if the event is listed in the `Recurring Events` section of the `Events` page. Otherwise events will be listed based on their `event_date` and placed accordingly under `Upcoming Events` or `Past Events`.

#### Add a new gallery (Modula plugin)
Galleries are currently only present in the newsletters but can be added anywhere in the site. The `Modula` plugin was used for this. Galleries created with it will display pictures in a grouped area and users can click on an image to expand and bring it forward on their screen. It also comes with a hover affect. Hovering over an image brings up a caption, which in this case is sometimes used to describe someone or something happening in the image. This caption is displayed at the bottom when an image is selected.

Once installed Modula will appear in the Dashboard. Selecting it will show all existing galleries and an option at the top to `Add new`. Selecting `Add new` will bring up a page to name the gallery and a section underneath where images can be dragged and dropped. They will be uploaded individually one by one.

Each gallery has been consistently named with the same naming format. It is recommended this be followed in the future to avoid any confusion or problems, and make them easier to find and manage. The format is "yyyy.mm.dd event". For example `2022.07.10 Country Music Afternoon`.

The caption displayed for an image can be added/changed by hovering over an image in the same place where you drop and upload it, and select the circular icon `Edit Image`. Be careful not to select the icon under it because that will delete the image. In the `Edit Image` panel you will see options for `Title`, `Alt Text`, `Caption Text`, `Alignment`, and `URL`. The main points of concern is the Caption Text which is where you add the displayed text for that image (if any), and Alignment, where you can change the position of the caption text.

Important: Galleries were not used for each and every image. If an event only has 1-3 images taken for it the default WordPress `Image` or `Media & Text` block is perfectly fine for this, and is in fact recommended. Modula should be used for events with 4 or more images.

#### How to use Export Media Library plugin
This plugin was used to easily export photos into a zip folder and move them.

To use this, in the WordPress dashboard hover-over or click `Media` and then select `Export`. From here select `Download zip` to automatically download all media files.

#### How to use Show Current Template plugin
This plugin was used in development to view which parts of the theme were used on each individual page.

To use, when viewing a page, the developer can click the Show Current Template tab in the top bar to view the parts.

#### How to use Theme Check plugin
This is used to check the Theme files for problems that would be against the Theme standards.

To use the plugin, from within the WordPress admin dashboard, click the Appearances menu and choose Theme Checker. From there, the developer chooses the theme and clicks check.
The plugin then provides a log of any problems or suggestions to fix in the theme.

#### How to use WordPress Importer plugin
Exports the WordPress content to an XML file for importing in another WordPress site.

This plugin is the WordPress plugin for importing and exporting content. To use, go to the Tools menu and use Import or Export and follow the instructions.

#### How to use Forminator plugin
This plugin was used to create the contact, registration and login forms.

To use this plugin, in the WordPress dashboard, head to the Forminator menu. Under the Forms section, click the create button.

The plugin provides instructions on how to add fields to the form, with most options finding the default option adequate.

#### How to use Feed Them Social plugin
From within the WordPress admin dashboard, choose the FT Social menu. Then click the Add New Feed button. Depending on the feed that's required, choose which Social platform.

Admin will then need to add the Access Token provided by the Social media platform when accessing the account. Following the steps, user needs to choose the group or page that will
be embedded in the WordPress page.

Once the connections are set within the plugin. The user needs to add the shortcode to the page that will show the embedded Social feed.