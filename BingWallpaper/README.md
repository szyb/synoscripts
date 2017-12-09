

### Requirements
* root access
* internet connection
* git (optional)

### Installation
* download scripts into your home folder
  * i.e. `git clone https://github.com/szyb/synoscripts.git`
* `cd synoscripts/BingWallpaper`
* `chmod 700 start.sh`
* `chmod 700 setup.sh`
* setup custom wallpaper on your account (profile -> personal -> desctop tab -> check 'Customize wallpaper' -> select image (type: strech))
* create cron entry "user defined script" (via control panel -> task scheduler)
  * task name: i.e. BingWallpaper
  * user: root
  * schedule: daily /once a day on i.e. 9:00 AM (for pl-PL locale)
  * run command:
  <pre>
  cd /var/services/homes/[your_account_name]/synoscripts/BingWallpaper
  ./start.sh [your_account_name] [installation_folder_in_your_home_folder]
  </pre>
  * example script command:
  <pre>
  cd /var/services/homes/szyb/synoscripts/BingWallpaper
  ./start.sh szyb 'synoscripts/BingWallpaper
  </pre>
  * optional: check "send run details by e-mail"
### Check:
 * run cron script (button "run")
 * logout
 * login and check wallpaper
