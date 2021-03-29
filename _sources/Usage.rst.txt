Usage
=====

Now you have to make sure that the user is redirect from the Service Provider to the Identity Provider. This is made by
the Apache Shibboleth Service Provider. If you are using another Service Provider and communicate only over the
environment variable you have to implement that mechanism by your own.

.. tip::
    You can use an rewrite or redirect when the user tries to login.

Now you can login quick test it with a normal login form by entering your username and some random chars in the password
field. But you can use this tutorial https://docs.typo3.org/typo3cms/Typo3ServicesReference/7.6/Authentication/Index.html#advanced-options
to fetch the user automatically.
