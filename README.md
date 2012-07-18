Markdown Paste v0.2
===================

I couldn't find any Markdown pastebin so I wrote my own. It's dead simple and right now it's not very secure (there's no spamming filter). 
It uses showdown.js to do all the parsing, for non-js browsers there is `<pre>` tag with plaintext version of the file.

Feel free to fork and send pull requests, I could use better stylesheets for example ;) These are pretty crappy...


Usage
-----

Script should be easy to deploy, but here are few pointers if something goes wrong:

1. **YOU REALLY, REALLY WANT TO SET THAT UNIQUE_PASTE_KEY IN INDEX.PHP**
2. Make sure you've set up proper chmod to /txt folder
3. Sometimes Apache has weird quirks with RewriteMode, check out if it works without it and try poking around if it does
4. Check if all $_SERVER variables are correct on your server (maybe the script needs some modifications)
5. If you find a bug, fill an issue or better yet: send me a pull request

Share buttons are connected to my AddThis account, you're free to modify them for your needs.


License
-------

    Copyright (C) 2012 Michał Matyas <michal@6irc.net>
    Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
    The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
