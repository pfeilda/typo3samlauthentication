Test
====

If you want to test the extension without installation of the apache2 saml sp module, you can use the docker-compose
file. You can set the environment variables (normaly set by the apache2 saml sp module) in the Dockerfile.
After a successful startup use `db` as DB Connection and the user/password combination in the docker-compoe file.
Then you can access the installation via `localhost` in your browser.