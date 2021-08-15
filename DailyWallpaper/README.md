This instruction works only for DSM 7. For DSM 6 please switch to the `dsm6` branch

### Requirements
* root access
* Package PHP 7.4 installed
* Package Git installed
* Internet connection
* SSH turned on (at least for the installation) (Control Panel => Terminal Services => Enable SSH service)
* Basic linux skills

### Installation (with ssh & git)
* download scripts into your home folder
  * log in to your device via SSH. In Windows 10 you can do it in PowerShell, i.e. type `ssh username@deviceIP` and provide your password. You can also use Putty application. Username should be administrator account.
  * clone the repository from GitHub, type:
  * `git clone https://github.com/szyb/synoscripts.git`
  * `cd synoscripts/DailyWallpaper`
  * `chmod 700 *.sh`
* setup custom wallpaper on your account (options -> personal -> "Display Preferences" tab -> check 'Customize background' -> select image (type: strech))
* Open Control Panel -> Task Scheduler -> Create -> Scheduler task -> User-defined script
  * task: i.e. DailyWallpaper
  * user: root
  * schedule: daily /once a day on i.e. 9:00 AM
  * run command:
  <pre>
  cd /var/services/homes/[your_account_name]/synoscripts/DailyWallpaper
  ./start.sh [your_account_name] [installation_folder_in_your_home_folder] [Bing|Unsplash|Random]
  </pre>
  * example script command:
  <pre>
  cd /var/services/homes/szyb/synoscripts/DailyWallpaper
  ./start.sh szyb synoscripts/DailyWallpaper Random
  </pre>
  * optional: check "send run details by e-mail"
### Check:
 * run task (button "run")
 * logout
 * login again and enjoy your new and changing daily wallpaper :)
