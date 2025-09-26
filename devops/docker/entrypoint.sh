#! /bin/sh

# LOOKUP Gosu when running on windows WSL2

# Start cron
crond

# Run services
/usr/bin/supervisord --configuration "/etc/supervisor/supervisord.conf"