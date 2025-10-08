#! /bin/sh
groupmod -g ${HOST_GID:-1000} www-data
usermod -u  ${HOST_UID:-1000} -g  ${HOST_GID:-1000} www-data

# Start cron
crond

# Run services
/usr/bin/supervisord --configuration "/etc/supervisor/supervisord.conf"