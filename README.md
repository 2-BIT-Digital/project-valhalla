# Project Valhalla
A website that will hold content. Here's how to setup your local dev environment:

## Environment Setup

### Setting up Homestead
You’re going to need to install a bunch of stuff first. Install these in order by following the links:
- VirtualBox. [Download](https://www.virtualbox.org/wiki/Downloads).
- Vagrant. [Download](https://www.vagrantup.com/downloads.html).
- Git Bash. [Download](https://git-scm.com/download/win).

Open git bash in *administrator mode* (always a good idea) and type:
```
vagrant box add laravel/homestead
```
Install Homestead by typing in the following lines individually:
```
cd ~
git clone https://github.com/laravel/homestead.git Homestead
cd Homestead
bash init.sh
```
If you don't have any SSH keys, you'll need to create them. Follow the steps below to create your keys.
```
cd ~
mkdir .ssh
cd .ssh
ssh-keygen -t rsa
```
Time to configure Homestead, by opening the Homestead.yaml file. You can do this via the “vim” command, or just by opening it with your text editor. Your preference.
```
cd ~
cd Homestead
vim Homestead.yaml
```
Change the Homestead.yaml file to:
```       
ip: "192.168.10.10"
memory: 2048
cpus: 1
provider: virtualbox
version: 0.6.0

authorize: c:/Users/Sean/.ssh/id_rsa.pub

keys:
   - c:/Users/Sean/.ssh/id_rsa

folders:
   - map: c:/Users/Sean/dev/GitHub/valhalla
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
You’ll need to edit your etc/hosts files too
Access the hosts file at c:/Windows/System32/drivers/etc/. It’ll be read only so make sure your git bash has admin privileges. You can also just open this in a code editor. To navigate to this directory, I think it’s:
```
cd ~
cd ../../
cd Windows/System32/drivers/etc
vim hosts
```
Once you're in the file, add this line:
```
192.168.10.10 valhalla.local
```
Give yourself some convenience by making an alias for vagrant. This also means that you can run “homestead up” from any location, which is super useful. If you don't have a .bash_profile file, make one.
```
cd ~
vim .bash_profile
```
Add this function to the .bash_profile file:
```
function homestead() {
    ( cd ~/Homestead && vagrant $* )
}
```
Test Homestead! (good luck)
```
homestead up
homestead ssh
cd sites/valhalla
```
If you can get into the sites/valhalla directory, you're all done!
