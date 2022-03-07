# cybergrungewebsite

Cybergrunge.net is a website allowing user uploads of music and art. This repo has just the most basic functions of the website. 

this is not the live website. for now this is just to provide a rough outline of how things work and the basic code being used. i test in prod because i don't actually know how to deploy stuff locally and docker and shit is too complicated cause im a dumbass

## my workflow

i test everything in prod and just use filezilla to edit everything. you can deploy locally if you want but i literally never do this and pretty much dont know how to or want to use git. this repository is more of a reference page for people who want to build osmething similar

## upload handling

the artists folder contains `custom upload.php` which handles uploads. the process of uploading is kind of shitty, as there are no SQL database entries for individual tracks, just for albums. tracks are simply titled the name of the file. also, i am pretty sure that i use very inconsistent form sanitization methods which leads to a lot of fuckups with uploads that have any kind of special characters in the name, that is work in progress along w everything else

## databases

databases are undergoing a full rewrite atm

## router.php

as of now, global rewrite rule leads to router. it handles:

* dynamically generating album pages
* generating artist pages with list of albums by the artist
* generating album editor
* handles redirects to certain pages.

## indexAR.php
main homepage, various content on it is changed almost daily but the general format stays the same ish. includes cute jquery window manager.

## artists dir
this directory has ```custom upload.php``` as well as the php scripts for creating and editing album page styles, and "content management" for album "authors" including re-uploading album art, "nuking" the album. technically, anyone could greif other peoples albums because there is no authentication implemented for who is trying to edit an album, it just checks if they are logged in or not and if not denies editing.






## running locally (for nerds)

To run this locally, navigate to the project's base directory and run the following:

```
$ php -S localhost:1337
```

Now you can visit the local version of the site by visiting http://localhost:1337/indexAR.php
