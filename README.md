Panada library to interact with the Instagram API
======

Installation
------------

Clone the git repository and copy the files to your Panada app.

Configuration
------------

1. You will need to set up a new client with Instagram at http://instagram.com/developer/
2. Once this is complete copy the details supplied by Instagram into app/config/instagram_api.php
3. Done.

How to use?
------------

To use the library add $this->library->instagram_api()->className(); to any class or function in your desired controller.

All Instagram API functions, apart from getPopularMedia(), require an access token which Instagram supplies through OAuth.
To set the access token in the Instagram API class use

$this->library->instagram_api()->access_token = YOUR_ACCESS_TOKEN;

after you have loaded the library.
I will release this application soon for download as a reference of how to use some of the functions.

Source
-------------

Original source from https://github.com/ianckc/CodeIgniter-Instagram-Library

Samples
-------

Mass like feed and Hastag, at http://dika.web.id/ig/