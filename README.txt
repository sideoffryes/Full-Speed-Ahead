This website allows midshipmen to log, track, and search workouts. The home page for our website 
can be found at index.html. Here, the user is presented with a short description of the websute, pictures,
a user review, and a nav bar to help them navigate the website.
Under the accounts section of the navbar, users are given links to the sign up, login, log out pages. The
sign up page directs users to fill out a form that collects background information on them nad adds the
information to LOG.txt. The login page takes in an email address and a password and checks if these match 
an account saved in LOG.txt. If so, the user is logged on and a session is created. If not, the user is 
presented with an error message, and given a link to try again. The logout page simply logs the user out
by unsetting session variables.

The about us link in the nav bar directs users to a page that gives them background information about 
the site's creators.

The admin page link in the nav bar redirects the user to a form that can be used to login into an admin account.
The form takes in an email and a password and checks if these credentials match an account in ADMIN.txt. If so,
the user is redirected to adminPage.txt. Here, the admin user is presented with a form that takes in user account 
infromation and a tablethat lists all current users. The admin can fill out the form with a account's information
and choose whether they want to delete that account or change that account's  password. Submitting the form will
cause makeChange.php to carry out the account change and LOG.txt will be modified to reflect the change.

The workouts tab on the navbar gives users two options for links: search workouts and log workouts. The log link
redirects the user to logwork.php. This page gives users a form that allows them to enter information about a 
recent workout. Once this form is sumitted, the workout information is stored in LOGWORK.txt. The search link takes
the user to search.php. Here the user is given a list of filters that they can decide whether or not the want to 
apply  them while searching through every logged workout in LOGWORK.txt. If no filters are selected, every workout 
is returned when the form is submitted.