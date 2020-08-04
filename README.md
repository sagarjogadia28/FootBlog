![Welcome](Images/Welcome.png)

# About the project

A lightweight blogging platform from scratch using <b>WAMP</b> stack where users can post blogs and discuss topics related to football.

There are three types of users of this website.

- Viewer (can only view blogs)
- Blogger (can write blogs and can see their posts)
- Admin (Verify Blogger and set permissions for blogger, can also delete the posts of blogger, has all the rights)

# Technologies Used

- [HTML5](https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5)
- [CSS3](https://developer.mozilla.org/en-US/docs/Archive/CSS3)
- [Javascript](https://www.javascript.com/)
- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [Apache Server](https://httpd.apache.org/)

# Setup

- Install <b>[XAMPP](https://httpd.apache.org/)</b>
- Start MySQL and Apache from the control panel of XAMPP
- Go to <b>localhost/phpmyadmin/</b> and create a new database named <b>blog</b> and import the blog.sql file from the folder SQL
- Place the project in the <b>htdocs</b> folder of XAMPP
- Open the <b>Welcomepage.html</b> file to launch the website

# Pages

- ##### Home page for viewer

  - Will display all the blogs.
  - By clicking on the name of the author, viewer will be able to see the information of the blogger on the blogger page.

- ##### Blogger page

  - Will display the information of an individual blogger that is given by the blogger during SignUp.

* ##### Login and SignUp page for Blogger & Admin

- ##### Admin page

  - Able to see the list of all the bloggers.
  - Set permission for individual bloggers.
  - Only the permitted blogger can insert a new blog.

- ##### Home page for blogger

  - After sign in, the blogger will be able to see all the blogs written.
  - Blogger can update the existing blog in this page.
  - Blogger can also insert new blog if he has permission.

- ##### Contact Us page
  - Contain a form in which viewer will give their details to the admin so that admin can contact the blogger.
