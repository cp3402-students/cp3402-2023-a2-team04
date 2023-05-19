# Development and Deployment Workflow

## Summary of Tools Used

* CMS - `WordPress`
* Documentation and Team Management - `Trello`
* Communication - `Discord`
* Local Environments & IDE - `Docker`, `PHP Storm`
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

## Local Environments & IDE - Docker, PHP Storm
Docker is a widely used virtualization software/platform. The team used a Docker container to house and run applications 
for the projects development.

Before work began on the theme it was decided that PHP Storm would be used. It was not a difficult decision given its 
popularity, syntax highlighting features, integration, intuitive and friendly UI, and so on.

## Version Control - GitHub

Version control was done through GitHub. Multiple branches were used, primarily Main, Staging, and Development.

The workflow for a member to commit a change to the project, would go as follows; Create a new branch, commit changes to
it and then merge it with the development branch. Before the merge would be accepted it would need to be reviewed by
other members in the pull request.

### Set up for version control with local environment

Branch name: development

#### Step 1: Initialise with Docker Compose and Git

1. Select an empty folder and copy the docker-compose file from below _(Create a yml file
   called docker-compose.yml and copy in the raw text from code block below)_
2. Open your command line
3. `cd <path-to-docker-compose-file>`
4. `docker-compose up`
5. If you have docker desktop you can check it worked there; alternatively `docker ps` in command line to see container
   creation
6. Note the path for the themes folder that was created by docker compose
7. `cd <path-to-themes-folder>`
8. `git clone https://github.com/cp3402-students/cp3402-2023-a2-team04.git` <theme-name>
9. `cd <path-to-theme-name-folder>`
10. `git branch` check which branch you are on, we only want to deal with development `git branch -a` to show all
    branches
11. `git checkout <branch-name>` to switch to the development branch
12. `git log` to view the latest commits
13. If your log doesn't appear to be update-to-date`git fetch` `git pull` update with the latest if required
14. `git checkout -b <new-branch-name>` Create a new branch to work on

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
6. Go to browser inspector, settings and enable CSS sourcemaps

Troubleshooting and Other commands

* In IDE terminal, `npm install browser-sync`
* In IDE terminal, `npm install sass gulp-sass --save-dev`
* In command line, `npm install -g sass`
* Check versions `node --version` `npm --version` `gulp --version`
* In the case of Error: "Script cannot be loaded because running scripts is disabled on this system"
  To fix this follow the steps below to change your computers Execution Policy:
  1. Open WIndows Powershell, run it as an Administrator
  2. Type `Get-ExecutionPolicy` to view the current policy (The policy will likely be set to Restricted by default)
  3. Type `Set-ExecutionPolicy RemoteSigned`
  4. Enter `Y` to allow and confirm the change

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
    "gulp-sourcemaps": "^3.0.0",
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
const sourcemaps = require('gulp-sourcemaps');

function buildStyles() {
    return gulp.src('./wordpress_data/wp-content/themes/heartlandhits/sass/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('./maps'))
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

## Hosted Environments - Docker

### Staging Server

GitHub branch name: staging  
Hardware Requirements: 1 vcpu - 2gb RAM  
The following instructions were tested on a DigitalOcean Docker Droplet with Ubuntu 22.04 and Docker 23.0.6.

#### Initial Docker-Compose setup

1. Install Docker-Compose, instructions can be found in the [official DigitalOcean guide](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04)
2. Navigate to the directory you want to store your project files
3. Create two new files, the first file named "docker-compose.yml" and the second named "Dockerfile" `touch docker-compose.yml Dockerfile`
4. Add the code from the code blocks below to the relevant `docker-compose.yml` and `Dockerfile` files. Any changes to usernames/passwords and file locations can be made here.
5. Navigate to the root folder where the docker-compose.yml file is located and create a new directory named "secrets" and move to the new directory
6. Create three text files in the secrets directory`touch mysql_root_password.txt mysql_user.txt mysql_password.txt`
7. Add the required username to the `mysql_user.txt` file and generate new passwords and add them to the `mysql_root_password.txt` file and the `mysql_password.txt` file

#### Docker image setup

1. Navigate back to the root folder of the project where the `docker-compose.yml` and `Dockerfile` are located
2. Create the jenkins image first `docker build -t jenkins .`
3. Bring up the docker containers `docker-compose up -d`  

#### Jenkins Configuration

1. Access the Jenkins web interface by going to `<Site URL>:8081`. This may take some time to configure if the Docker container has only been recently created
2. Once in Jenkins we first need to set security. Navigate to `Manage Jenkins > Configure Global Security`
3. Set `Security Realm` to `Jenkin's own user database` and press `save`
4. Set the username and password in the next window that pops up, these are your credentials to log into Jenkins in the future.
5. Next we need to install the Git and Github plugin. Navigate to `Manage Jenkins > Manage Plugins > Available Plugins`
6. Search for `git` and tick the install box. Search for `github` and tick the install box.
7. With both plugin install boxes ticked, press `Download now and install after restart`
8. Tick the box on the installation page `Restart Jenkins when installation is complete and no jobs are running`
9. Once both plugins are installed and Jenkins has restarted navigate to the Jenkins dashboard and select `New Item` to create a new project.
10. Give your project the name `wordpress`, then choose `Freestyle project` and click on `OK` - Note the folder destinations are preconfigured to using the name "wordpress", if this is changed the folder locations will not work. If you want to use a different name you will have to change the `EXECUTE SHELL` code listed below
11. In the `Configure` page set `Source Code Management` to `Git`. This will open up some more options
12. Set `Repository URL` to the Git Repo URL. If you need to add credentials this can be done here
13. Set the Branch under `Branch Specifier` to the required branch
13. Set `Build Triggers` to `GitHub hook trigger for GITScm polling`
14. Under `Build Steps` Select `Add build step` and select `Execute Shell`. Paste the below code in the `Command` window
15. Press `Apply` and then `Save` to save these steps
16. Test if the project works by pressing `Build Now` in the wordpress project

#### Jenkins Troubleshooting

1. For troubleshooting an error message click on the `build number` and press `Console Output` to view the console status. This will show the build process step by step and display where the issue is occuring
2. The GitHub repo may need to have a Webhook created which can be done in the settings of the repo. An API token can be generated in the Jenkins security settings under `Git plugin notifyCommit access tokens`

#### Access each web GUI through the following ports:  
   1. WordPress - `<Site URL>:8000` - Will require a first time set up  
   2. PHPMyAdmin - `<Site URL>:8181` - Can be accessed using credentials straight away  
   3. Jenkins - `<Site URL>:8081` - Will automatically configure but can take a few moments

#### docker-compose.yml file:

```yaml
version: '3.9'

services:
  db:
    image: mysql:8.0
    container_name: mysql
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD_FILE: /run/secrets/MYSQL_ROOT_PASSWORD
      MYSQL_USER_FILE: /run/secrets/MYSQL_USER
      MYSQL_PASSWORD_FILE: /run/secrets/MYSQL_PASSWORD
      MYSQL_DATABASE: wordpress
    volumes:
      - mysql-data:/var/lib/mysql
    secrets:
      - MYSQL_ROOT_PASSWORD
      - MYSQL_USER
      - MYSQL_PASSWORD

  wordpress:
    image: wordpress:6.2
    container_name: wordpress
    restart: always
    depends_on:
      - db
    environment:
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_USER_FILE: /run/secrets/MYSQL_USER
      WORDPRESS_DB_PASSWORD_FILE: /run/secrets/MYSQL_PASSWORD
      WORDPRESS_DB_NAME: wordpress
      WORDPRESS_DEBUG: 1
    volumes:
      - ./wordpress_data:/var/www/html/wp-content/themes
    ports:
      - "8000:80"
    secrets:
      - MYSQL_USER
      - MYSQL_PASSWORD

  phpmyadmin:
    image: phpmyadmin:5.2
    container_name: phpmyadmin
    restart: always
    ports:
      - "8181:80"
    environment:
      PMA_HOST: db
      MYSQL_ROOT_PASSWORD_FILE: /run/secrets/MYSQL_ROOT_PASSWORD
    secrets:
      - MYSQL_ROOT_PASSWORD

  jenkins:
    build: .
    image: jenkins
    container_name: jenkins
    restart: always
    ports:
      - "8081:8080"
    environment:
      JAVA_OPTS: "-Djenkins.install.runSetupWizard=false"
    volumes:
      - jenkins-data:/var/jenkins_home
      - /var/run/docker.sock:/var/run/docker.sock

volumes:
  mysql-data:
  jenkins-data:

secrets:
  MYSQL_ROOT_PASSWORD:
    file: ./secrets/mysql_root_password.txt
  MYSQL_USER:
    file: ./secrets/mysql_user.txt
  MYSQL_PASSWORD:
    file: ./secrets/mysql_password.txt
```
#### Dockerfile file:

```dockerfile
FROM jenkins/jenkins:lts

USER root

RUN apt-get update && apt-get install -y wget apt-transport-https ca-certificates curl gnupg lsb-release && \
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | apt-key add - && \
    echo "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable" | \
    tee /etc/apt/sources.list.d/docker.list && \
    apt-get update && \
    apt-get -y install docker-ce docker-ce-cli containerd.io

# Add jenkins users to the docker group
RUN getent group docker || groupadd docker && \
    usermod -aG docker jenkins


# Switch back to jenkins user
USER jenkins
```      
#### Execute Shell code:

```shell
# Set the PATH
export PATH=$PATH:/usr/bin/

REPO_URL=https://github.com/cp3402-students/cp3402-2023-a2-team04
BRANCH=staging

# Clone the repository
if [ -d .git ]; then
  git fetch --all
  git reset --hard origin/$BRANCH
else
  git clone --branch $BRANCH $REPO_URL
fi

# Move to the correct directory
cd /var/jenkins_home/workspace/wordpress

# Remove any files that were deleted from the repository
git clean -df
docker exec wordpress sh -c 'rm -rf /var/www/html/wp-content/themes/heartlandhits/*'

# Copy the files to the Wordpress container
docker cp . wordpress:/var/www/html/wp-content/themes/heartlandhits
```

### Live Server

GitHub branch name: main

## Testing
