
### Requirements
* root access
* package php 7.4 installed
* internet connection
* git (optional)

### Installation
* download scripts into your home folder
  * i.e. `git clone --branch dsm7 https://github.com/szyb/synoscripts.git`
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
