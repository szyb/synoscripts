

### Requirements
* root access
* package php 7.0 installed
* internet connection
* git (optional)

### Installation
* download scripts into your home folder
  * i.e. `git clone https://github.com/szyb/synoscripts.git`
* `cd synoscripts/DailyWallpaper`
* `chmod 700 *.sh`
* setup custom wallpaper on your account (profile -> personal -> desctop tab -> check 'Customize wallpaper' -> select image (type: strech))
* Optional: You can change provider from Bing to Unsplash. To do that just edit start.php and change the line
<pre>
$providerName = "Bing";
</pre>
to:
<pre>
$providerName = "Unsplash";
</pre>
* create cron entry "user defined script" (via control panel -> task scheduler)
  * task name: i.e. DailyWallpaper
  * user: root
  * schedule: daily /once a day on i.e. 9:00 AM
  * run command:
  <pre>
  cd /var/services/homes/[your_account_name]/synoscripts/DailyWallpaper
  ./start.sh [your_account_name] [installation_folder_in_your_home_folder]
  </pre>
  * example script command:
  <pre>
  cd /var/services/homes/szyb/synoscripts/DailyWallpaper
  ./start.sh szyb 'synoscripts/DailyWallpaper
  </pre>
  * optional: check "send run details by e-mail"
### Check:
 * run cron script (button "run")
 * logout
 * login and check wallpaper
