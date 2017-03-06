#!/bin/bash

set -x

rm -rf /etc/default/locale
env >> /etc/default/locale
/etc/init.d/cron start

apache2-foreground

exec "$@"