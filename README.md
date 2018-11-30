<b>The Camagru project</b>
### Main
![Main](/gif/main.gif)

Authorized languages:<br>
◦ [<b>Server</b>] PHP<br>
◦ [<b>Client</b>]  HTML - CSS - JavaScript (only with browser natives API)<br><br>
Authorized frameworks:<br>
◦ [<b>Server</b>] None<br>
◦ [<b>Client</b>] CSS Frameworks tolerated, unless it adds forbidden JavaScript. (I use \<materialize css\> without JS)<br>

Small web application allowing you to make basic photo and video editing using your webcam and some predefined images.

App’s users are able to select an image in a list of superposable images, take a picture with his/her webcam and admire the result that mixing
both pictures.
All captured images are public, likeable and commentable.

Website have a decent page layout (a header, a main section
and a footer), displayed correctly on mobile devices and have an adapted layout
on small resolutions.
All forms have correct validations and the whole site is secured:
<li>No plain or unencrypted passwords in the database.</li>
<li>No ability to inject HTML or “user” JavaScript in badly protected variables.</li>
<li>No ability to upload unwanted content on the server.</li>
<li>Protected against SQL injections.</li><br>

### Camera
![Camera](/gif/cam.gif)

<b>User features:</b>
<li>The application allow a user to sign up by asking at least a valid email
address, an username and a password with at least a minimum level of complexity.</li>
<li>At the end of the registration process, an user confirm his account via a
unique link sent at the email address fullfiled in the registration form.</li>
<li>The user is able to connect to this application, using his username
and his password. He also is able to tell the application to send a password
reinitialisation mail, if he forget his password.</li>
<li>The user is able to disconnect in one click at any time on any page.</li>
<li>Once connected, an user can modify his username, mail address or password.</li><br>

### Cabinet
![Cabinet](/gif/cab.gif)

<b>Gallery features:</b>
<li>This part displays all the images edited by all the users,
ordered by date of creation. It is also allow (only) a connected user to like
them and/or comment them.</li>
<li>When an image receives a new comment, the author of the image is notified
by email. This preference set as true by default but can be deactivated in
user’s preferences.</li>
<li>The list of images is paginated, with 5 elements per page.</li>
