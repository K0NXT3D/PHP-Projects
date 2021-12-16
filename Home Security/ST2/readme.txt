For Raspberry Pi (apache2, php7.0, tar)
I have been unable to find a good way to zip using php on Raspian so I went with tar.

Editing /core/traffic.txt
Backup orginal file, erase all lines and you should be fine.
If not resore backup and add one random ip or whatever to the list (666.666.666.666).

Crontab (crontab -e)
Set for the last second of the day.
For more active traffic you may want to set the process for earlier.

59 11 * * * cd /var/www/html/ && tar -cf $(date +\%Y_\%m_\%d).tar $(date +\%Y_\%m_\%d)
59 11 * * * mv /var/www/html/$(date +\%Y_\%m_\%d).tar /var/www/html/log_archives/$(date +\%Y_\%m_\%d).tar
