# Project Valhalla
Ayy, reviews for tech and media

## Environment setup
Basically, you need an environment that has the following setup:
 - PHP 7.0 (with mcrypt)
 - mysql 5.6.*
 - apache or nginx
 - Composer

*Important*: Ensure that you have your hosts file configured so that the site is accessible from something like `http://valhalla.local/`.

If you don't have Composer there are [installation instructions here](https://getcomposer.org/doc/00-intro.md)

### Setting up homestead
- First you'll need VirtualBox. Download it from [here](https://www.virtualbox.org/wiki/Downloads) and install it.
- Then you'll also need Vagrant. Download it from [here](https://www.vagrantup.com/downloads.html) and install it.
- Check that vagrant is accessible from your command line by running `which vagrant` and ensuring that it returns something like `/usr/local/bin/vagrant`.
- You'll also need to have ssh keys set up. Check if you have some by running the following and checking if the `id_rsa` and `id_rsa.pub` files exist:
```
cd ~/.ssh
ls -la
```
- If you don't have any ssh keys then do the following and follow the prompts
```
ssh-keygen -t rsa
```
- Now we need to install homestead itself. Do the following from your command line:
```
cd ~
git clone https://github.com/laravel/homestead.git Homestead
cd Homestead
git checkout v3.1.0
bash init.sh
```
- That bash script will create a yaml configuration file for homestead in a `~/.homestead` folder. So do this:
```
cd ~/.homestead
```
- Open the `Homestead.yaml` file in the editor of your choice (e.g. I run `subl Homestead.yaml` to open the file in Sublime Text Editor)
- Populate the file with the following configuration, ensuring to update the setting inside the `folders` key:
```
ip: "192.168.10.10"
memory: 2048
cpus: 1
provider: virtualbox
version: 0.6.0

authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
    - map: ~/the/path/to/your/checked/out/valhalla/repo
      to: /home/vagrant/sites/valhalla

sites:
    - map: valhalla.local
      to: "/home/vagrant/sites/valhalla/public"

databases:
    - homestead

ports:
    - send: 6001
      to: 6001
```
- Update your `/etc/hosts` file and add an entry for `192.168.10.10  valhalla.local`
- For convenience, add an alias for vagrant that will run vagrant commands specifically for your homestead installation. To do that you will need to add the following to your Bash profile and restart your command line:
```
function homestead() {
    ( cd ~/Homestead && vagrant $* )
}
```
- Now run `homestead up` and wait for your machine to download
- Now we need to run composer to install our dependencies. So do this:
```
homestead ssh
cd sites/valhalla
composer install
```
- While we're in this ssh session, we also need to quickly patch a Craft 2 bug with MySQL versions 5.7.5 and above. Run this:
```
sudo vim /etc/mysql/my.cnf
```

Add the following lines to the bottom of the file:
```
[mysqld]
sql_mode=STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION
```

Then restart mysql like this:
```
sudo service mysql restart
```
- Now you can exit the ssh session by running `exit`.
- You should now be able to hit `http://valhalla.local/` in your browser! 🎉 Note: You will probably get an error saying you don't have a `.env` file. That's okay, just continue with the configuration variables instructions below.

### Setting up your database
- Open your mysql database GUI of choice. I like HeidiSQL for Windows, and Sequel Pro for OSX.
- Add a connection with the following details:
```
Host: 192.168.10.10
User: homestead
Password: secret
```
- Connect!
- Create a database for the Valhalla website. I suggest the following settings (and in fact, Craft specifies the Encoding and Collation so don't just take my word for it!):
```
Database name: valhalla
Encoding: UTF-8 Unicode (utf8)
Collation: utf8_unicode_ci
```
- Add a new user with the following details:
```
Username: valhalla
Password: valhalla
Privileges: All of the privileges!
```

## Setting configuration variables
Run `cp .env.example .env`. You will then need to go into your new `.env` file and update the settings there to be relevant to your environment.

### Coding Conventions

#### Javascript
- Develop using ES6, webpack is configured in the project to transpile front-end Javascript. (IN PROGRESS)
- Use spaces for indentation.
- Terminate statements with a semi-colon.
- Use `const` where possible.
- Variables which reference JQuery objects should be prefixed with a $ symbol e.g. `$body = $('body')`
- Use js- prefixed classes to denote Javascript selectors in HTML e.g. `<button class="close js-range-toggle">...</button>`


## Updating Craft
Craft is updated _really_ regularly, but we want to make sure we keep the new code that is created by an update in our repository. Therefore, when updating Craft please adhere to these steps:
1. Make sure your repo is clear of unstaged files, just so the update can be in a commit all by itself.
2. Sync your database (Not especially important, but good practice).
3. Run the update on your local dev environment.
4. Commit the updated files and push.
5. PROD ONLY: Backup live database just in case.
6. Deploy the files. Craft detects that the database version doesn't match the files and puts up a maintenance message.
7. Visit `/admin` and click the update button.
8. Drink.
