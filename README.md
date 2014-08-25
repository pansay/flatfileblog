flatfileblog
============

Minimalistic MVC flat file markdown blog tool.

## The idea

- Avoid DBs
- Avoid WYSIWYG
- Avoid writing inside a browser form
- Use git and github for full versioning and backup both of the code and the blog's content
- Use a text editor, not a browser form, to write your posts in markdown (.md) format
- Use a text editor, not a browser form, to enter your static data and texts (.csv file)

## Installation

- Change the relevant values in config/config.php and .htaccess
- Customize your information in content/texts/texts.csv
- Apply your design in application/view

## How to use

- Write your posts using markdown (either in a text editor or directly through github) and save them in the content/posts folder, minding the filename format.
- ???
- Profit!

## Features

FlatFileBlog has all of the basic blog features, and more!

- home page with latest posts, latest first
- individual posts with permalink
- pretty urls
- post title in &lt;title&gt; tag
- various archives options
  - previous/next navigation from the home page listing X latest posts (x by x)
  - previous/next navigation from individual post page (1 by 1)
  - full list of all posts
- less support
- rss feed
  
## Documentation

### Formatting specifics

- the filename must start with an ISO 8601 formatted date, then underscore, then the pretty url, and end in .md
- the first line of the file is the title, the second line is ignored, the best is to use the `===` formatting for h1 

### To insert an image

- place the image in the /content/images folder
- include it with markdown like this `![alternate text](image.jpg)`


### To insert an inner link

- Simply use the alias as the url: `[link text](some-alias)`

### To write a draft

- Save it with an url like `2014-12-30_my-draft-title.draft.md`
