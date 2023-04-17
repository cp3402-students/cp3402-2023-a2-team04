# Development and Deployment Workflow

## Workflow Management


## Communication
Discord

## Version Control: GitHub

### Set up for version control with local environment
1. Select a folder and copy in the docker-compose file
2. Open your command line
3. `cd <path-to-docker-compose-file>`
4. `docker-compose up`
5. If you have docker desktop you can check it worked there; alternatively `docker ps` in command line to see container creation
6. Note the path for the themes folder that was created by docker compose
7. `cd <path-to-themes-folder>`
8. `git clone https://github.com/cp3402-students/cp3402-2023-a2-team04`
9. `git branch` check which branch you are on, we only want to deal with development `git branch -a` to show all branches
10. `git checkout <branch-name>` to switch to the development branch
11. `git log` to view the latest commits
12. If your log doesn't appear to be update-to-date`git fetch` `git pull` update with the latest if required
13. `git checkout -b <new-branch-name>` Create a new branch to work on
14. Open PHPStorm
15. File > Open
16. Select the wordpress-data folder created by the docker compose
17. Make changes to theme as desired
18. Throughout development go back to command line and `git add .` to add all changed files
19. `git commit -m "Your commit mesage"` to commit to git
20. At end of work session `git push`



## Testing

Version control was done through GitHub. Multiple branches were used, primarily Main, Staging, and Development. The workflow for a member to commit a change to the project, would go as follows; Create a new branch, commit changes to it and then merge it with the development branch. Before the merge would be accepted it would need to be reviewed by other members in the pull request.

## Testing
