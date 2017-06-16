# Moodle - Repository Pod
This is the version Beta 0.2 of moodle-mod_pod. That means that this version is still in development and you might encounter bugs or issues that will not be present in the final version.

Add a repository to search videos through the Pod search engine (elasticsearch).

## Description
Pod is a video sharing platform using the search engine "elasticsearch" to lists its contents. 
Mod_pod adds a repository on moodle. This repository makes it possible to use the search engine of Pod to obtain the link of the videos listed on the site.
The integration of videos from Pod into courses become simpler.

## Install
To install the mod follow these steps :
* Have Moodle installed in version 3.3 or higher
* Download the mod as a Zip from this github repository.
* Move the .zip archive to your 'repository' dir of your Moodle (Default path on Linux : /var/www/moodle/repository, on Widows : C:\server\moodle\repository)
* Extract the archive. You should now have a folder named 'pod'.
* Go to your moodle homepage and log into as a administrator.
* Your moodle will automatically detect the new module. Follow the steps that will be shown.
* Go to 'Site administration' -> 'Plugins' -> 'Repositories' -> 'Manage repositories'.
* Find 'Pod' and change the 'Disabled' option to 'Enabled and visible'. You can rename the repository if you want.
* Now you can use the new repository.

## Uninstall
To uninstall the mod follow these steps :
* Log into your moodle as a administrator.
* Go to 'Site administration' -> 'Plugins' -> 'Repositories' -> 'Manage repositories'.
* Find 'Pod' and click on 'Uninstall'. Follow the instructions.
* The mod is now uninstalled.

## Contributing
You are authorized to contribute to the development of this mod :
* Testing and creating issues. 
* Submitting code through Pull Requests. Only two restriction :

  1. Make a branch for the modifications and name it as follows : <_github_account_>/feature_<_name_of_feature_>. If this is a bug fix : <_github_account_>/bugfix_<_name_of_bugfix_>.
  
  2. The branch must be made from the 'dev' branch.
