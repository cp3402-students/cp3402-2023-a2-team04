# Development and Deployment Workflow

## Summary of Tools Used

* CMS - `WordPress`
* Documentation and Team Management - `Trello`
* Communication - `Discord`
* Local Environments - `Docker`
* Version Control - `GitHub`

## CMS - WordPress

## Documentation and Team Management - Trello

Trello, a web-based list making application. We used it to keep track of tasks and the projects progress.

A new Trello account can be registered with any email. Then you can join the existing board using this
link: [https://trello.com/b/KYotjzhS/workflow](https://trello.com/b/KYotjzhS/workflow). All previous tasks, completed or
otherwise, will be displayed in the board. Anyone new coming to work on and continue developing the site can follow it
as a reference point.

## Communication - Discord

Discord is a fantastic tool for communication, especially within teams, and as all the team members had experience using
it before it was picked for this project. The primary benefits it offers towards a team-orientated project such as this;

* It's simple to setup and manage
* Offers both written and voice communication for multiple users
* Screen-sharing
* File and link uploads
* Offers the basic group requirement of being able to stay up-to-date with the projects development remotely
* It can be used on phones, computers, and tablets

Setup is very simple. It simply requires an email to register a new account.

Some discord servers employ a phone verification security system to be able to join, however this will not be necessary
for this project.

## Local Environments - Docker

## Version Control - GitHub

Version control was done through GitHub. Multiple branches were used, primarily Main, Staging, and Development.

The workflow for a member to commit a change to the project, would go as follows; Create a new branch, commit changes to
it and then merge it with the development branch. Before the merge would be accepted it would need to be reviewed by
other members in the pull request.

### Set up for version control with local environment

Branch name: development

#### Step 1: Initialise with Docker Compose and Git

1. Select an empty folder and copy the docker-compose file from below _(If required make a text document
   called docker-compose.yml and copy in the raw text from the repos docker-compose.yml
2. Open your command line
3. `cd <path-to-docker-compose-file>`
4. `docker-compose up`
5. If you have docker desktop you can check it worked there; alternatively `docker ps` in command line to see container
   creation
6. Note the path for the themes folder that was created by docker compose
7. `cd <path-to-themes-folder>`
8. `git clone https://github.com/cp3402-students/cp3402-2023-a2-team04.git`
9. `git branch` check which branch you are on, we only want to deal with development `git branch -a` to show all
   branches
10. `git checkout <branch-name>` to switch to the development branch
11. `git log` to view the latest commits
12. If your log doesn't appear to be update-to-date`git fetch` `git pull` update with the latest if required
13. `git checkout -b <new-branch-name>` Create a new branch to work on

##### Docker Compose File

```yml
version: '3.9'

services:
  db:
    image: mysql:8.0
    container_name: mysql
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: wordpress
      MYSQL_USER: wordpress
      MYSQL_PASSWORD: wordpress
      MYSQL_DATABASE: wordpress
    volumes:
      - mysql-data:/var/lib/mysql

  wordpress:
    image: wordpress:6.2
    container_name: wordpress
    restart: always
    depends_on:
      - db
    environment:
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: wordpress
      WORDPRESS_DB_NAME: wordpress
      WORDPRESS_DEBUG: 1
    volumes:
      - ./wordpress_data:/var/www/html
    ports:
      - "8000:80"

  phpmyadmin:
    image: phpmyadmin:5.2
    container_name: phpmyadmin
    restart: always
    ports:
      - "8080:80"
    environment:
      PMA_HOST: db
      MYSQL_ROOT_PASSWORD: wordpress

volumes:
  mysql-data:
```

#### Step 2: Setup Sass and Gulp

1. Install [node.js](https://nodejs.org/en)
2. Place package.json file and gulpfile.js in the root directory of the project (outside wordpress_data folder)
3. To activate package.json file, in project IDE terminal for local install `npm install`
4. If not running already, run docker-compose file `docker-compose up`
5. In IDE terminal `npm run watch` to start gulp watch or `npm run sass` for manual compiling

Troubleshooting - Other commands

* In IDE terminal, `npm install browser-sync`
* In IDE terminal, `npm install sass gulp-sass --save-dev`
* In command line, `npm install -g sass`
* Check versions `node --version` `npm --version` `gulp --version`

package.json file:

```json
{
  "name": "underscores",
  "version": "1.0.0",
  "description": "Hi. I'm a starter theme called _s, or underscores, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.",
  "author": "Automattic Theme Team",
  "license": "GPL-2.0-or-later",
  "keywords": [
    "WordPress",
    "Theme"
  ],
  "homepage": "https://github.com/Automattic/_s#readme",
  "repository": {
    "type": "git",
    "url": "git+https://github.com/Automattic/_s.git"
  },
  "bugs": {
    "url": "https://github.com/Automattic/_s/issues"
  },
  "dependencies": {
    "browser-sync": "^2.29.1",
    "sass": "^1.62.1"
  },
  "devDependencies": {
    "@wordpress/scripts": "^19.2.2",
    "dir-archiver": "^1.1.1",
    "rtlcss": "^3.5.0",
    "gulp": "^4.0.2",
    "gulp-concat": "^2.6.1",
    "gulp-sass": "^5.1.0"
  },
  "rtlcssConfig": {
    "options": {
      "autoRename": false,
      "autoRenameStrict": false,
      "blacklist": {},
      "clean": true,
      "greedy": false,
      "processUrls": false,
      "stringMap": []
    },
    "plugins": [],
    "map": false
  },
  "scripts": {
    "sass": "gulp buildStyles",
    "watch": "gulp watch",
    "compile:rtl": "rtlcss ./css/style.css ./css/style-rtl.css",
    "lint:scss": "wp-scripts lint-style 'sass/**/*.scss'",
    "lint:js": "wp-scripts lint-js 'js/*.js'",
    "bundle": "dir-archiver --src ../heartland-hits --dest ../_s.zip --exclude .DS_Store .stylelintrc.json .eslintrc .git .gitattributes .github .gitignore README.md composer.json composer.lock node_modules vendor package-lock.json package.json .travis.yml phpcs.xml.dist sass style.css.map yarn.lock"
  },
  "main": "index.js"
}
```

If necessary change the theme name to suit your folder directory. Check the file path and naming matches your setup.

Gulp file:

```js
'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const browserSync = require('browser-sync').create();

function buildStyles() {
    return gulp.src('./wordpress_data/wp-content/themes/heartlandhits/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(browserSync.stream()) // Reload browser
        .pipe(gulp.dest('./wordpress_data/wp-content/themes/heartlandhits'))
}

exports.buildStyles = buildStyles;

exports.watch = function () {
    browserSync.init({
        proxy: 'http://localhost:8000', // Match local WordPress installation
    });

    gulp.watch('./wordpress_data/wp-content/themes/heartlandhits/sass/**/*.scss', gulp.series(['buildStyles'])).on('change', browserSync.reload);
};
```

Note: Using browser-sync in gulp run watch will proxy your localhost:8000 to localhost:3000. If making major changes it
is recommended to not run gulp run watch command at the same time.

#### Step 3: Setup Browser

1. Go to browser and type localhost:8000 to get to WordPress install page
2. Set a site name, use the WordPress user and password set up from docker compose, tick box for use of weak password
3. Select language English (Australia)
4. Click install/ok
5. Troubleshooting: If error message appears go to themes and activate heartland-hits theme
6. Create a new browser tab and type localhost:8080 to get PHPMyAdmin login page
7. Use credentials for database from docker compose file

#### Step 4: Development of the theme

1. Open PHPStorm
2. File > Open
3. Select the wordpress_data folder created by the docker compose
4. Make changes to theme as desired
5. Throughout development go back to command line and `git add .` to add all changed files OR use PHPStorm Commit
   section to add files and create commits
6. If using command line option `git commit -m "Your commit mesage"` to commit to git
7. At end of work session `git push`
8. In GitHub create a compare & pull request to merge new branch with development branch
9. Depending on development branch rules: 1 reviewer may be required to approve merge, once approved merge and delete
   branch

### Development Server

GitHub branch name: development

### Staging Server

GitHub branch name: staging

### Live Server

GitHub branch name: main

## Testing
